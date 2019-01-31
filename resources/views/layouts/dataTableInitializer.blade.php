<script>
class DataTable {
    constructor(table)
    {
        this.tableUrl = "{{ URL::to('/') }}" + '/' + this.getTableName(table)
        this.addSearchInputsToTable(table)
        var dataTable = this.getDataTable(table)
        this.addSearchFunctionsToTable(dataTable)
    }

    getTableName(table)
    {
        var tableName = table.getAttribute('tableName')
        if (tableName)
            return tableName
        else
            return pluralize(table.id.replace('Table', ''))
    }

    addSearchInputsToTable(table)
    {
        $('#' + table.id + ' tfoot th').each(function () {
            if (this.getAttribute("databaseColumnName")) {
                $(this).html('<input type="text" placeholder="Search ' + $(this).text() + '"/>' )
            }
        })
    }

    getDataTable(table)
    {
        var dataRoute = table.getAttribute('dataRoute')
        if (!dataRoute || dataRoute === '')
            dataRoute = this.tableUrl + '/getQuery'
        return $('#' + table.id).DataTable({
            processing : true,
            serverSide : true,
            ajax : dataRoute,
            columns : this.getDataTableColumns(table)
        });
    }

    getDataTableColumns(table)
    {
        var columns = []
        var headerTags = table.getElementsByTagName('thead')[0].getElementsByTagName('tr')[0].getElementsByTagName('th')
        for (var i = 0; i < headerTags.length; ++i) {
            var columnName = headerTags[i].getAttribute("databaseColumnName")
            if (columnName)
                columns.push({ data : columnName})
            else if (headerTags[i].hasAttribute("deleteButtonColumn"))
                    columns.push(this.getColumnWithNullData(this.getDeleteButtonHtml, this.tableUrl))
            else {
                if (headerTags[i].hasAttribute("linkButtonColumn")) {
                    var buttonLink = headerTags[i].getAttribute("buttonlink")
                    var buttonText = headerTags[i].getAttribute("buttontext")
                    columns.push(this.getColumnWithNullData(this.getLinkButtonColumnHtml, buttonLink, buttonText))
                }
                else
                    console.log('Column nr. ' + i + ' is invalid')
            }
        }
        return columns;
    }

    getColumnWithNullData(renderHtmlFunction, ...otherParams)
    {
        return {
            "data":           'id',
            "defaultContent": "",
            render : function ( data, type, row, meta ) {
                return renderHtmlFunction(row, otherParams);
            }
        };
    }

    getDeleteButtonHtml(row, tableUrl)
    {
        return '<form method="POST" action="' + tableUrl + '/' + row.id + '" accept-charset="UTF-8">' +
                    '<input name="_method" value="DELETE" type="hidden">' + 
                    '{!! csrf_field() !!}' +
                    '<button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Delete Model?&quot;)">' +
                        '<span class="glyphicon glyphicon-trash" aria-hidden="true">' + "@lang('view.Delete')" + '</span>' +
                    '</button>' +
                '</form>'
    }

    getLinkButtonColumnHtml(row, buttonProperties)
    {
        return '<a href="' + buttonProperties[0] + '/' + Object.values(row)[0] + '" class="btn btn-info">' +
                    '<span class="glyphicon glyphicon-open" aria-hidden="true">' + buttonProperties[1] + '</span>' +
                '</a>';
    }

    addSearchFunctionsToTable(table)
    {
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
}
initDataTables()

function initDataTables()
{
    tables = document.getElementsByTagName('table')
    for (var i = 0; i < tables.length; i++)
        var d = new DataTable(tables[i]);
}

</script>