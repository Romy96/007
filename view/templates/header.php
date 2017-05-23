<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Webshop</title>	
	<link rel="stylesheet" href="<?= URL ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= URL ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= URL ?>css/style.css">
</head>
<body>
	<nav>
	<ul>
		<?php
		if(isset($_SESSION['userId'])):
		?>
		<li><i class="fa fa-user" aria-hidden="true"></i> Gebruiker: <?=$_SESSION['username']?> </li>
		<li><a href="<?= URL ?>login/logOut"><i class="fa fa-sign-out" aria-hidden="true"></i> Uitloggen </a></li>
		<li><a href="<?= URL ?>login/profile/<?= $_SESSION['userId'] ?>">Profiel</a></li>
		<?php
		; else:
		?>
		<li><a href="<?= URL ?>login/login"><i class="fa fa-sign-in" aria-hidden="true"></i> Login </a></li>
		<li><a href="<?= URL ?>login/register"><i class="fa fa-user-plus" aria-hidden="true"></i> Registreren </a></li>
		<?php
		endif;
		?>
	</ul>
	</nav>
