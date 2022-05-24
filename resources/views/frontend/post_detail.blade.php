<div class="row">
    <div class="col-md-12">
        <h2><?= $post_detail->title ?></h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <img src="<?= url('upload/' . $post_detail->image) ?>">
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $post_detail->content ?>


        <?php
        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $post_detail->post_date);
        ?>

        <p class="">
            Posted by
            <a href="#!"><?= $post_detail->username ?></a>
            on <?= $datetime->format('d M Y') ?>
        </p>
    </div>
</div>
