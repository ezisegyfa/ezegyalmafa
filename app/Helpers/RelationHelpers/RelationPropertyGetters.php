<?php

namespace App\Helpers\RelationHelpers;

trait RelationPropertyGetters
{
    public function getModelTypeNamespaceUrl()
    {
        return $this->modelTypeNamespaceUrl;
    }

    public function getModelTypeNameInCamelFormat()
    {
        return camel_case($this->getModelTypeName());
    }

    public function getModelTypeNameInSnakeFormat()
    {
        return snake_case($this->getModelTypeName());
    }

    public function getModelTypeName()
    {
        return getNamespaceUrlClassName($this->modelTypeNamespaceUrl);
    }

    public function getManyToOneFieldName()
    {
        return convertTypeToRelationFieldName($this->modelTypeNamespaceUrl);
    }

    public function getManyToManyFieldName(string $relatedModelTypeName)
    {
        return getManyToManyRelationshipFieldName($this->modelTypeNamespaceUrl, $relatedModelTypeName);
    }

    public function getColumnWithTableName()
    {
        return $this->getTableName() . '.' . $this->getColumnName();
    }

    public function getTableName()
    {
        $modelTypeName = $this->getModelTypeNamespaceUrl();
        return $modelTypeName::getTableName();
    }

    public function getColumnName()
    {
        return $this->columnName;
    }

    public function getNameInCamelFormat()
    {
        return camel_case($this->name);
    }

    public function getNameInSnakeFormat()
    {
        return snake_case($this->name);
    }
}