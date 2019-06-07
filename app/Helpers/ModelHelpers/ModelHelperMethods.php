<?php

namespace App\Helpers\ModelHelpers;

use App\Helpers\ModelHelpers\ModelRecursiveMethods;
use App\Helpers\ModelHelpers\ModelFilterMethods;
use App\Helpers\ModelHelpers\ModelDatabaseHelpers\ModelDatabaseMethods;
use App\Helpers\ModelHelpers\ModelDatabaseHelpers\ModelSelectMethods;
use App\Helpers\ModelHelpers\ModelFormInfoMethods;
use Yajra\DataTables\Datatables;
use Illuminate\Database\Eloquent\Model;
use Log;

/**
 * Execute database methods with updating related tables.
 */
trait ModelHelperMethods
{
    use ModelRecursiveMethods, ModelFilterMethods, ModelDatabaseMethods, ModelSelectMethods, ModelFormInfoMethods;

    public function getResource()
    {
    	$resourceClassName = $this->getResourceClassName();
    	return new $resourceClassName($this);
    }

    public static function getResourceClassName()
    {
        $className = get_called_class();
        return str_replace(static::getNamespace(), 'App\\Http\\Resources', $className)  . 'Resource';
    }

    public static function getRequestClassName()
    {
        $className = get_called_class();
        return str_replace(static::getNamespace(), 'App\\Http\\Requests', $className)  . 'Request';
    }

    public static function getNamespace()
    {
        $className = get_called_class();
        return substr($className, 0, strripos($className, '\\'));
    }

    public static function getDataTableQuery($query = null)
    {
        if (!$query)
            $query = static::withRelationsQuery();
        $query = DataTables::of($query);
        $query = static::addRenderValuesToDatatableQuery($query);
        $query = static::addFiltersToDatatableQuery($query);
        return $query->make(true);
    }

    public static function addRenderValuesToDatatableQuery($query)
    {
        foreach (static::getManyToOneRelationships() as $relationship) {
            $columnName = static::getTableName() . '.' . $relationship->getColumnName();
            $relatedModelTypeName = $relationship->getModelTypeNamespaceUrl();
            $query->editColumn($columnName, function ($model) use($relatedModelTypeName) {
                $valueToRender = '';
                foreach ($relatedModelTypeName::getRenderColumnNames() as $renderColumnName) {
                    $propertyName = $relatedModelTypeName::getTableName() . '.' . $renderColumnName;
                    $valueToRender .= $model->$propertyName . ' - ';
                }
                return substr($valueToRender, 0, strlen($valueToRender) - 3);
            });
        }
        return $query;
    }

    public static function addFiltersToDatatableQuery($query)
    {
        foreach (static::getManyToOneRelationships() as $relationship) {
            $columnName = static::getTableName() . '.' . $relationship->getColumnName();
            $query = $query->filterColumn($columnName, function($query, $keyword) use($relationship){
                $query->whereRaw($relationship->getRenderColumnSearchQuery('"%' . $keyword . '%"'));
            });
        }
        return $query;
    }

    public function getRenderValue()
    {
        $renderValue = '';
        $modelTypeName = get_called_class();
        foreach ($modelTypeName::getRenderColumnNames() as $columnName) {
            $columnRelationship = static::getColumnRelationship($columnName);
            if ($columnRelationship)
                $renderValue .= $this->$columnRelationship->getRenderValue();
            else {
                $columnValue = $this->$columnName;
                if ($columnValue instanceof Model)
                    $renderValue .= $columnValue->getRenderValue();
                else
                    $renderValue .= $columnValue;
            }
            $renderValue .= ' - ';
        }
        return substr($renderValue, 0, strlen($renderValue) - 3);
    }

    public static function getRenderColumnNames()
    {
        if (isset(static::$renderColumnNames) && !empty(static::$renderColumnNames))
            return static::$renderColumnNames;
        else if (in_array('name', static::getColumnNames()))
            return ['name'];
        else
            return ['id'];
    }

    public static function getColumnRequestRules(string $columnName)
    {
        $modelRequestRules = static::getRequestRules();
        if (array_key_exists($columnName, $modelRequestRules))
            return $modelRequestRules[$columnName];
        else
            return '';
    }

    protected static $requestRules;
    public static function getRequestRules()
    {
        if (!isset(static::$requestRules))
            static::setRequestRules();
        return static::$requestRules;
    }
    public static function setRequestRules()
    {
        $requestFiles = getRequestNamespaceUrls();
        $requestTypeNamespaceUrl = static::getRequestClassName();
        if (in_array($requestTypeNamespaceUrl, $requestFiles))
            static::$requestRules = (new $requestTypeNamespaceUrl)->rules();
        else
            static::$requestRules = getTableRequestRules(static::getTableName());
    }

    public static function getTypeName()
    {
        return last(explode('\\', get_called_class()));
    }

    public static function getDataFromRequest($request)
    {
        $data = [];
        foreach ($request->all() as $key => $requestData)
            if (in_array($key, static::getColumnNames()))
                $data[$key] = $requestData;
        return $data;
    }
}