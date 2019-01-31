<?php

namespace App\Helpers\ModelHelpers;

use App\Helpers\RelationHelpers\Relationship;
use Illuminate\Support\Facades\DB;
use Exception;
use Log;

/**
 * Execute database methods with updating related tables.
 */
trait ModelRecursiveMethods
{
    protected static function updateRecursively(array $attributes)
    {
        $attributes = static::updateRelatedValues($attributes);
        $attributesToInsert = static::filterAttributesByTableColumnNames($attributes);
        $identifierColumnNames = static::getIdentifierColumnNames();
        $identifierAttributes = static::getIdentifierAttributes($attributes, $identifierColumnNames);
        if (count($identifierColumnNames) == count($identifierAttributes))
            return static::updateOrCreate($identifierAttributes, $attributesToInsert);
        else
            return static::firstOrCreate($attributesToInsert);
    }

    protected static function firstOrCreateRecursively(array $attributes)
    {
        $attributes = static::updateRelatedValues($attributes);
        $attributesToInsert = static::filterAttributesByTableColumnNames($attributes);
        $identifierColumnNames = static::getIdentifierColumnNames();
        if (empty($identifierColumnNames))
            return static::firstOrCreate($attributesToInsert);
        else
            return static::firstOrCreateRecursivelyByIdentifierColumns($attributesToInsert, $identifierColumnNames);
    }

    protected static function getIdentifierColumnNames()
    {
        $calledClass = get_called_class();
        if (isset($calledClass::$identifierColumnNames))
            return $calledClass::$identifierColumnNames;
        else
            return array();
    }

    protected static function firstOrCreateRecursivelyByIdentifierColumns(array $attributesToInsert, array $identifierColumnNames)
    {
        $identifierAttributes = static::getIdentifierAttributes($attributesToInsert, $identifierColumnNames);
        if (count($identifierColumnNames) == count($identifierAttributes)) {
            $matchingItems = static::where($identifierAttributes)->get();
            if ($matchingItems->count() == 0)
                return static::create($attributesToInsert);
            else {
                $matchingItem = $matchingItems->first();
                if (array_intersect($matchingItem->attributes, $attributesToInsert) == $attributesToInsert)
                    return $matchingItem;
                else 
                    throw new Exception(static::getAnotherItemExistsErrorMessage($identifierAttributes), 1);
            }
        }
        else
            return static::firstOrCreate($attributesToInsert);
    }

    protected static function getIdentifierAttributes(array $attributes, array $identifierColumnNames)
    {
        return collect($attributes)->filter(function($attributeValue, $attributeName) use($identifierColumnNames) { 
            return in_array($attributeName, $identifierColumnNames); 
        })->toArray();
    }

    protected static function filterAttributesByTableColumnNames(array $attributes)
    {
        $tableColumnNames = static::getColumnNames();
        return collect($attributes)->filter(function($attributeValue, $attributeName) use($tableColumnNames) { 
            return in_array($attributeName, $tableColumnNames); 
        })->toArray();
    }


    protected static function updateRelatedValues(array $attributes)
    {
        $modelRelationships = getRelationships(get_called_class());
        foreach ($modelRelationships as $relationship) {
            $relationAttribute = static::getRelationAttribute($relationship, $attributes);
            if ($relationAttribute) {
                $relatedModelName = $relationship->getModelTypeNamespaceUrl();
                $relatedModel = $relatedModelName::firstOrCreateRecursively($relationAttribute);
                $modelRelationFieldName = $relationship->getParentModelFieldName();
                $attributes[$modelRelationFieldName] = $relatedModel->id;
            }
        }
        return $attributes;
    }

    protected static function getRelationAttribute(Relationship $relationship, array $attributes)
    {
        if (parent::hasAttribute($relationship->name, $attributes))
            return $attributes[$relationship->name];
        else if (parent::hasAttribute($relationship->modelTypeName, $attributes))
            return $attributes[$relationship->modelTypeName];
        else if (parent::hasAttribute($relationship->getNameInCamelFormat(), $attributes))
            return $attributes[$relationship->getNameInCamelFormat()];
        else if (parent::hasAttribute($relationship->getNameInSnakeFormat(), $attributes))
            return $attributes[$relationship->getNameInSnakeFormat()];
        else if (parent::hasAttribute($relationship->getModelTypeNameInCamelFormat(), $attributes))
            return $attributes[$relationship->getModelTypeNameInCamelFormat()];
        else if (parent::hasAttribute($relationship->getModelTypeNameInSnakeFormat(), $attributes))
            return $attributes[$relationship->getModelTypeNameInSnakeFormat()];
        else
            return null;
    }

    protected static function hasAttribute(string $attributeNameToCheck, array $attributes)
    {
        return array_key_exists($attributeNameToCheck, $attributes) && is_array($attributes[$attributeNameToCheck]);
    }
    
    protected static function getAnotherItemExistsErrorMessage(array $identifierAttributes)
    {
        $message = __('helpers.anotherItemExistsErrorMessage');
        foreach ($identifierAttributes as $key => $value) {
            $message .= $key . ': ' . $value . ' ';
        }
        return $message;
    }
}