<div class="row">
    <?php foreach ($images as $row) { ?>

        <div class="col-md-3 mb-5">
            <span image_name="<?= $row->images_name ?>" class="btn btn-sm btn-danger image-list-delete">delete</span>
            <img src="<?= url('/general_upload/' . $row->images_name) ?>" style="max-width: 100%;max-height: 200px;">
        </div>

    <?php } ?>
</div>