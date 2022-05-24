<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= url('admin/user/add') ?>" class="btn btn-primary">Add</a>
                <br>
                <br>
                <br>
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>id_users</th>
                            <th>Aksi</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "ordering": false,
            columnDefs: [{
                "searchable": false,
                "visible": false,
                "targets": 0
            }],
            // stateSave: true,
            ajax: '<?= url('admin/user/datatables') ?>',
        });
    });

    function delete_handler(id) {
        bootbox.confirm({
            message: "Yakin Menghapus Data?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-secondary'
                }
            },
            callback: function(result) {
                if (result) {
                    window.location.href = '<?= url('admin/user/delete') ?>/' + id;
                }
            }
        });
    }
</script>