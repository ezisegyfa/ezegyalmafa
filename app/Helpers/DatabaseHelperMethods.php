<?php

function getDatabaseTableNames()
{
	return collect(DB::select('SHOW TABLES'))->map(function($tableData) { 
		$tableDataArray = (array)$tableData;
		return array_values($tableDataArray)[0]; 
	})->toArray();
}
