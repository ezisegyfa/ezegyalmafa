@component('layouts.components.dataTable', [
    'tableName' => $tableName,
    'columnNames' => $columnNames,
    'buttonColumns' => [
    	0 => [
    		'link' => url($tableName) . '/edit',
    		'text' => __('view.Edit')
    	],
    	1 => [
    		'link' => url($tableName) . '/show',
    		'text' => __('view.Show')
    	],
    	2 => [
    		'link' => url($tableName) . '/delete',
    		'text' => __('view.Delete')
    	],
    ]
])
@endcomponent   