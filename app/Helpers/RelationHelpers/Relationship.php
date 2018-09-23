<?php

namespace App\Helpers\RelationHelpers;

use ReflectionMethod;

class Relationship
{
    public $name;
    public $modelTypeName;

    public function __construct(ReflectionMethod $method)
    {
    	$this->name = $method->getName();
    	$this->modelTypeName = getMethodRelationshipModelName($method);
    }

    public function getModelTypeNamespaceUrl()
    {
        return 'App\\Models\\' . $this->modelTypeName;
    }

    public function getParentModelFieldName()
    {
    	return strtolower(snake_case($this->modelTypeName . '_id'));
    }

    public function getNameWithoutGetSuffix()
    {
        return lcfirst(removeGetSuffix($this->name));
    }

    public function getNameInCamelFormat()
    {
    	return camel_case($this->name);
    }

    public function getNameInSnakeFormat()
    {
    	return snake_case($this->name);
    }

    public function getModelTypeNameInCamelFormat()
    {
    	return camel_case($this->modelTypeName);
    }

    public function getModelTypeNameInSnakeFormat()
    {
    	return snake_case($this->modelTypeName);
    }
}
