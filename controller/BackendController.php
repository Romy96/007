<?php

require(ROOT . "model/LoginModel.php");

function index() 
{
	if ( IsLoggedInSession()==false ) {
	echo "U heeft nog niet ingelogd";
	render('login/login');
	exit;
	}

	elseif ( IsLoggedInSession()==true && IsCustomer()==true)
	{
		echo 'Verboder toegang!';
		render("login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin()==true)
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

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditUser() == false)
	{
		echo 'U heeft daar geen recht op!';
		renderBackend("backend/users", array(
			'users' => getAllUsers()
		));
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditUser() == true)
	{ 
		//Roep functie op met id in het variable
		$user = getUser($id);


		//Als het leeg geef, dan geef het alleen deze zin weer.
		if(empty($user)) {
			echo ('Geen resultaat');
		}

		//Roep functie op met id in het variable
		$roles = GetAllRolesWithChecksForUserId($id);


		//Als het leeg geef, dan geef het alleen deze zin weer.
		if(empty($roles)) {
			echo ('Geen resultaat');
		}

		//Als id bestaan, geef dan formulier weer.
		if (isset($id)) {
			renderBackend("backend/edit", array(
				'user' => $user,
				'roles' => $roles
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

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditUser() == false)
	{
		echo 'U heeft daar geen recht op!';
		renderBackend("backend/users", array(
			'users' => getAllUsers()
		));
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditUser() == true)
	{ 
		if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['roles'])) {
			echo 'U heeft een veld niet ingevuld';
			$user = getUser($id);
			renderBackend("backend/edit", array(
				'user' => $user
			));
		}

		// Als de waardes van de velden in het formulier bestaan, voer dan functie uit.
		if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['roles'])) {
			//die('stop');
			editUser($id, $_POST['username'], $_POST['password'], $_POST['email'] , $_POST['roles']);
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

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditTheirOwnProfile() == false)
	{
		echo 'U heeft daar geen recht op!';
		renderBackend("backend/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditTheirOwnProfile() == true)
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

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditTheirOwnProfile() == false)
	{
		echo 'U heeft daar geen recht op!';
		renderBackend("backend/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditTheirOwnProfile() == true)
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
				'user' => $user
			));
		}
		else 
		{
			renderBackend("backend/profile", array(
				'user' => $user
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

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditTheirOwnProfile() == false)
	{
		echo 'U heeft daar geen recht op!';
		renderBackend("backend/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true && CanEditTheirOwnProfile() == true)
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

function products()
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
		$products = AllProducts();

		//Als het leeg geef, dan geef het alleen deze zin weer.
		if(empty($products)) {
			echo ('Geen resultaat');
			renderBackend("backend/index");
			exit;
		}

		//Als id bestaan, geef dan formulier weer.
		if (isset($products)) {
			renderBackend("backend/products", array(
				'products' => $products
			));
		}
		else 
		{
			//Zoniet, dan terug naar het tabel.
			renderBackend("backend/index");
		}

	}
}

function create_product() 
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
		renderBackend("backend/create_product");
	}
}

function insert_product()
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
		if (empty($_POST['product']) || empty($_POST['price']) || empty($_POST['category']) || empty($_POST['description']) || empty($_POST['amount']))
		{
			echo 'U heeft één van de velden niet ingevuld!';
			renderBackend("backend/create_product");
			exit;
		}

		if(isset($_POST['product']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['description']) && isset($_POST['amount']))
		{
			$target_dir = "img/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        CreateProduct($_POST['product'], $_POST['price'], $_POST['category'], $_POST['description'], $_POST['amount'], $_FILES['fileToUpload']);
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}

			$products = AllProducts();
			renderBackend("backend/products", array(
				'products' => $products
			));
			exit;
		}
		else
		{
			echo 'Het is niet gelukt om het product in de database toe te voegen!';
			renderBackend("backend/create_product");
			exit;
		}
	}
}

function edit_product($id = '')
{
	$product = getProductbyId($id);

	if (empty($product))
	{
		echo 'product niet gevonden!';
		$products = AllProducts();
		renderBackend("backend/products", array(
			'products' => $products
		));
	}

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
		if(isset($product))
		{
			renderBackend("backend/edit_product", array(
				'product' => $product
			));
		}
		else
		{
			$products = AllProducts();
			renderBackend("backend/products", array(
				'products' => $products
			));
		}
	}
}

function delete_product($id)
{
	$product = getProductbyId($id);

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
		if(isset($product))
		{
			unlink("img/" . $product['image']);
			DeleteProduct($id);
			$products = AllProducts();
			renderBackend("backend/products", array(
				'products' => $products
			));
			exit;
		}
		else
		{
			echo 'Het is niet gelukt om het product te verwijderen!';
			$products = AllProducts();
			renderBackend("backend/products", array(
				'products' => $products
			));
		}
	}
}

