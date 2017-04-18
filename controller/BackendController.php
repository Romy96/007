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
		echo "U bent wel ingelogd, maar u bent geen admin.";
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

function edit($id = '')
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

function editSave($id = '') 
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