<?php

function getDatabaseTableNames()
{
	$tableNames = array_map(function($tableData) {
		$tableDataArray = (array)$tableData;
		return array_values($tableDataArray)[0];
	}, \DB::select('SHOW TABLES'));
	return array_filter($tableNames, function($tableName) {
		return $tableName != 'migrations';
	});
}

function getTableModelTypeNamespaceUrl(string $tableName)
{
	return 'App\\Models\\' . getTableModelTypeName($tableName);
}

function getTableModelTypeName(string $tableName)
{
	return ucfirst(str_singular(camel_case($tableName)));
}

function getModelTypeNamespaceTableName(string $modelTypeNamespace)
{
	return getModelTypeNameTableName(getNamespaceUrlClassName($modelTypeNamespace));
}

function getModelTypeNameTableName(string $modelTypeName)
{
	return lcfirst(snake_case(str_plural($modelTypeName)));
}

function getSelectValue(string $tableName, string $columnName)
{
	$columnWithTableName = getColumnWithTableName($tableName, $columnName);
	return $columnWithTableName . ' AS ' . $columnWithTableName;
}

function getColumnWithTableName(string $tableName, string $columnName)
{
	return $tableName . '.' . $columnName;
}

function getRenderColumnSearchQuery(array $columnNames, string $searchedText)
{
	$query = 'CONCAT(';
    foreach ($columnNames as $renderColumnName)
        $query .= $renderColumnName . ', " - ", ';
    $query = substr($query, 0, strlen($query) - 9); 
    $query .= ') LIKE ' . $searchedText;
    return $query;
}

function getTableColumnNames(string $tableName)
{
	return DB::getSchemaBuilder()->getColumnListing($tableName);
}

function getTableColumnInfos(string $tableName)
{
	return DB::table('information_schema.columns')->where('table_schema', \DB::getDatabaseName())->where('table_name',$tableName)->get()->toArray();
}