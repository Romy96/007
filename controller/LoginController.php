<?php

require(ROOT . "model/LoginModel.php");

function index()
{
	$user = getAllUsers();

	if(empty($user)) 
	{
		echo 'Gebruiker niet gevonden';
		render("login/index");
		exit();
	}

	else 
	{
		render("login/index", array(
			'user' => $user
		));
	}
}

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

function delete($id) 
{
	$user = getUser($id);

	if(empty($user)) {
		echo 'Gebruiker niet gevonden';
		render("login/login");
		exit();
	}

	if (isset($id)) {
		render("login/delete", array(
			'user' => $user
		));
	}
	else {
		echo 'Id van gebruiker niet gevonden';
		render("login/login");
		exit();
	}
}

function deleteAction()
{
		//Als id bestaan, voer dan functie uit.
	if (isset($id)) {
		deleteUser($id);
	}

	//Nadat het uitgevoerd is, ga je terug naar het tabel voor resultaat.
	echo 'Gebruiker verwijderd!';
	header("Location:" . URL . "login/index");
}