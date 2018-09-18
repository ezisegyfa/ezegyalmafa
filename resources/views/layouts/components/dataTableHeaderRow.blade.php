@foreach($columnNames as $columnName)
    <th databaseColumnName="{{ $columnName }}">@lang('view.' . $columnName)</th>
@endforeach