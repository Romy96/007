<?php

require(ROOT . "model/LoginModel.php");

function index()
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
		header("Location:" . URL . "login/message");
		exit();
	}
}

function message()
{
	render("login/message");
}

function delete($id) 
{
	 if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}
	else
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
	header("Location:" . URL . "login/login");
}

function forgot()
{
	render("login/forgot");
}

function sendNewPassword()
{
	if (isset($_POST['email'])){
		$user = checkEmail($_POST['email']);
		if (!empty($user)) {
			header("Location:" . URL . "login/sendmail");
		}
	}

	echo "Hurray!!!";

	// header incomming!!!!
}

function sendmail()
{
	render("login/sendmail");
}

function profile($id)
{
	$profile = getUser($id);
	render("login/profile", array(
		'profile' => $profile
	));
}

function profileEdit($id)
{
	$profile = getUser($id);
	render("login/profileEdit", array(
		'profile' => $profile
	));
}

function profileEditSave($id)
{
	// if fields are filled, call function
	if (empty($_POST['password'])) {
		echo "Vul alle velden in!";
		profileEdit($id);
	}
	else if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
		editSaveProfile($_POST['id'], $_POST['firstname'], $_POST['prefix'], $_POST['lastname'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['is_admin']);
		header("Location:" . URL . "login/profile/" . $_SESSION['userId']);
	}
}