function save_product($id = '')
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

	elseif ( IsLoggedInSession()==true && IsAdmin() == true)
	{
		if (empty($_POST['product']) || empty($_POST['price']) || empty($_POST['category']) || empty($_POST['description']) || empty($_POST['amount']))
		{
			echo 'U heeft één van de velden niet ingevuld!';
			$product = getProductbyId($id);

			if(isset($product))
			{
				renderBackend("backend/edit_product", array(
					'product' => $product
				));
			}
			else
			{
				$products = AllProducts();
				renderBackend("backend/products", array(
					'products' => $products
				));
			}
		}

		if(isset($_POST['product']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['description']) && isset($_POST['amount']))
		{
			$target_dir = "img/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    	$currentProduct = getProductbyId($_POST['id']);
					unlink("img/" . $currentProduct['image']);
			        EditProduct($_POST['id'], $_POST['product'], $_POST['price'], $_POST['category'], $_POST['description'], $_POST['amount'], $_FILES['fileToUpload']);
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}

			$products = AllProducts();
			renderBackend("backend/products", array(
				'products' => $products
			));
			exit;
		}
		else
		{
			echo 'Het is niet gelukt om het product in de database toe te voegen!';
			$product = getProductbyId($id);

			if(isset($product))
			{
				renderBackend("backend/edit_product", array(
					'product' => $product
				));
			}
			else
			{
				$products = AllProducts();
				renderBackend("backend/products", array(
					'products' => $products
				));
			}
		}
	}
}

function roles()
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
		$roles = getAllRoles();

		if(!isset($roles))
		{
			echo 'Geen rollen gevonden!';
			renderBackend("backend/index");
			exit;
		}
		elseif (isset($roles))
		{
			renderBackend("backend/roles", array(
				'roles' => $roles
			));
		}
	}
}

function create_role()
{
	if ( IsLoggedInSession()==false ) 
	{
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
		renderBackend("backend/create_role");
	}
}

function insert_role()
{
	if ( IsLoggedInSession()==false ) 
	{
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
		if(empty($_POST['role']))
		{
			echo 'De velden zijn leeg!';
			header('location: ' . URL . 'backend/create_role');
			exit;
		}
		elseif(isset($_POST['role']))
		{
			createRole($_POST['role']);
			echo 'Er is een nieuw rol toegevoegd!';
			header('location: ' . URL . 'backend/roles');
			exit;
		}
	}
}

function permissions()
{
	if ( IsLoggedInSession()==false ) 
	{
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
		$permissions = getAllPermissions();

		if(!isset($permissions))
		{
			echo 'Geen resultaat!';
			header('location: ' . URL . 'backend/index');
			exit;
		}
		else
		{
			renderBackend("backend/permissions", array(
				'permissions' => $permissions
			));
		}
	}
}

function create_permission()
{
	if ( IsLoggedInSession()==false ) 
	{
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
		$roles = getAllRoles();

		if(!isset($roles))
		{
			echo 'Geen rollen gevonden!';
			header('location: ' . URL . 'backend/permissions');
			exit;
		}
		else
		{
			renderBackend("backend/create_permission", array(
				'roles' => $roles
			));
		}
	}
}

function insert_permission()
{
	if ( IsLoggedInSession()==false ) 
	{
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
		if(!isset($_POST['displayname']) && !isset($_POST['description']) && !isset($_POST['role']))
		{
			echo 'Een aantal velden zijn niet ingevuld!';
			header("Location: " . URL . "backend/create_permission");
			exit;
		}
		else
		{
			createPermission($_POST['displayname'], $_POST['description'], $permission_id,  $_POST['role']);
			header("Location: " . URL . "backend/permissions");
			exit;
		}
	}
}

function search_user()
{
	if ( IsLoggedInSession()==false ) 
	{
		echo "U heeft nog niet ingelogd";
		render('login/login');
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "Verboden toegang!";
		header("Location: " . URL . "login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
	{
		if(empty($_REQUEST['term']))
		{
			echo 'Zoekterm niet ingevuld!';
			header("Location: " . URL . "backend/users");
			exit;
		}
		elseif(!empty($_REQUEST['term']))
		{
			$users = searchForUser($_REQUEST['term']);
			renderBackend("backend/users", array(
				'users' => $users
			));
		}
	}
}


function newsletters()
{
	if ( IsLoggedInSession()==false ) 
	{
		echo "U heeft nog niet ingelogd";
		render('login/login');
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == false)
	{
		echo "Verboden toegang!";
		header("Location: " . URL . "login/index");
		exit;
	}

	elseif ( IsLoggedInSession()==true && IsAdmin() == true )
	{
		$newsletters = getNewsletters();

		if(empty($newsletters))
		{
			echo 'Geen nieuwsbrieven gevonden!';
			header("Location: " . URL . "login/index");
			exit;
		}
		elseif(isset($newsletters))
		{
			renderBackend("backend/newsletters", array(
				'newsletters' => $newsletters
			));
		}
	}
}