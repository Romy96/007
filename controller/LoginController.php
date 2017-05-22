<?php

require(ROOT . "model/LoginModel.php");

function index()
{
	if (IsLoggedInSession()==true && IsAdmin() == false) 
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
	elseif (IsLoggedInSession()==true && IsAdmin() == true)
	{
		renderAdmin("login/index");
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
	if ( IsLoggedInSession()==true ) {
		echo "U bent al ingelogd!";
		render("login/index");
		exit();
	}
	else 
	{
		if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['homeadress']) || empty($_POST['zipcode']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
			echo 'U heeft een veld niet ingevuld';
			render("login/register");
			exit();
		}

		// if fields are filled, call function
		if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['homeadress']) && isset($_POST['zipcode']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
			createUser($_POST['firstname'], $_POST['prefix'], $_POST['lastname'], $_POST['homeadress'], $_POST['zipcode'], $_POST['username'],  $_POST['password'], $_POST['email']);
			header("Location:" . URL . "login/message");
			exit();
		}
	}
}

function message()
{	if ( IsLoggedInSession()==true ) {
		echo "U hebt al een account!";
		render("login/index");
		exit();
	}
	else 
	{
		render("login/message");
	}
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
	 if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}
	else
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
}

function forgot()
{
	if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}
	else
	{
		render("login/forgot");
	}
}

function sendNewPassword()
{
	if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}
	else
	{
		if (isset($_POST['email'])){
			$user = checkEmail($_POST['email']);
			if (!empty($user)) {
				header("Location:" . URL . "login/sendmail");
			}
		}
	}

	echo "Hurray!!!";

	// header incomming!!!!
}

function sendmail()
{
	if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}
	else
	{
		render("login/sendmail");
	}
}

function profile($id)
{
	if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}
	elseif ( IsLoggedInSession()==true && CanEditTheirOwnProfile() == false)
	{
		echo 'U heeft daar geen recht op!';
		render("login/index");
		exit();
	}
	elseif ( IsLoggedInSession()==true && CanEditTheirOwnProfile() == true)
	{
		$profile = getUser($id);
		render("login/profile", array(
			'profile' => $profile
		));
	}
}

function profileEdit($id)
{
	if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}
	elseif ( IsLoggedInSession()==true && CanEditTheirOwnProfile() == false)
	{
		echo 'U heeft daar geen recht op!';
		render("login/index");
		exit();
	}
	elseif ( IsLoggedInSession()==true && CanEditTheirOwnProfile() == true)
	{
		$profile = getUser($id);
		render("login/profileEdit", array(
			'profile' => $profile
		));
	}
}

function profileEditSave($id)
{
	if ( IsLoggedInSession()==false ) {
		echo "U heeft nog niet ingelogd!";
		render("login/login");
		exit();
	}
	elseif ( IsLoggedInSession()==true && CanEditTheirOwnProfile() == false)
	{
		echo 'U heeft daar geen recht op!';
		render("login/index");
		exit();
	}
	elseif ( IsLoggedInSession()==true && CanEditTheirOwnProfile() == true)
	{
		// if fields are empty then go back to edit page
		if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['homeadress']) || empty($_POST['zipcode']) || empty($_POST['username']) || empty($_POST['email'])) {
			echo "Vul alle velden in!";
			profileEdit($id);
		}
		// if fields are filled then call function and go back to profile page
		else if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['homeadress']) && isset($_POST['zipcode']) && isset($_POST['username']) && isset($_POST['email'])) {
			editSaveProfile($_POST['id'], $_POST['firstname'], $_POST['prefix'], $_POST['lastname'], $_POST['homeadress'], $_POST['zipcode'], $_POST['username'], $_POST['email']);
			header("Location:" . URL . "login/profile/" . $_SESSION['userId']);
		}
	}
}
