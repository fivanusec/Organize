<?php
    use app\utils\Flash;
?>
<html>
	<title>
		<?= $this->escapeHTML($this->title);?>
	</title>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/public/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
	<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <a class="navbar-brand">
                Organize!
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                </ul>
            </div>
            <a href="<?= $this->makeUrl("Login/logOut/{$this->user->ID}");?>" class="nav-link" style="color: white;">
                Log out
            </a>
        </nav>

        <br>
