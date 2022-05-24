<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= url('admin/post/add') ?>" class="btn btn-primary">Add</a>
                <br>
                <br>
                <br>
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Aksi</th>
                            <th>Slug</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Foto</th>
                            <th>Tanggal</th>
                            <th>Active</th>
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
        var table = $('#example').DataTable({
            "ordering": false,
            processing: true,
            serverSide: true,
            columnDefs: [{
                "searchable": false,
                "visible": false,
                "targets": 0
            }],
            // stateSave: true,
            ajax: '<?= url('admin/post/datatables') ?>',
            "drawCallback": function(settings) {
                delete_handler();
            }
        });

        function delete_handler() {
            $('.delete_handler').click(function() {
                var primary_val = $(this).attr('primary_val');
                console.log(primary_val);

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
                            $.get("<?= url('admin/post/delete') ?>/" + primary_val, function(data) {
                                table.ajax.reload(null, false);
                            });

                        }
                    }
                });
            });
        }


    });


    // function delete_handler(id) {
    //     bootbox.confirm({
    //         message: "Yakin Menghapus Data?",
    //         buttons: {
    //             confirm: {
    //                 label: 'Yes',
    //                 className: 'btn-danger'
    //             },
    //             cancel: {
    //                 label: 'No',
    //                 className: 'btn-secondary'
    //             }
    //         },
    //         callback: function(result) {
    //             if (result) {
    //                 window.location.href = '<?= url('admin/post/delete/') ?>/' + id;
    //             }
    //         }
    //     });
    // }
</script>