<?php

namespace App\Helpers\ModelHelpers;

use App\Helpers\ModelHelpers\ModelRecursiveMethods;
use App\Helpers\ModelHelpers\ModelFilterMethods;
use Yajra\DataTables\Datatables;
use Log;

/**
 * Execute database methods with updating related tables.
 */
trait ModelHelperMethods
{
    use ModelRecursiveMethods, ModelFilterMethods;

    public function getResource()
    {
    	$resourceClassName = $this->getResourceClassName();
    	return new $resourceClassName($this);
    }

    public function getResourceClassName()
    {
        $className = get_class($this);
        $classNamespaceUrl = substr($className, 0, strripos($className, '\\'));
    	return str_replace($classNamespaceUrl, 'App\\Http\\Resources', $className)  . 'Resource';
    }

    public function getRenderValue()
    {
        $modelTypeName = get_called_class();
        $renderValue = '';
        foreach ($modelTypeName::$renderColumnNames as $columnName) {
            $columnValue = $this->$columnName;
            if (gettype($columnValue) == 'object')
                $renderValue .= $columnValue->getRenderValue();
            else
                $renderValue .= $columnValue;
            $renderValue .= ' - ';
        }
        return substr($renderValue, 0, strlen($renderValue) - 3);
    }

    public static function getDataTableQuery()
    {
        $query = Datatables::of(static::with(static::getRelationshipNames()));
        $query = static::addRenderValuesToDatatableQuery($query);
        return $query->make(true);
    }

    public static function addRenderValuesToDatatableQuery($query)
    {
        foreach (static::getRelationshipNames() as $relationColumnName) {
            $columnName = lcfirst(snake_case(removeGetSuffix($relationColumnName)));
            $query = $query->editColumn($columnName, function ($model) use($relationColumnName) {
                return $model->$relationColumnName->getRenderValue();
            });
        }
        return $query;
    }
}