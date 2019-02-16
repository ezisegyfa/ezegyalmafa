@extends('layouts.crm')

@section('crmContent')
    <div class="panel-heading clearfix">
        <div class="pull-left">
            <h4 class="mt-3">@lang('view.' . $tableName)</h4>
        </div>

        <div class="btn-group btn-group-sm pull-right mb-3 mt-3" role="group">
            <a href="{{ route($tableName . '.create') }}" class="btn btn-success" title="@lang('view.Create New ' . str_replace('_', '', $tableName))">
                <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.create')</span>
            </a>
        </div>
    </div>
    
    @component('layouts.components.dataTableWithColumns', [
        'tableName' => $tableName,
        'columnNames' => $columnNames
    ])
    @endcomponent
@overwrite