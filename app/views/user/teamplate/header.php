<?php
    use app\utils\Flash;
?>
<html>
	<title>
		<?= $data['title'] ?>
	</title>
	<head>
		<link rel="stylesheet" href="/public/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body onload="loadDelete()">
	<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <a class="navbar-brand">
                Organize!
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                </ul>
            </div>
            <a href="<?= $this->makeUrl("login/logOut/{$this->user->ID}");?>" class="nav-link" style="color: white;">
                Log out
            </a>
        </nav>
        <?php if (($danger = Flash::danger())): ?>
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
        if (($info = Flash::info())):
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
        if (($success = Flash::success())):
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
        if (($warning = Flash::warning())):
        ?>
            <div class="alert alert-warning" role="alert"><strong>Warning!</strong> <?= $this->$warning; ?></div>
            <div class="row justify-content-center fixed-top" style="margin-top:70px;">
                <div class="col-md-6 text-center">
                    <div class="alert alert-warning" id="warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Ammmmmm!</strong>
                        <?= $warning ?>
                    </div>
                    </div>
                </div>
        <?php
        endif;
        ?>
        <script>
            $("#success").fadeTo(2000, 500).slideUp(500, function(){
                $("#success").slideUp(500);
            });

            $("#danger").fadeTo(2000, 500).slideUp(500, function(){
                $("#danger").slideUp(500);
            });

            $("#info").fadeTo(2000, 500).slideUp(500, function(){
                $("#info").slideUp(500);
            });

            $("#warning").fadeTo(2000, 500).slideUp(500, function(){
                $("#warning").slideUp(500);
            });
        </script>
        <br>
