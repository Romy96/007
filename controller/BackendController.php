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