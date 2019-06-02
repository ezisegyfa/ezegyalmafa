@component('layouts.components.dataTable', [
    'tableName' => $tableName,
    'columnNames' => $columnNames,
    'buttonColumns' => [
    	0 => [
    		'link' => url($tableName) . '/edit',
    		'text' => 'Edit'
    	],
    	1 => [
    		'link' => url($tableName) . '/show',
    		'text' => 'Show'
    	],
    	2 => [
    		'link' => url($tableName) . '/delete',
    		'text' => 'Delete'
    	],
    ]
])
@endcomponent   