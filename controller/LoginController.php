<?php

require(ROOT . "model/LoginModel.php");

function login()
{
	render("login/login");
}

function register()
{
	render("login/register");
}

function registerSave()
{
	// if fields are filled, call function
	if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
		createUser($_POST['firstname'], $_POST['prefix'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email']);
	}

	header("Location:" . URL . "login/login");
}