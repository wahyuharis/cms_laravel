<?php

use Illuminate\Support\Facades\DB;
?>
<div class="row">
    <div class="col-md-12">
        <h2><?= $post_detail->title ?></h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <img style="max-width: 100%;" src="<?= url('upload/' . $post_detail->image) ?>">
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?= $post_detail->content ?>
        <?php
        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $post_detail->post_date);


        $get_tags = DB::table('post_tags_rel')
            ->leftJoin('post_tags', 'post_tags.id_post_tags', '=', 'post_tags_rel.id_post_tags')
            ->where('post_tags_rel.id_post', $post_detail->id_post)
            ->get();
        ?>

        <?php foreach ($get_tags as $tagsrow) { ?>
            <a href="<?= url('post/bytags/?tags=' . urlencode($tagsrow->tags_name)) ?>" class="btn btn-secondary btn-sm"><?= $tagsrow->tags_name ?></a>
        <?php } ?>

        <p class="">
            Posted by
            <a href="#!"><?= $post_detail->username ?></a>
            on <?= $datetime->format('d M Y') ?>
        </p>
    </div>
</div>