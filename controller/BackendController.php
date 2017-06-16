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
			CreateProduct($_POST['product'], $_POST['price'], $_POST['category'], $_POST['description'], $_POST['amount']);
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
			EditProduct($_POST['id'], $_POST['product'], $_POST['price'], $_POST['category'], $_POST['description'], $_POST['amount']);
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