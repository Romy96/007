<?php

function createUser($firstname = null, $prefix = null, $lastname = null, $home_adress = null, $zip_code = null, $username = null, $password = null, $email = null)
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$prefix = isset($_POST['prefix']) ? $_POST['prefix'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$home_adress = isset($_POST['homeadress']) ? $_POST['homeadress'] : null;
	$zip_code = isset($_POST['zipcode']) ? $_POST['zipcode'] : null;
	$username = isset($_POST['username']) ? $_POST['username'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;
	$hash = md5($password);
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	
	if (strlen($firstname) == 0 || strlen($lastname) == 0 || strlen($home_adress) == 0 || strlen($zip_code) == 0 || strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0) {
		return false;
	}
	
	$db = openDatabaseConnection();


	$sql = "INSERT INTO login(firstname, prefix, lastname, home_adress, zip_code, username, password, email) VALUES (:firstname, :prefix, :lastname, :home_adress, :zip_code,:username, :password, :email)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':prefix' => $prefix,
		':lastname' => $lastname,
		':home_adress' => $home_adress,
		':zip_code' => $zip_code,
		':username' => $username,
		':password' => $hash,
		':email' => $email
	));

	$db = null;
	
	return true;
}


function loginUser($username = null, $password = null)
{
	$db = openDatabaseConnection();

	$username = $_POST['username'];
	$password = md5($_POST['password']);

    $result1 = $db->prepare("SELECT * FROM login WHERE username = '$username' AND  password = '$password'");
 	$result1->execute();
 	$row = $result1->fetch(PDO::FETCH_ASSOC);
 	$rowCount  = $result1->rowCount();

 	$login_id = $row['id'];

    if($rowCount == 1 )
	{
		$_SESSION['userId'] = $row['id'];
		$_SESSION['logged in'] = true;
		$_SESSION['username'] = $username;

		$result2 = $db->prepare("SELECT role_id FROM login_role WHERE login_id=:loginid");
 		$result2->execute(array(
 		':loginid' => $login_id
 		));
 		$roles = $result2->fetchAll();

 		if(isset($roles)) {
	 		foreach($roles as $row) {
				$role_id = $row['role_id'];

				$sql3 = "SELECT name FROM roles WHERE id = :roleid";
				$query3 = $db->prepare($sql3);
				$query3->execute(array(
					":roleid" => $role_id
				));
				$rolename = $query3->fetchAll();
				$_SESSION['roles'][] = $rolename[0]['name'];

				$result3 = $db->prepare("SELECT permission_id FROM permission_role WHERE role_id=:roleid");
 				$result3->execute(array(
 				':roleid' => $role_id
 				));
 				$permissions = $result3->fetchAll();

 				if(isset($permissions)) {
 					foreach ($permissions as $permission) {
	 					$permission_id = $permission['permission_id'];

						$sql4 = "SELECT displayname FROM permissions WHERE id = :permissionid";
						$query4 = $db->prepare($sql4);
						$query4->execute(array(
							":permissionid" => $permission_id
						));
						$displayname = $query4->fetchAll();
						$_SESSION['permissions'][] = $displayname[0]['displayname'];
 					}
 				}
			}
		}

		$db = null;
		return true;
	}

	else
	{
		$_SESSION['userid'] = null; 
		$_SESSION['username'] = null; 
		$_SESSION['roles'] = [];
		$_SESSION['permissions'] = [];
		$db = null;
		return false;
	}
}

function IsLoggedInSession() {
	if (isset($_SESSION['userId'])==false || empty($_SESSION['userId']) ) {
		return 0;
	}
	else
	{
		return 1;
	}
}

function IsAdmin() {
	return (!empty($_SESSION['roles']) && $_SESSION['roles'] = "Admin");
}

function IsCustomer() {
	return (!empty($_SESSION['roles']) && $_SESSION['roles'] == "Customer");
}

function CanEditUser() {
	return (!empty($_SESSION['permissions']) && $_SESSION['permissions'] = "Edit user");
}

function CanDeleteUser() {
	return (!empty($_SESSION['permissions']) && $_SESSION['permissions'] = "Delete user");
}

function CanEditTheirOwnProfile() {
	return (!empty($_SESSION['permissions']) && $_SESSION['permissions'] = "Edit their own profile");
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

function getAllRoles()
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM roles";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();	
}

