<?php

function createUser($firstname = null, $prefix = null, $lastname = null, $username = null, $password = null, $email = null)
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$prefix = isset($_POST['prefix']) ? $_POST['prefix'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$username = isset($_POST['username']) ? $_POST['username'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();

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

	$db = null;
	
	return true;
}

function loginUser($username = null, $password = null)
{     
	$username = $_POST["username"]; 
    $password = $_POST["password"]; 
    
    $db = openDatabaseConnection();

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

function getUser($id) 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM login WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));

	$db = null;

	return $query->fetch(PDO::FETCH_ASSOC);
}

function getAllUsers() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM login";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function deleteUser($id) 
{
	$db = openDatabaseConnection();

	$sql = "DELETE FROM login WHERE id=:id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		':id' => $id
	));

	$db = null;
}