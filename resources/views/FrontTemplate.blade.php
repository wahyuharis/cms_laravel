<?php

use Illuminate\Support\Facades\DB;

$tags = DB::table('post_tags')->get();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= env('APP_NAME') ?></title>
    <link rel="icon" type="image/x-icon" href="<?= url("/") ?>/favicon-front.ico" />
    <!-- Font Awesome icons (free version)-->
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= url("/gh-pages") ?>/css/styles.css" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#"><?= env('APP_NAME') ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('/home') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('/post') ?>">Post</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('/about') ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?= url('/contact') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('<?= url("/gh-pages") ?>/assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1><?= $page_title ?></h1>
                        <span class="subheading"><?= $page_subtitle ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?= $content ?>
            </div>
            <div class="col-md-4">

                <div class="row">
                    <div class="col-sm-12">
                        <form id="search-form" method="post" action="<?=url('post/search/')?>" >
                            <div class="form-floating">
                                <input class="form-control" id="search" name="search" type="text" placeholder="Search" data-sb-validations="required" />
                                <label for="search">Search</label>
                                <!-- <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div> -->
                            </div>
                            <br>
                            <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i> Search
                            </button>
                        </form>
                        <br><br><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php foreach ($tags as $row) { ?>
                            <span class="badge bg-secondary"><?= $row->tags_name ?></span> &nbsp;
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2022</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= url("/gh-pages") ?>/js/scripts.js"></script>
</body>

</html>