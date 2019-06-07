<?php

namespace App\Helpers\ModelHelpers\ModelDatabaseHelpers;

use App\Helpers\ModelHelpers\Relationship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait ModelDatabaseMethods
{
	protected static $tableColumnNames = array();
    protected static function getColumnNames()
    {
        if (empty(static::$tableColumnNames))
            static::$tableColumnNames = getTableColumnNames(parent::getTableName());
        return static::$tableColumnNames;
    }

    public static function isRelationName(string $relationName)
    {
        return in_array($relationName, static::getRelationNames());
    }

    public static function getRelationNames()
    {
        return array_values(array_map(function($relationship) {
            return $relationship->name;
        }, static::getManyToOneRelationships()));
    }

    public static function isRelationColumnName(string $columnName)
    {
        return in_array($columnName, static::getRelationColumnNames());
    }

    protected static $acceptedRelationColumnNames = [];
    public static function getAcceptedRelationColumnNames()
    {
        if (empty(static::$acceptedRelationColumnNames))
            static::$acceptedRelationColumnNames = array_filter(static::getRelationColumnNames(), function($columnName) {
                return static::isAcceptedFormColumn($columnName);
            });
        return static::$acceptedRelationColumnNames;
    }

    protected static $relationColumnNames = [];
    public static function getRelationColumnNames()
    {
        if (empty(static::$relationColumnNames))
            static::$relationColumnNames = array_map(function($relationship) {
                return $relationship->getColumnName();
            }, static::getManyToOneRelationships());
        return static::$relationColumnNames;
    }

    public static function getColumnRelationship(string $columnName)
    {
        foreach (static::getManyToOneRelationships() as $relationship)
            if ($columnName === $relationship->getColumnName())
                return $relationship;
        return false;
    }

    protected static $manyToOneRelationships = array();
    public static function getManyToOneRelationships()
    {
        if (empty(static::$manyToOneRelationships)) {
            $relationships = getManyToOneRelationships(get_called_class());
            foreach ($relationships as $relationship)
                static::$manyToOneRelationships[$relationship->name] = $relationship;
        }
        return static::$manyToOneRelationships;
    }

    protected static $tableName;
    public static function getTableName()
    {
        if (!isset(static::$tableName) || !static::$tableName)
            static::$tableName = with(new static)->getTable();
        return static::$tableName;
    }

    public static function getManyToManyRelationFieldName(string $relatedModelName)
    {
        return getManyToManyRelationshipFieldName(get_called_class(), $relatedModelName);
    }

    public static function getAcceptedNonRelationColumnNames()
    {
        return array_filter(static::getNonRelationColumnNames(), function($columnName) {
            return static::isAcceptedFormColumn($columnName);
        });
    }

    public static function getNonRelationColumnNames()
    {
        $columnNames = static::getColumnNames();
        $relationColumnNames = array_map(function($relation) {
            return $relation->getColumnName();
        }, static::getManyToOneRelationships());
        $simpleColumnNames = array_filter($columnNames, function($columnName) use($relationColumnNames) {
            return !in_array($columnName, $relationColumnNames);
        });
        return $simpleColumnNames;
    }

    public static function groupByAllColumnQuery($query = null)
    {
        if (!$query)
            $query = static::query();
        return $query->groupBy(static::getColumnWithTableNames());
    }

    public static function getCurrentUserItems()
    {
        $user = \Auth::user();
        if ($user)
            return static::where('user_id', $user->id);
        else
            throw new \Exception('Must log in to get user items.', 500);
    }
}