function getAllPermissions() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM permissions";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function GetAllRolesWithChecksForUserId($id) {
	$db = openDatabaseConnection();

	$sql = "SELECT roles.* , login_role.* FROM roles LEFT JOIN login_role ON roles.id = login_role.role_id AND login_role.login_id = :id order by roles.id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
		));

	$db = null;
	return $query->fetchAll();
}
function GetRolesIdsForUserId($id) {
	$db = openDatabaseConnection();

	$sql = "SELECT role_id FROM login_role WHERE login_id = :id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
		));

	$db = null;
	return $query->fetchAll();
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

function checkEmail($email)
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

function LogOut() {
	echo "Logged out";
	header("location: ". URL ."login/login");

	unset($_SESSION['userId'], $_SESSION['username'], $_SESSION['isAdmin']);
	$_SESSION = [];
}

function editUser($id = null, $username = null, $password = null, $email = null, $role = null) 
{
	$username = isset($_POST['username']) ? $_POST['username'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;
	$hash = md5($password);
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$role_ids_to_add = isset($_POST['roles']) ? $_POST['roles'] : null;
	$userid = isset($_POST['id']) ? $_POST['id'] : null;

	//Bewerkt de patient als alles op orde loopt.
	$db = openDatabaseConnection();


	$sql2 = "UPDATE login SET username=:username, password=:password, email=:email WHERE id=:id";
	$query2 = $db->prepare($sql2);
	$query2->execute(array(
		':username' => $username,
		':password' => $hash,
		':email' => $email,
		':id' => $userid
		));

	$sql = "DELETE FROM login_role WHERE login_id = :id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $userid
	));

	foreach ($role_ids_to_add as $role_id) {
	$sql3 = "INSERT INTO login_role (login_id, role_id) VALUES (:id, :roleid)";
	$query3 = $db->prepare($sql3);
	$query3->execute(array(
		':id' => $userid,
		':roleid' => $role_id
		));
	}

	$db = null;
}


function saveProfile($id = null, $firstname = null, $prefix = null, $lastname = null, $home_adress = null, $zip_code = null, $username = null, $email = null)
{
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : null;
	$prefix = isset($_POST['prefix']) ? $_POST['prefix'] : null;
	$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : null;
	$home_adress = isset($_POST['homeadress']) ? $_POST['homeadress'] : null;
	$zip_code = isset($_POST['zipcode']) ? $_POST['zipcode'] : null;
	$username = isset($_POST['username']) ? $_POST['username'] : null;
	$email = isset($_POST['email']) ? $_POST['email'] : null;
	$id = isset($_POST['id']) ? $_POST['id'] : null;

	//Bewerkt de patient als alles op orde loopt.
	$db = openDatabaseConnection();

	$sql = "UPDATE login SET firstname=:firstname, prefix=:prefix, lastname=:lastname, home_adress=:home_adress, zip_code=:zip_code, username=:username, email=:email WHERE id=:id";
	$query = $db->prepare($sql);
	$query->execute(array(
		':firstname' => $firstname,
		':prefix' => $prefix,
		':lastname' => $lastname,
		':home_adress' => $home_adress,
		':zip_code' => $zip_code,
		':username' => $username,
		':email' => $email,
		':id' => $id
		));

	$db = null;
}

function editSaveProfile($id, $firstname, $prefix, $lastname, $home_adress, $zip_code, $username, $email)
{
	// create database connection
	$db = openDatabaseConnection();
	// prepare query and execute
	$sql = "UPDATE login SET firstname=:firstname, prefix=:prefix, lastname=:lastname, home_adress=:home_adress, zip_code=:zip_code, username=:username,  email=:email WHERE id=:id";
		$query = $db->prepare($sql);
		$query->execute(array(
		':id' => $id,
		':firstname' => $firstname,
		':prefix' => $prefix,
		':lastname' => $lastname,
		':home_adress' => $home_adress,
		':zip_code' => $zip_code,
		':username' => $username,
		':email' => $email
	));
	// close connection
	$db = NULL;
}

function AllProducts() 
{
	// create database connection
	$db = openDatabaseConnection();
	// prepare query and execute
	$sql = "SELECT * FROM products";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function SortProductsByCategory()
{
	// create database connection
	$db = openDatabaseConnection();
	// prepare query and execute
	$sql = "SELECT * FROM products ORDER BY category";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}