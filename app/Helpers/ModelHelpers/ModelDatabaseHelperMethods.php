<?php

namespace App\Helpers\ModelHelpers;

use App\Helpers\ModelHelpers\Relationship;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Log;

trait ModelDatabaseHelperMethods
{
	protected static $tableColumnNames = array();
	protected static function getTableColumnNames()
	{
		if (empty($tableColumnNames))
			$tableColumnNames = DB::getSchemaBuilder()->getColumnListing(parent::getTableName());
		return $tableColumnNames;
	}

	public static function getTableName()
    {
        return with(new static)->getTable();
    }
    
    public static function getDatabaseColumnsFromArray(array $data)
    {
        $columnNames = static::getColumnNames();
        return collect($data)->filter(function($item, $key) use($columnNames) {
            return in_array($key, $columnNames);
        })->toArray();
    }

    public static function getColumnNames()
    {
        return Schema::getColumnListing(static::getTableName());
    }

    public static function getRelationshipNames()
    {
        return array_map(function($relationship) {
            return $relationship->name;
        }, getManyToOneRelationships(get_called_class()));
    }

    public static function getGetColumnRelationship(string $columnName)
    {
        $columnName = camel_case($columnName);
        foreach (getManyToOneRelationships(get_called_class()) as $relationship) {
            $relationColumnName = $relationship->getNameWithoutGetSuffix();
            if ($columnName === $relationColumnName)
                return $relationship->name;
        }
        return false;
    }
}