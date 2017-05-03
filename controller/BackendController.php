<?php

require(ROOT . "model/LoginModel.php");

function index() 
{
	if ( IsLoggedInSession()==false ) {
	echo "U heeft nog niet ingelogd";
	render('login/login');
	exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "Verboden toegang!";
		render("login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
	{
		renderBackend("backend/index");
	}

}

function users() 
{
	if ( IsLoggedInSession()==false ) {
	echo "U heeft nog niet ingelogd";
	render('login/login');
	exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "Verboden toegang!";
		render("login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
	{
		$users = getAllUsers();

		if(empty($users)) 
		{
			renderBackend("backend/users");
			exit();
		}

		else 
		{
			renderBackend("backend/users", array(
				'users' => $users
			));
			exit();
		}
	}
}

function edit($id = '')
{
	if ( IsLoggedInSession()==false ) {
	echo "U heeft nog niet ingelogd";
	render('login/login');
	exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "Verboden toegang!";
		render("login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
	{
		//Roep functie op met id in het variable
		$user = getUser($id);


		//Als het leeg geef, dan geef het alleen deze zin weer.
		if(empty($user)) {
			echo ('Geen resultaat');
		}

		//Als id bestaan, geef dan formulier weer.
		if (isset($id)) {
			renderBackend("backend/edit", array(
				'user' => $user,
			));
		}
		else 
		{
			//Zoniet, dan terug naar het tabel.
			renderBackend("backend/users", array(
				'users' => getAllUsers()
			));
		}
	}
}

function editSave($id = '') 
{
	if ( IsLoggedInSession()==false ) {
	echo "U heeft nog niet ingelogd";
	render('login/login');
	exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "Verboden toegang!";
		render("login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
	{
		if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
			echo 'U heeft een veld niet ingevuld';
			$user = getUser($id);
			renderBackend("backend/edit", array(
				'user' => $user
			));
		}

		// Als de waardes van de velden in het formulier bestaan, voer dan functie uit.
		if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
			//die('stop');
			editUser($id, $_POST['username'], $_POST['password'], $_POST['email']);
			header("Location:" . URL . "backend/users");
			exit();
		}
		else {
			//Zoniet, dan ga je terug naar het formulier.
			echo 'Geen resultaat';
			$user = getUser($id);
			renderBackend("backend/edit", array(
				'user' => $user
			));
			exit();
		}
	}
}

function profile($id = '') 
{
	if ( IsLoggedInSession()==false ) {
	echo "U heeft nog niet ingelogd";
	render('login/login');
	exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "Verboden toegang!";
		render("login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
	{
		//Roep functie op met id in het variable
		$user = getUser($id);


		//Als het leeg geef, dan geef het alleen deze zin weer.
		if(empty($user)) {
			echo ('Geen resultaat');
		}

		//Als id bestaan, geef dan formulier weer.
		if (isset($id)) {
			renderBackend("backend/profile", array(
				'user' => $user,
			));
		}
		else 
		{
			//Zoniet, dan terug naar het tabel.
			renderBackend("backend/index");
		}
	}
}

function editProfile($id = '')
{
	if ( IsLoggedInSession()==false ) {
	echo "U heeft nog niet ingelogd";
	render('login/login');
	exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "Verboden toegang!";
		render("login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
	{
		//Roep functie op met id in het variable
		$user = getUser($id);


		//Als het leeg geef, dan geef het alleen deze zin weer.
		if(empty($user)) {
			echo ('Geen resultaat');
		}

		//Als id bestaan, geef dan formulier weer.
		if (isset($id)) {
			renderBackend("backend/editProfile", array(
				'user' => $user,
			));
		}
		else 
		{
			renderBackend("backend/profile", array(
				'user' => $user,
			));
		}
	}
}

function profileSave($id = '')
{
	if ( IsLoggedInSession()==false ) {
	echo "U heeft nog niet ingelogd";
	render('login/login');
	exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "Verboden toegang!";
		render("login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
	{
		if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['homeadress']) || empty($_POST['zipcode']) || empty($_POST['username'])  || empty($_POST['email'])) {
			echo 'U heeft een veld niet ingevuld';
			$user = getUser($id);
			renderBackend("backend/editProfile", array(
				'user' => $user
			));
			exit();
		}

		// Als de waardes van de velden in het formulier bestaan, voer dan functie uit.
		if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['homeadress']) && isset($_POST['zipcode']) && isset($_POST['username'])  && isset($_POST['email'])) {
			//die('stop');
			saveProfile($id, $_POST['firstname'], $_POST['prefix'], $_POST['lastname'], $_POST['homeadress'], $_POST['zipcode'], $_POST['username'], $_POST['email']);
			$user = getUser($id);
			renderBackend("backend/profile", array(
				'user' => $user
			));
			exit();
		}
		else {
			//Zoniet, dan ga je terug naar het formulier.
			echo 'Geen resultaat';
			$user = getUser($id);
			renderBackend("backend/editProfile", array(
				'user' => $user
			));
			exit();
		}
	}
}



