<?php

function getTableRequestRules(string $tableName)
{
	$requestRules = [];
	foreach (getTableColumnInfos($tableName) as $tableColumnInfo) {
		$currentRules = [];
		addRequiredRule($currentRules, $tableColumnInfo);
		addTypeRule($currentRules, $tableColumnInfo);
		addMaxRule($currentRules, $tableColumnInfo);
		addRelationRule($currentRules, $tableColumnInfo, $tableName);
		$requestRules[$tableColumnInfo->COLUMN_NAME] = createRuleString($currentRules);
	}
	return $requestRules;
}

function addRequiredRule(array &$rules, $tableColumnInfo)
{
	if ($tableColumnInfo->IS_NULLABLE == 'YES')
		array_push($rules, 'nullable');
	else if (!$tableColumnInfo->COLUMN_DEFAULT && $tableColumnInfo->EXTRA != 'auto_increment')
		array_push($rules, 'required');
}

function addTypeRule(array &$rules, $tableColumnInfo)
{
	if (strpos($tableColumnInfo->COLUMN_TYPE, 'int') !== false)
		array_push($rules, 'numeric');
	else if (strpos($tableColumnInfo->COLUMN_TYPE, 'datetime') !== false)
		array_push($rules, 'date');
	else if ($tableColumnInfo->COLUMN_NAME == 'email')
		array_push($rules, 'email');
	else if ($tableColumnInfo->COLUMN_NAME == 'password')
		array_push($rules, 'password');
}

function addMaxRule(array &$rules, $tableColumnInfo)
{
	if (strpos($tableColumnInfo->COLUMN_TYPE, 'varchar') !== false) {
		$openBracketPostition = strpos($tableColumnInfo->COLUMN_TYPE, '(');
		if ($openBracketPostition !== false) {
			$closeBracketPosition = strpos($tableColumnInfo->COLUMN_TYPE, ')');
			$lengthInfo = substr($tableColumnInfo->COLUMN_TYPE, $openBracketPostition + 1, $closeBracketPosition - $openBracketPostition - 1);
			array_push($rules, 'max:' . $lengthInfo);
		}
	}
}

function addRelationRule(array &$rules, $tableColumnInfo, string $tableName)
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
