<?php 
    $id = $id ?? snake_case(lcfirst(str_singular($tableName)))
?>

<table class="display" id="{{ $id }}Table" dataRoute="{{ isset($dataRoute) ? url($dataRoute) : url($tableName) . '/getQuery' }}" tableName="{{ $tableName }}">
    <thead>
        @component('layouts.components.dataTableHeaderRow', [
            'columnNames' => $columnNames,
            'buttonColumns' => $buttonColumns ?? []
        ])
        @endcomponent
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        @component('layouts.components.dataTableHeaderRow', [
            'columnNames' => $columnNames,
            'buttonColumns' => $buttonColumns ?? []
        ])
        @endcomponent
    </tfoot>
</table>