<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= env("APP_NAME") ?></title>
    <link rel="icon" href="<?= url("/") ?>/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https:/fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= url("/") ?>/lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= url("/") ?>/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= url("/") ?>/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= url("/") ?>/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <!-- Select2 -->
    <link rel="stylesheet" href="<?= url("/") ?>/lte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= url("/") ?>/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= url("/") ?>/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- BS Fileinput -->

    <!-- Tostr -->
    <link rel="stylesheet" href="<?= url("/") ?>/toastr/build/toastr.min.css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?= url("/") ?>/lte/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="<?= url("/") ?>/lte/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="<?= url("/") ?>/lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= url("/") ?>/css_custom/custom.css">





    <!-- jQuery -->
    <script src="<?= url("/") ?>/lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= url("/") ?>/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- moment js -->
    <script src="<?= url("/") ?>/lte/plugins/moment/moment.min.js"></script>

    <script src="<?= url("/") ?>/lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>



    <!-- DataTables  & Plugins -->
    <script src="<?= url("/") ?>/lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/jszip/jszip.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- date-range-picker -->
    <script src="<?= url("/") ?>/js_custom/daterange_locale.js"></script>
    <script src="<?= url("/") ?>/lte/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="<?= url("/") ?>/lte/plugins/select2/js/select2.full.min.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= url("/") ?>/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= url("/") ?>/js-loading-overlay/dist/js-loading-overlay.min.js"></script>
    <script src="<?= url("/") ?>/toastr/build/toastr.min.js"></script>

    <!-- Summernote -->
    <script src="<?= url("/") ?>/lte/plugins/summernote/summernote-bs4.min.js"></script>

    <!-- bootbox -->
    <script src="<?= url("/") ?>/bootbox/dist/bootbox.all.min.js"></script>

     <!-- slugify -->
    <script src="<?= url("/") ?>/slugify.js-0.0.6/min/slugify.en.min.js"></script>

    <!-- nummeral -->
    <!-- <script src="<?= url("/") ?>/numeral/min/numeral.min.js"></script> -->

    <!-- currencyjs -->
    <!-- <script src="<?= url("/") ?>/js_custom/currency.js"></script> -->

    <script>
        $.extend(true, $.fn.dataTable.defaults, {
            "lengthMenu": [5, 10, 25, 50, 75, 100],
            "pageLength": 5,
            "processing": true
        });
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img  src="<?= url("/") ?>/assets/loading.gif" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="<?= url("/") ?>/lte/#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Superadmin </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= url("/") ?>/admin/password">Password</a>
                        <a class="dropdown-item" href="<?= url("/") ?>/logout">Logout</a>
                    </div>
                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= url("/") ?>/admin" class="brand-link">
                <img src="<?= url("/") ?>/app_icon.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= env('APP_NAME') ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= url("/") ?>/user-empty.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= Session::get('username') ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- <li class="nav-item">
                            <a href="<?= url("/") ?>/home" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Beranda</p>
                            </a>
                        </li> -->
                        @include('admin.template_sidemenu')

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <!-- <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= url("/") ?>/lte/#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol> -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?= $content ?>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Template by <a href="https:/adminlte.io/themes/v3/">AdminLTE.io</a>.</strong>

            <div class="float-right d-none d-sm-inline-block">
                <!-- <b>Version</b> 3.1.0 -->
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="<?= url("/") ?>/lte/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= url("/") ?>/lte/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?= url("/") ?>/lte/dist/js/pages/dashboard.js"></script> -->
    <script>
        $(document).ready(function() {

            <?php
            $error = Session::get('error_message');
            if (!empty(trim($error))) {
            ?>
                toastr.error('<?= $error ?>', 'Maaf!')

            <?php
            }
            ?>


        });
    </script>
</body>

</html>