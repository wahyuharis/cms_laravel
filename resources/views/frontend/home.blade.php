<?php

use Illuminate\Support\Facades\DB;
?>

<?php foreach ($post as $row) { ?>

    <?php
    $get_tags = DB::table('post_tags_rel')
        ->leftJoin('post_tags', 'post_tags.id_post_tags', '=', 'post_tags_rel.id_post_tags')
        ->where('post_tags_rel.id_post', $row->id_post)
        ->get();

    ?>

    <div class="post-preview">
        <a href="<?= url('post/detail/' . $row->slug) ?>">
            <h2 class="post-title"><?= $row->title ?></h2>
            <h3 class="post-subtitle"><?= substr(strip_tags($row->content), 0, 100) ?> ...</h3>
        </a>
        <?php
        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $row->post_date);
        ?>
        <p class="post-meta">
            <?php foreach ($get_tags as $tagsrow) { ?>
                <span class="btn btn-secondary btn-sm" ><?=$tagsrow->tags_name?></span>
            <?php } ?>
            <br>
            Posted by
            <a href="#!"><?= $row->username ?></a>
            on <?= $datetime->format('d M Y') ?>
        </p>

    </div>
<?php } ?>