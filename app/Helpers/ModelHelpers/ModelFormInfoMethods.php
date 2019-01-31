<?php

namespace App\Helpers\ModelHelpers;

use App\Helpers\ModelHelpers\ModelRecursiveMethods;
use App\Helpers\ModelHelpers\ModelFilterMethods;
use App\Helpers\FormInfos\Input;
use App\Helpers\FormInfos\TextArea;
use App\Helpers\FormInfos\Select;
use App\Helpers\FormInfos\SelectOption;
use App\Helpers\FormInfos\FormValidationInfos;
use App\Helpers\FormInfos\FormItemTextType;
use App\Helpers\FormInfos\FormInputType;
use App\Helpers\RelationHelpers\Relationship;

/**
 * Execute database methods with updating related tables.
 */
trait ModelFormInfoMethods
{
    protected static $defaultIgnoredFormColumnNames = ['id', 'user_id', 'created_at', 'updated_at'];

    public function getModelFormInfos()
    {
        return array_map(function ($columnName) {
            $formInfo = static::getColumnDefaultFormInfos($columnName);
            $formInfo->value = $this->$columnName;
            return $formInfo;
        }, static::getColumnNames());
    }

    public static function getFormInfos()
    {
        return array_merge(static::getNonRelationshipFormInfos(), static::getRelationshipFormInfos());
    }

    public static function getRelationshipFormInfos()
    {
        $formInfos = [];
        $relationships = static::getManyToOneRelationships();
        foreach ($relationships as $relationship)
            if (static::isAcceptedFormColumn($relationship->getColumnName()))
                array_push($formInfos, static::createRelationColumnFormInfos($relationship));
        return $formInfos;
    }

    public static function getNonRelationshipFormInfos()
    {
        $columnNames = array_filter(static::getNonRelationColumnNames(), function($columnName) {
            return static::isAcceptedFormColumn($columnName);
        });
        return array_map(function($columnName) {
            return static::createNonRelationColumnFormInfos($columnName);
        }, $columnNames);
    }

    public static function getColumnDefaultFormInfos(string $columnName)
    {
        if (in_array($columnName, static::getColumnNames())) {
            if (in_array($columnName, static::getNonRelationColumnNames()))
                return static::createNonRelationColumnFormInfos($columnName);
            else
                return static::createRelationColumnFormInfosByColumnName($columnName);
        }
        else
            throw new Exception("Invalid column name", 500);
    }

    protected static function createNonRelationColumnFormInfos(string $columnName)
    {
        return new Input($columnName, '', null, static::getRequestRules()[$columnName]);
    }

    protected static function createRelationColumnFormInfosByColumnName(string $columnName)
    {
        return static::createRelationColumnFormInfos(static::getColumnRelationship($columnName));
    }

    protected static function createRelationColumnFormInfos(Relationship $relationship)
    {
        $columnName = $relationship->getColumnName();
        return new Select(
            $columnName, 
            static::getRelationFormOptions($relationship->getModelTypeNamespaceUrl()),
            '',
            null,
            static::getRequestRules()[$columnName]
        );
    }

    public static function getRelationFormOptions(string $relatedModelTypeName)
    {
        return $relatedModelTypeName::all()->map(function($relatedObject) {
            return new SelectOption($relatedObject->id, $relatedObject->getRenderValue());
        })->toArray();
    }

    public static function isAcceptedFormColumn(string $columnName)
    {
        $isCustomIgnoredColumnName = isset(static::$ignoredFormColumnNames) && in_array($columnName, static::$ignoredFormColumnNames);
        return !in_array($columnName, static::$defaultIgnoredFormColumnNames) && !$isCustomIgnoredColumnName;
    }
}