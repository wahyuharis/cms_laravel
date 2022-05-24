<div class="row">
    <?php foreach ($images as $row) { ?>

        <div class="col-md-3 mb-5">
            <img src="<?= url('/general_upload/' . $row->images_name) ?>" style="max-width: 100%;max-height: 200px;" >
        </div>

    <?php } ?>
</div>