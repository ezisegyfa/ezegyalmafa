<?php

namespace App\Helpers\RelationHelpers;

use ReflectionMethod;

class Relationship
{
    use RelationPropertyGetters;

    public $name;
    public $modelTypeNamespaceUrl;
    public $columnName;

    public function __construct(ReflectionMethod $method)
    {
        $this->name = $method->getName();
        $methodParams = getMethodParams($method);
        $this->modelTypeNamespaceUrl = $methodParams[0];
        if (count($methodParams) > 1)
            $this->columnName = $methodParams[1];
        else
            $this->columnName = snake_case(removeGetSuffix($this->name)) . '_id';
    }

    public function selectSingularNamedProperAttribute(array $attributes)
    {
        return $this->selectProperAttribute($attributes, [
            str_singular($this->name),
            str_singular($this->getModelTypeName()),
            str_singular($this->getNameInCamelFormat()),
            str_singular($this->getNameInSnakeFormat()),
            str_singular($this->getModelTypeNameInCamelFormat()),
            str_singular($this->getModelTypeNameInSnakeFormat()),
        ]);
    }

    public function selectPluralNamedProperAttribute(array $attributes)
    {
        return $this->selectProperAttribute($attributes, [
            str_plural($this->name),
            str_plural($this->getModelTypeName()),
            str_plural($this->getNameInCamelFormat()),
            str_plural($this->getNameInSnakeFormat()),
            str_plural($this->getModelTypeNameInCamelFormat()),
            str_plural($this->getModelTypeNameInSnakeFormat())
        ]);
    }

    public function selectProperAttribute(array $attributes, array $potentialRelationAttributeNames)
    {
        foreach ($potentialRelationAttributeNames as $attributeName)
            if ($this->hasAttribute($attributeName, $attributes))
                return $attributes[$attributeName];
        return null;
    }

    protected function hasAttribute(string $attributeNameToCheck, array $attributes)
    {
        return array_key_exists($attributeNameToCheck, $attributes) && is_array($attributes[$attributeNameToCheck]);
    }

    public function createRelatedModel(array $attributes)
    {
        $modelTypeName = $this->getModelTypeNamespaceUrl();
        return $modelTypeName::firstOrCreateRecursively($attributes);
    }

    public function getRenderColumnSearchQuery(string $searchedText)
    {
        return getRenderColumnSearchQuery($this->getRenderColumnNames(), $searchedText);
    }

    public function getRenderColumnNames()
    {
        $renderColumnNames = [];
        $relatedModelTypeName = $this->getModelTypeNamespaceUrl();
        $tableName = $this->getTableName();
        foreach ($relatedModelTypeName::$renderColumnNames as $relatedRenderColumnName)
            if ($relatedModelTypeName::isRelationColumnName($relatedRenderColumnName))
                $renderColumnNames = array_merge($renderColumnNames, $relatedModelTypeName::getColumnRelationship($this->name)->getRenderColumnNames());
            else
                array_push($renderColumnNames, $tableName . '.' . $relatedRenderColumnName);
        return $renderColumnNames;
    }
}
