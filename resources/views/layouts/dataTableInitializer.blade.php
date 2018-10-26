<script>
class DataTable {
    constructor(table) {
        this.title = table.id.replace('Table', '')
        this.tableUrl = "{{ URL::to('/') }}" + '/' + this.title
        this.addSearchInputsToTable()
        var dataTable = this.getDataTable(table)
        this.addSearchFunctionsToTable(dataTable)
    }

    addSearchInputsToTable() {
        $('#' + this.title + 'Table tfoot th').each(function () {
            if (this.getAttribute("databaseColumnName"))
                $(this).html('<input type="text" placeholder="Search ' + $(this).text() + '"/>' );
        });
    }

    getDataTable(table) {
        var dataRoute = table.getAttribute('dataRoute')
        if (!dataRoute || dataRoute === '')
            dataRoute = this.tableUrl + '/getQuery'
        return $('#' + this.title + 'Table').DataTable({
            processing : true,
            serverSide : true,
            ajax : dataRoute,
            columns : this.getDataTableColumns(table)
        });
    }

    getDataTableColumns(table) {
        var columns = []
        var headerTags = table.getElementsByTagName('thead')[0].getElementsByTagName('tr')[0].getElementsByTagName('th')
        for (var i = 0; i < headerTags.length; ++i) {
            var columnName = headerTags[i].getAttribute("databaseColumnName")
            if (columnName)
                columns.push({ data : columnName})
            else {
                if (headerTags[i].hasAttribute("editButtonColumn"))
                    columns.push(this.getColumnWithNullData(
                        this.getLinkButtonColumnHtmlFirstPart(this.tableUrl), 
                        '/edit' + this.getLinkButtonColumnHtmlLastPart("@lang('view.Edit')"))
                    )
                else if (headerTags[i].hasAttribute("deleteButtonColumn"))
                    columns.push(this.getColumnWithNullData(
                        this.getDeleteButtonColumnHtmlFirstPart(this.tableUrl), 
                        this.getDeleteButtonColumnHtmlLastPart())
                    )
                else if (headerTags[i].hasAttribute("showButtonColumn"))
                    columns.push(this.getColumnWithNullData(
                        this.getLinkButtonColumnHtmlFirstPart(this.tableUrl + '/show'), 
                        this.getLinkButtonColumnHtmlLastPart("@lang('view.Show')"))
                    )
                else if (headerTags[i].hasAttribute("linkButtonColumn")) {
                    var buttonLink = headerTags[i].getAttribute("buttonLink")
                    var buttonText = headerTags[i].getAttribute("buttonText")
                    columns.push(this.getColumnWithNullData(
                        this.getLinkButtonColumnHtmlFirstPart(buttonLink), 
                        this.getLinkButtonColumnHtmlLastPart(buttonText))
                    )
                }
            }
        }
        return columns;
    }

    getColumnWithNullData(firstHtmlPart, lastHtmlPart) {
        return {
            "data":           'id',
            "defaultContent": "",
            render : function ( data, type, row, meta ) {
                return firstHtmlPart + row.id + lastHtmlPart;
            }
        };
    }


    getDeleteButtonColumnHtmlFirstPart() {
        return '<form method="POST" action="' + this.tableUrl + '/'
    }

    getDeleteButtonColumnHtmlLastPart() {
        return '" accept-charset="UTF-8">' +
                    '<input name="_method" value="DELETE" type="hidden">' + 
                    '{!! csrf_field() !!}' +
                    '<button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Delete Driver?&quot;)">' +
                        '<span class="glyphicon glyphicon-trash" aria-hidden="true">' + "@lang('view.Delete')" + '</span>' +
                    '</button>' +
                '</form>';
    }

    getLinkButtonColumnHtmlFirstPart(link) {
        return '<a href="' + link + '/'
    }

    getLinkButtonColumnHtmlLastPart(text) {
        return '" class="btn btn-info">' +
                    '<span class="glyphicon glyphicon-open" aria-hidden="true">' + text + '</span>' +
                '</a>';
    }

    addSearchFunctionsToTable(table) {
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

function initDataTables() {
    tables = document.getElementsByTagName('table')
    for (var i = 0; i < tables.length; i++)
        var d = new DataTable(tables[i]);
}

</script>