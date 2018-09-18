<table class="display" id="{{ snake_case(lcfirst($title)) }}Table" width="100%" dataRoute="{{ $dataRoute ?? '' }}">
    <thead>                            
        <tr>
            @foreach($columnNames as $columnName)
                <th databaseColumnName="{{ $columnName }}">@lang('view.' . $columnName)</th>
            @endforeach
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
        <tr>
            @foreach($columnNames as $columnName)
                <th databaseColumnName="{{ $columnName }}">@lang('view.' . $columnName)</th>
            @endforeach
            <th></th>
        </tr>
    </tfoot>
</table>