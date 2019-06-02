<tr>
	@foreach($columnNames as $columnName)
	    <th databaseColumnName="{{ $columnName }}">{{ $columnName }}</th>
	@endforeach
	@foreach($buttonColumns as $buttonColumn)
		@if($buttonColumn['text'] == __('view.delete'))
	    	<th deleteButtonColumn buttonLink="{{ $buttonColumn['link'] }}" buttonText="{{ $buttonColumn['text'] }}"></th>
		@else
	    	<th linkButtonColumn buttonLink="{{ $buttonColumn['link'] }}" buttonText="{{ $buttonColumn['text'] }}"></th>
		@endif
	@endforeach
</tr>