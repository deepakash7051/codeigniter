    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <form class="form-inline">
                    <input id="txtName" type="text" placeholder="Name..." class="form-control mb-2 mr-sm-2 mb-sm-0" />
                    <input id="txtPlaceOfBirth" type="text" placeholder="Place Of Birth..." class="form-control mb-2 mr-sm-2 mb-sm-0" />
                    
                    <button id="btnSearch" type="button" class="btn btn-default">Search</button> &nbsp;
                    <button id="btnClear" type="button" class="btn btn-default">Clear</button>
                </form>
            </div>
            <div class="col-3">
                <button id="btnAdd" type="button" class="btn btn-default pull-right">Add New Record</button>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-12">
                <table id="grid"></table>
            </div>
        </div>
    </div>

    <div id="dialog" style="display: none">
        <input type="hidden" id="ID" />
        <form>
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="Name">
            </div>
            <div class="form-group">
                <label for="PlaceOfBirth">Place Of Birth</label>
                <input type="text" class="form-control" id="PlaceOfBirth" />
            </div>
            <button type="button" id="btnSave" class="btn btn-default">Save</button>
            <button type="button" id="btnCancel" class="btn btn-default">Cancel</button>
        </form>
    </div>

    <script type="text/javascript">
        var grid, dialog;
        function Edit(e) {
            $('#ID').val(e.data.id);
            $('#Name').val(e.data.record.Name);
            $('#PlaceOfBirth').val(e.data.record.PlaceOfBirth);
            dialog.open('Edit Player');
        }
        function Save() {
            var record = {
                ID: $('#ID').val(),
                Name: $('#Name').val(),
                PlaceOfBirth: $('#PlaceOfBirth').val()
            };
            $.ajax({ url: '/Players/Save', data: { record: record }, method: 'POST' })
                .done(function () {
                    dialog.close();
                    grid.reload();
                })
                .fail(function () {
                    alert('Failed to save.');
                    dialog.close();
                });
        }
        function Delete(e) {
            if (confirm('Are you sure?')) {
                $.ajax({ url: '/Players/Delete', data: { id: e.data.id }, method: 'POST' })
                    .done(function () {
                        grid.reload();
                    })
                    .fail(function () {
                        alert('Failed to delete.');
                    });
            }
        }
        $(document).ready(function () {
            grid = $('#grid').grid({
                primaryKey: 'ID',
                dataSource: '/Players/Get',
                uiLibrary: 'bootstrap4',
                columns: [
                    { field: 'ID', width: 48 },
                    { field: 'Name', sortable: true },
                    { field: 'PlaceOfBirth', title: 'Place Of Birth', sortable: true },
                    { title: '', field: 'Edit', width: 42, type: 'icon', icon: 'fa fa-pencil', tooltip: 'Edit', events: { 'click': Edit } },
                    { title: '', field: 'Delete', width: 42, type: 'icon', icon: 'fa fa-remove', tooltip: 'Delete', events: { 'click': Delete } }
                ],
                pager: { limit: 5, sizes: [2, 5, 10, 20] }
            });
            dialog = $('#dialog').dialog({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',
                autoOpen: false,
                resizable: false,
                modal: true
            });
            $('#btnAdd').on('click', function () {
                $('#ID').val('');
                $('#Name').val('');
                $('#PlaceOfBirth').val('');
                dialog.open('Add Player');
            });
            $('#btnSave').on('click', Save);
            $('#btnCancel').on('click', function () {
                dialog.close();
            });
            $('#btnSearch').on('click', function () {
                grid.reload({ name: $('#txtName').val(), placeOfBirth: $('#txtPlaceOfBirth').val() });
            });
            $('#btnClear').on('click', function () {
                $('#txtName').val('');
                $('#txtPlaceOfBirth').val('');
                grid.reload({ name: '', placeOfBirth: '' });
            });
        });
    </script>

<!--https://gijgo.com/grid/demos/bootstrap-4-table-->