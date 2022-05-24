<?php
$segment1 = strtolower(Request::segment(1));
$segment2 = strtolower(Request::segment(2));
$segment3 = strtolower(Request::segment(3));
?>

<li class="nav-item   ">
    <a href="<?= url("/") ?>/admin/" class="nav-link ">
        <i class="fas fa-tachometer-alt"></i>
        <p>
            Dashboard </p>
    </a>
</li>
<li class="nav-item   ">
    <a href="<?= url("/") ?>/admin/post" class="nav-link <?php if ($segment2 == 'post') echo 'active' ?>">
        <i class="far fa-newspaper"></i>
        <p>
            Post </p>
    </a>
</li>

<li class="nav-item ">
    <a href="<?= url("/") ?>/admin/category" class="nav-link <?php if ($segment2 == 'category') echo 'active' ?>">
        <i class="far fa-folder-open"></i>
        <p>
            Category </p>
    </a>
</li>
<li class="nav-item   ">
    <a href="<?= url("/") ?>/admin/tags" class="nav-link <?php if ($segment2 == 'tags') echo 'active' ?> ">
        <i class="fas fa-puzzle-piece"></i>
        <p>
            Tags </p>
    </a>
</li>

<li class="nav-item   ">
    <a href="<?= url("/") ?>/admin/images" class="nav-link <?php if ($segment2 == 'images') echo 'active' ?> ">
    <i class="fas fa-images"></i>
        <p>
            images </p>
    </a>
</li>

<li class="nav-item   ">
    <a href="<?= url("/") ?>/admin/user" class="nav-link <?php if ($segment2 == 'user') echo 'active' ?>">
        <i class="fas fa-users"></i>
        <p>
            User </p>
    </a>
</li>