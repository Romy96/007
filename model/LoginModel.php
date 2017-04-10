<?php

function createUser($firstname = null, $prefix = null, $lastname = null, $username = null, $password = null, $email = null, $IsAdmin)
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$prefix = isset($_POST['prefix']) ? $_POST['prefix'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$username = isset($_POST['username']) ? $_POST['username'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$IsAdmin = (isset($_POST['yes']))?1:0;
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

	if ($IsAdmin==1) {
		$sql = "INSERT INTO login(firstname, prefix, lastname, username, password, email, is_admin) VALUES (:firstname, :prefix, :lastname, :username, :password, :email, :IsAdmin)";
		$query = $db->prepare($sql);
		$query->execute(array(
			':firstname' => $firstname,
			':prefix' => $prefix,
			':lastname' => $lastname,
			':username' => $username,
			':password' => $password,
			':email' => $email,
			':IsAdmin' => $IsAdmin
			));
	}
	elseif ($IsAdmin==0) {
			$sql = "INSERT INTO login(firstname, prefix, lastname, username, password, email) VALUES (:firstname, :prefix, :lastname, :username, :password, :email)";
		$query = $db->prepare($sql);
		$query->execute(array(
			':firstname' => $firstname,
			':prefix' => $prefix,
			':lastname' => $lastname,
			':username' => $username,
			':password' => $password,
			':email' => $email
			));
	}

	$db = null;
	
	return true;
}


function loginUser()
{
    $result1 = $db->prepare("SELECT * FROM login WHERE username = '$username' AND  password = '$password'");
 	$result1->execute();
    if($result1->rowCount() > 0 )
	{
		$_SESSION['logged in'] = true;
		$_SESSION['username'] = $username;
		$db = null;
		return true;
	}

	else
	{
		$db = null;
		return false;
	}
}

function IsLoggedInSession() {
	if (isset($_SESSION['logged in'])==false) {
		return 0;
	}
	else
	{
		return 1;
	}
}

function IsAdmin() {
	return (!empty($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1);
}

function getUser($id) 
=======
function checkEmail($email)
>>>>>>> ac36991e2a59d6a3468e1f756e96c9d79708a63c
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM login WHERE email=:email";
	$query = $db->prepare($sql);
	$query->execute(array(
		':email' => $email
		));

	$db = null;

	$user = $query->fetchAll();

	return $user;
}

function sendEmail()
{
	
}