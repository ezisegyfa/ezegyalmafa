<?php 
    $id = $id ?? snake_case(lcfirst($title))
?>

<table class="display" id="{{ $id }}Table" width="100%" dataRoute="{{ isset($dataRoute) ? url($dataRoute) : '' }}">
    <thead>
        @component('layouts.components.dataTableHeaderRow', [
            'columnNames' => $columnNames,
            'editButtonColumn' => isset($editButtonColumn),
            'deleteButtonColumn' => isset($deleteButtonColumn),
            'showButtonColumn' => isset($showButtonColumn),
            'buttonColumns' => $buttonColumns ?? []
        ])
        @endcomponent
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        @component('layouts.components.dataTableHeaderRow', [
            'columnNames' => $columnNames,
            'editButtonColumn' => isset($editButtonColumn),
            'deleteButtonColumn' => isset($deleteButtonColumn),
            'showButtonColumn' => isset($showButtonColumn),
            'buttonColumns' => $buttonColumns ?? []
        ])
        @endcomponent
    </tfoot>
</table>