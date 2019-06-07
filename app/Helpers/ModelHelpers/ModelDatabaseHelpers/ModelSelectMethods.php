<?php

namespace App\Helpers\ModelHelpers\ModelDatabaseHelpers;

use App\Helpers\ModelHelpers\Relationship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait ModelSelectMethods
{
    public static function withRelationsQuery()
    {
        $query = static::select(static::getColumnsWithRelationsSelectValues());
        $tableName = static::getTableName();
        foreach (static::getManyToOneRelationships() as $relationship) {
            $relatedTableName = $relationship->getTableName();
            $query = $query->leftJoin($relatedTableName, $relatedTableName . '.id', $tableName . '.' . $relationship->getColumnName());
        }
        return $query;
    }

    public static function getColumnsWithRelationsSelectValues()
    {
        $columnSelectValues = static::getNonRelationColumnsSelectValues();
        foreach (static::getManyToOneRelationships() as $relationship) {
            $relatedModelTypeNamespaceUrl = $relationship->getModelTypeNamespaceUrl();
            $relatedRenderColumnsSelectValues = $relatedModelTypeNamespaceUrl::getRenderColumnSelectValues();
            $columnSelectValues = array_merge($columnSelectValues, $relatedRenderColumnsSelectValues);
        }
        return $columnSelectValues;
    }

    public static function getRenderColumnSelectValues()
    {
        $tableName = static::getTableName();
        return array_map(function($columnName) use($tableName) {
            return getSelectValue($tableName, $columnName);
        }, static::getRenderColumnNames());
    }

    public static function getAllColumnsSelectValues()
    {
        return static::getColumnsSelectValues(static::getColumnNames());
    }

    public static function getNonRelationColumnsSelectValues()
    {
        return static::getColumnsSelectValues(static::getNonRelationColumnNames());
    }

    public static function getColumnsSelectValues(array $columnNames)
    {
        $tableName = static::getTableName();
        return array_map(function($columnName) use($tableName) {
            return getSelectValue($tableName, $columnName);
        }, $columnNames);
    }


    public static function getRenderColumnWithRelationsWithTableNames()
    {
        $columnSelectValues = static::getNonRelationColumnWithTableNames();
        foreach (static::getManyToOneRelationships() as $relationship) {
            $relatedModelTypeNamespaceUrl = $relationship->getModelTypeNamespaceUrl();
            $relatedRenderColumnWithTableNames = $relatedModelTypeNamespaceUrl::getRenderColumnWithTableNames();
            $columnSelectValues = array_merge($columnSelectValues, $relatedRenderColumnWithTableNames);
        }
        return $columnSelectValues;
    }

    public static function getTranslatedColumnWithTableNames()
    {
        return array_map(function($columnWithTableName) {
            return getColumnTranslatedName($columnWithTableName);
        }, static::getColumnWithTableNames());
    }

    public static function getColumnWithTableNames()
    {
        $tableName = static::getTableName();
        return array_map(function($columnName) use($tableName) {
            return getColumnWithTableName($tableName, $columnName);
        }, static::getColumnNames());
    }

    public static function getRenderColumnWithTableNames()
    {
        $tableName = static::getTableName();
        return array_map(function($columnName) use($tableName) {
            return getColumnWithTableName($tableName, $columnName);
        }, static::$renderColumnNames);
    }

    public static function getNonRelationColumnWithTableNames()
    {
        $tableName = static::getTableName();
        return array_map(function($columnName) use($tableName) {
            return getColumnWithTableName($tableName, $columnName);
        }, static::getNonRelationColumnNames());
    }
}