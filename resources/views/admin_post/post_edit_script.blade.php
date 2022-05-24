<script>
    var loadFile = function(event) {
        var output = document.getElementById('image_uploaded');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

    $(document).ready(function() {

        $('input[name="post_date"]').daterangepicker({
            singleDatePicker: true,
            "locale": {
                "format": "YYYY-MM-DD",
            }
        });

        $('input[name="title"]').keyup(function() {
            title = $('input[name="title"]').val();
            sluggedtitle = Slugify.parse(title);

            var uniq = '-' + (new Date()).getTime();

            sluggedtitle = sluggedtitle + uniq;

            $('input[name="slug"]').val(sluggedtitle);
        });

        $('#active').select2();
        $('#id_post_category').select2();
        $('#tags').select2();

        $('#content').summernote({
            height: 250,
        });


        $('#form_1').submit(function(e) {
            e.preventDefault();
            JsLoadingOverlay.show();
            $.ajax({
                url: '<?= url('admin/post/submit') ?>', // Url to which the request is send
                type: "POST", // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                success: function(data) // A function to be called if request succeeds
                {
                    if (data.success) {
                        window.location = '<?= url('admin/post') ?>';
                        console.log(data);
                    } else {
                        toastr.error(data.message);
                    }
                    console.log(data);
                    JsLoadingOverlay.hide();
                },
                error: function(err, txt) {
                    JsLoadingOverlay.hide();
                    console.log(err);
                    // console.log('================');
                    // console.log(txt);
                    bootbox.alert({
                        size: "large",
                        title: '<span class="text-danger" >Error ' + err.status + '<span>',
                        message: '<iframe id="bootframe_err"  src="about:blank" style="width:100%;height:500px;border:none" ></iframe>',
                        onShown: function(e) {
                            var doc = document.getElementById('bootframe_err').contentWindow.document;
                            doc.open();
                            doc.write(err.responseText);
                            doc.close();
                        }
                    });
                }
            });
        });
    });
</script>