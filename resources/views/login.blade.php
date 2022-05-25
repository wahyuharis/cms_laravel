<?php

// use Illuminate\Contracts\Session\Session;

// Session
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <title><?= env('APP_TITLE') ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url("/") ?>/favicon.ico">

    <link rel="stylesheet" href="<?= url('/') ?>/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= url('/') ?>/toastr/build/toastr.min.css">


    <script src="<?= url('/') ?>/jquery-3.6.0.min.js"></script>
    <script src="<?= url('/') ?>/bootstrap-4.0.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= url('/') ?>/toastr/build/toastr.min.js"></script>
</head>

<body> 
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <br><br><br>
                <h2>Login APP</h2>

                <div class="card">
                    <div class="card-body">
                        <form method="post" action="<?= url('/login/submit') ?>">
                            <div class="form-group">
                                <label for="email">Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
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