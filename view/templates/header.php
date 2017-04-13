<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Project</title>	
	<link rel="stylesheet" href="<?= URL ?>">
</head>
<body>
	<nav>
	<ul>
		<?php
		if(isset($_SESSION['userId'])):
		?>
		<li>Gebruiker: <?=$_SESSION['username']?></li>
		<li><a href="<?= URL ?>/login/logOut">Uitloggen</a></li>
		<li><a href="events_list.php">Beheer</a></li>
		<li><a href="<?= URL ?>login/profile/<?= $_SESSION['userId'] ?>">Profiel</a></li>
		<?php
		; else:
		?>
		<li><a href="<?= URL ?>login/login">Login</a></li>
		<li><a href="<?= URL ?>login/register">Registreren</a></li>
		<?php
		endif;
		?>
	</ul>
	</nav>
