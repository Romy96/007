<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Webshop</title>	
	<link rel="stylesheet" href="<?= URL ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= URL ?>css/bootstrap.min.css">
</head>
<body>
	<nav>
	<ul>
		<?php
		if(isset($_SESSION['userId'])):
		?>
		<li><a href="<?= URL ?>login/logOut"><i class="fa fa-sign-out" aria-hidden="true"></i> Uitloggen </a></li>
		<?php
		if (isset($_SESSION['roles'])): 
			if ($_SESSION['roles'] = "Admin"):
		?>
		<li><a href="<?= URL ?>backend/index"><i class="fa fa-server" aria-hidden="true"></i> Beheer </a></li>
		<?php
			endif;
		endif;
		?>
		<li><a href="<?= URL ?>login/profile/<?= $_SESSION['userId'] ?>"><i class="fa fa-user-secret" aria-hidden="true"></i>Profiel</a></li>
		<li><a href="<?= URL ?>login/products"><i class="fa fa-laptop" aria-hidden="true"></i> Producten </a></li>
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
