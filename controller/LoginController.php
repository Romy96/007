<?php

require(ROOT . "model/LoginModel.php");

function login()
{
	if(isset($_POST["username"]) && isset($_POST["password"])) {
		if(loginUser($_POST['username'], $_POST['password']))
		{
			header("Location:" . URL . "login/index");
		}else{
				render("login/login");
			echo 'ownee het is een fout help';
		}
	}
	else
	{
		render("login/login");
	}
}

function index()
{
	render("login/index");
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