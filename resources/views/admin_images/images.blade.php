<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <br>
                <input type="file" name="foto_uploader" id="foto_uploader" style="margin-left: 50px;">
                <br>
            </div>
            <div class="card-body" id="image_list" style="min-height: 500px;">


            </div>
        </div>
    </div>
</div>
<script>
    $(function() {


        function reload_imagelist() {
            $.ajax({
                url: '<?= url('admin/images_list/') ?>',
                type: 'get',
                success: function(response) {
                    console.log(response);
                    $('#image_list').html(response);
                }
            });
        }
        reload_imagelist();


        $('#foto_uploader').on('change', function() {
            var fd = new FormData();
            var files = $('#foto_uploader')[0].files;
            if (files.length > 0) {
                fd.append('image', files[0]);
                JsLoadingOverlay.show();
                $.ajax({
                    url: '<?= url('admin/images/upload/') ?>',
                    type: 'POST',
                    data: fd,
                    success: function(response) {
                        //reload list
                        reload_imagelist();
                        JsLoadingOverlay.hide();
                    },
                    error: function(err, xhr) {

                        JsLoadingOverlay.hide();
                    },
                    cache: false,
                    contentType: false,
                    processData: false

                });

            }

        });

    });
</script>