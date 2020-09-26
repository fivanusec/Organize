<?php

use app\utils\Flash;

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->escapeHTML($this->title); ?></title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="/public/JS/header.js"></script>
    <script type="text/javascript" src="/public/JS/jquery-3.4.1.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="<?= $this->makeURL('home/index') ?>" class="navbar-brand">
            Organize!
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
            </ul>
        </div>
        <?php if(isset($_SESSION[app\utils\Config::get("SESSION_USER")])): ?>
            <?php $ID = app\utils\Session::get(app\utils\Config::get("SESSION_USER")); ?>
            <a href="<?= $this->makeURL("User/dash/{$ID}"); ?>" class="nav-link" id="signinBtn">My organize</a>
        <?php else: ?>
            <a href="<?= $this->makeURL("Login/index"); ?>" class="nav-link" id="signinBtn">Sign in</a>
        <?php endif;?>
    </nav>
    <?php if (($danger = Flash::danger())) : ?>
        <div class="row justify-content-center fixed-top" style="margin-top:70px;">
            <div class="col-md-6 text-center">
                <div class="alert alert-danger" id="danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Oh snap!</strong>
                    <?= $danger; ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    if (($info = Flash::info())) :
    ?>
        <div class="row justify-content-center fixed-top" style="margin-top:70px;">
            <div class="col-md-6 text-center">
                <div class="alert alert-info" id="info" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Heads up!</strong>
                    <?= $info; ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    if (($success = Flash::success())) :
    ?>
        <div class="row justify-content-center fixed-top" style="margin-top:70px;">
            <div class="col-md-6 text-center">
                <div class="alert alert-success" id="success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Success!</strong>
                    <?= $success; ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    if (($warning = Flash::warning())) :
    ?>
        <div class="row justify-content-center fixed-top" style="margin-top:70px;">
            <div class="col-md-6 text-center">
                <div class="alert alert-warning" id="warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Warning!</strong>
                    <?= $warning; ?>
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>
    <script>
        $("#success").fadeTo(2000, 500).slideUp(500, function() {
            $("#success").slideUp(500);
        });

        $("#danger").fadeTo(2000, 500).slideUp(500, function() {
            $("#danger").slideUp(500);
        });

        $("#info").fadeTo(2000, 500).slideUp(500, function() {
            $("#info").slideUp(500);
        });

        $("#warning").fadeTo(2000, 500).slideUp(500, function() {
            $("#warning").slideUp(500);
        });
    </script>