<script>
initDataTables()

function initDataTables() {
    tables = document.getElementsByTagName('table')
    for (var i = 0; i < tables.length; i++)
        initDataTable(tables[i])
}

function initDataTable(table) {
    title = table.id.replace('Table', '')
    dataRoute = table.getAttribute('dataRoute')
    addSearchInputsToTable(title)
    var table = getDataTable(title, getDataTableColumnNames(table), dataRoute)
    addSearchFunctionsToTable(table)
}

function addSearchInputsToTable(title) {
    $('#' + title + 'Table tfoot th').each(function () {
    	if (this.getAttribute("databaseColumnName"))
        	$(this).html('<input type="text" placeholder="Search ' + $(this).text() + '"/>' );
    });
}

function getDataTable(title, columnNames, dataRoute = null) {
    if (!dataRoute || dataRoute === '')
        dataRoute = window.location.origin + '/' + title + '/getQuery'
    return $('#' + title + 'Table').DataTable({
        processing : true,
        serverSide : true,
        ajax : dataRoute,
        columns : getDataTableColumns(title, columnNames)
    });
}

function getDataTableColumns(title, columnNames) {
    var columns = []
    for (i = 0; i < columnNames.length; ++i)
        columns.push({ data : columnNames[i] })
    columns.push({ 
        "data":           null,
        "defaultContent": "",
        render : function ( data, type, row, meta ) {
            return getRowButtonsHtml(row, title);
        } 
    })
    return columns
}

function getRowButtonsHtml(row, title) {
    var tableUrl = window.location.origin + '/' + title + '/'
    return '<form method="POST" action="' + tableUrl + row.id + '" accept-charset="UTF-8">' +
                '<input name="_method" value="DELETE" type="hidden">' + 
                '{!! csrf_field() !!}' +
                '<div class="btn-group btn-group-xs pull-right" role="group">' +
                    '<a href="' + tableUrl + row.id + '/edit' + '" class="btn btn-primary">' +
                        '<span class="glyphicon glyphicon-pencil" aria-hidden="true">' + "@lang('view.Edit')" + '</span>' +
                    '</a>' +

                    '<button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Delete Driver?&quot;)">' +
                        '<span class="glyphicon glyphicon-trash" aria-hidden="true">' + "@lang('view.Delete')" + '</span>' +
                    '</button>' +
                '</div>' +
            '</form>';
}

function addSearchFunctionsToTable(table) {
    table.columns(function ( idx, data, node ) {
        return node.textContent != '';
    }).every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change', function() {

            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        }); 
    } );
}

function getDataTableColumnNames(table) {
    var headerTags = table.getElementsByTagName('thead')[0].getElementsByTagName('tr')[0].getElementsByTagName('th')
    var columnNames = []
    for (i = 0; i < headerTags.length; ++i) {
        var columnName = headerTags[i].getAttribute("databaseColumnName")
        if (columnName)
            columnNames.push(columnName)
    }
    return columnNames;
}
</script>