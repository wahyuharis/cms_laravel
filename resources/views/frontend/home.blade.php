<?php foreach ($post as $row) { ?>

<div class="post-preview">
    <a href="<?= url('post/detail/' . $row->slug) ?>">
        <h2 class="post-title"><?= $row->title ?></h2>
        <h3 class="post-subtitle"><?= substr(strip_tags($row->content), 0, 100) ?> ...</h3>
    </a>
    <?php
    $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $row->post_date);
    ?>
    <p class="post-meta">
        Posted by
        <a href="#!"><?= $row->username ?></a>
        on <?= $datetime->format('d M Y') ?>
    </p>
</div>
<?php } ?>
