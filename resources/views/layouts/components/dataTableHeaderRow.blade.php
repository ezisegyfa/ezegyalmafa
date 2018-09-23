<tr>
	@foreach($columnNames as $columnName)
	    <th databaseColumnName="{{ $columnName }}">@lang('view.' . $columnName)</th>
	@endforeach
	@if(isset($editButtonColumn) && $editButtonColumn)
		<th editButtonColumn></th>
	@endif
	@if(isset($deleteButtonColumn) && $deleteButtonColumn)
		<th deleteButtonColumn></th>
	@endif
	@if(isset($showButtonColumn) && $showButtonColumn)
		<th showButtonColumn></th>
	@endif
	@foreach($buttonColumns as $buttonColumn)
	    <th linkButtonColumn buttonLink="{{ $buttonColumn['link'] }}" buttonText="{{ $buttonColumn['text'] }}"></th>
	@endforeach
</tr>