<?php

require(ROOT . "model/LoginModel.php");

function index()
{
	if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}
	else
	{
		$user = getAllUsers();

		if(empty($user)) 
		{
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
}

function login()
{
	if ( IsLoggedInSession()==true ) {
		echo "U heeft al ingelogd!";
		render("login/index");
		exit();
	}
	else {
		if(isset($_POST["username"]) && isset($_POST["password"])) {
			if(loginUser($_POST['username'], $_POST['password']))
			{
				header("Location:" . URL . "login/index");
				exit();
			}else{
				render("login/login");
				echo 'ownee het is een fout help';
				exit();
			}
		}
		else
		{
			render("login/login");
			exit();
		}
	}
}

function register()
{
	if ( IsLoggedInSession()==true ) {
		echo "U bent al ingelogd!";
		render("login/index");
		exit();
	}
	else {
		render("login/register");
		exit();
	}
}

function registerSave()
{

	if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
		echo 'U heeft een veld niet ingevuld';
		render("login/register");
		exit();
	}

	// if fields are filled, call function
	if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
		createUser($_POST['firstname'], $_POST['prefix'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email']);
		header("Location:" . URL . "login/login");
		exit();
	}
}

function delete($id) 
{
	 if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "U bent wel ingelogd, maar u bent geen beheerder!";
		render("login/index");
		exit();
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
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
}

function deleteAction($id)
{
	$user = getUser($id);
	
		//Als id bestaan, voer dan functie uit.
	if (isset($id)) {
		deleteUser($id);
	}
	else
	{
		echo 'Id van gebruiker niet gevonden';
		render("login/delete", array(
			'user' => $user
		));
	}

	//Nadat het uitgevoerd is, ga je terug naar het tabel voor resultaat.
	echo 'Gebruiker verwijderd!';
	header("Location:" . URL . "login/index");
}