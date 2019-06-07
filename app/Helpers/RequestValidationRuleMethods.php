<?php

function getIgnoredColumnNames()
{
	if (!array_key_exists('ignoredColumnNames', $GLOBALS))
		$GLOBALS['ignoredColumnNames'] = [
			'id',
			'created_at',
			'updated_at',
			'deleted_at'
		];
	return $GLOBALS['ignoredColumnNames'];
}

function getTableRequestRules(string $tableName)
{
	$requestRules = [];
	foreach (getTableColumnInfos($tableName) as $tableColumnInfo) {
		if (!in_array($tableColumnInfo->COLUMN_NAME, getIgnoredColumnNames())) {
			$currentRules = [];
			checkRequiredRule($currentRules, $tableColumnInfo);
			checkTypeRule($currentRules, $tableColumnInfo);
			checkMaxRule($currentRules, $tableColumnInfo);
			checkRelationRule($currentRules, $tableColumnInfo, $tableName);
			$requestRules[$tableColumnInfo->COLUMN_NAME] = createRuleString($currentRules);
		}
	}
	return $requestRules;
}

function checkRequiredRule(array &$rules, $tableColumnInfo)
{
	if ($tableColumnInfo->IS_NULLABLE == 'YES')
		array_push($rules, 'nullable');
	else if (is_null($tableColumnInfo->COLUMN_DEFAULT) && $tableColumnInfo->EXTRA != 'auto_increment')
		array_push($rules, 'required');
}

function checkTypeRule(array &$rules, $tableColumnInfo)
{
	if (strpos($tableColumnInfo->COLUMN_TYPE, 'int') !== false || strpos($tableColumnInfo->COLUMN_TYPE, 'double') !== false)
		array_push($rules, 'numeric');
	else if (strpos($tableColumnInfo->COLUMN_TYPE, 'datetime') !== false)
		array_push($rules, 'date');
	else if ($tableColumnInfo->COLUMN_NAME == 'email')
		array_push($rules, 'email');
}

function checkMaxRule(array &$rules, $tableColumnInfo)
{
	if (strpos($tableColumnInfo->COLUMN_TYPE, 'varchar') !== false) {
		$openBracketPostition = strpos($tableColumnInfo->COLUMN_TYPE, '(');
		if ($openBracketPostition !== false) {
			$closeBracketPosition = strpos($tableColumnInfo->COLUMN_TYPE, ')');
			$lengthInfo = substr($tableColumnInfo->COLUMN_TYPE, $openBracketPostition + 1, $closeBracketPosition - $openBracketPostition - 1);
			array_push($rules, 'string');
			array_push($rules, 'max:' . $lengthInfo);
		}
	}
}

function checkRelationRule(array &$rules, $tableColumnInfo, string $tableName)
{
	$modelTypeNamespaceUrl = getTableModelTypeNamespaceUrl($tableName);
	$columnName = $tableColumnInfo->COLUMN_NAME;
	if (in_array($columnName, $modelTypeNamespaceUrl::getRelationColumnNames())) {
		$relationship = $modelTypeNamespaceUrl::getColumnRelationship($columnName);
		$relatedTableName = $relationship->getTableName();
		array_push($rules, 'exists:' . $relatedTableName . ',id');
	}
}

function createRuleString(array $rules)
{
	$ruleString = '';
	foreach ($rules as $rule)
		$ruleString .= $rule . '|';
	return substr($ruleString, 0, strlen($ruleString) - 1);
}
