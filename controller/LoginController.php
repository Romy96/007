<?php

require(ROOT . "model/LoginModel.php");

//index function
function index()
{
	// if you loggedsession is true en IsAdmin is false then get all users and all products
	if (IsLoggedInSession()==true && IsAdmin() == false) 
	{
		$user = getAllUsers();

		$products = AllProducts();

		if(empty($user)) 
		{
			render("login/index");
			exit();
		}

		else 
		{
			render("login/index", array(
				'user' => $user,
				'products' => $products
			));
		}
	}
	elseif (IsLoggedInSession()==true && IsAdmin() == true)
	{
		$products = AllProducts();

		renderAdmin("login/index", array(
			'products' => $products
		));
	}
}

// function login
function login()
{
	// if logged in session is true then echo u heeft al ingelogd
	if ( IsLoggedInSession()==true ) {
		echo "U heeft al ingelogd!";
		render("login/index");
		exit();
	}
	// else is the post username is set and password go tho login/index
	else {
		if(isset($_POST["username"]) && isset($_POST["password"])) {
			if(loginUser($_POST['username'], $_POST['password']))
			{
				header("Location:" . URL . "login/index");
				exit();
			}else{
				// else go to login/login and echo ownee het is een fout help
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
	// is session is logged is true echo u bent al ingelogd! and render login/index
	if ( IsLoggedInSession()==true ) {
		echo "U bent al ingelogd!";
		render("login/index");
		exit();
	}
	// else go to login/register
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

function product_info($id)
{
	if (IsLoggedInSession()==true && IsAdmin() == false) 
	{
		$product = getProductbyId($id);

		if(empty($product)) 
		{
			render("login/index");
			exit();
		}

		else 
		{
			render("login/product_info", array(
				'product' => $product
			));
		}
	}
	elseif (IsLoggedInSession()==true && IsAdmin() == true)
	{
		$product = getProductbyId($id);

		if(empty($product)) 
		{
			render("login/index");
			exit();
		}
		else 
		{
		renderAdmin("login/product_info", array(
			'product' => $product
		));
		}
	}
}

function AddProductToCart($product_id = '', $user_id = '')
{
	if (IsLoggedInSession()==false) 
	{
		echo 'U bent nog niet ingelogd!';
		render("login/login");
	}
	elseif (IsLoggedInSession()==true && IsAdmin()==false) 
	{
		if(empty($_POST['product_id']) && empty($_POST['user_id']))
		{
			echo 'producten niet gevonden!';
			$product = getProductbyId($product_id);
			render("login/product_info", array(
				'product' => $product
			));
		}
		elseif(isset($_POST['product_id']) && isset($_POST['user_id']))
		{
			AddToCart($_POST['product_id'], $_POST['user_id']);
			header("Location:" . URL . "login/shoppingcart/" . $_POST['user_id']);
		}
	}
		elseif (IsLoggedInSession()==true && IsAdmin()==true) 
		{
		if(empty($_POST['product_id']) && empty($_POST['user_id']))
		{
			echo 'id van product niet gevonden!';
			$product = getProductbyId($product_id);
			renderAdmin("login/product_info", array(
				'product' => $product
			));
		}
		elseif(isset($_POST['product_id']) && isset($_POST['user_id']))
		{
			AddToCart($_POST['product_id'], $_POST['user_id']);
			header("Location:" . URL . "login/shoppingcart/" . $_POST['user_id']);
		}
	}
}

function shoppingcart($user_id = '', $product_id = '')
{
	if (IsLoggedInSession()==false) 
	{
		echo 'U bent nog niet ingelogd!';
		render("login/login");
	}
	elseif (IsLoggedInSession()==true && IsAdmin()==false) 
	{
		$ProductsofUser = DisplayCartProducts($user_id, $product_id);

		if(!isset($ProductsofUser))
		{
			echo 'Geen producten gevonden!';
			$user = getAllUsers();
			$products = AllProducts();
			render("login/index", array(
				'user' => $user,
				'products' => $products
			));
		}
		elseif(isset($ProductsofUser))
		{
		render("login/shoppingcart", array(
			'ProductsofUser' => $ProductsofUser
		));
		}
	}
	elseif (IsLoggedInSession()==true && IsAdmin()==true) 
	{
		$ProductsofUser = DisplayCartProducts($user_id, $product_id);

		if(!isset($ProductsofUser))
		{
			echo 'Geen producten gevonden!';
			$products = AllProducts();
			renderAdmin("login/index", array(
				'products' => $products
			));
		}
		elseif(isset($ProductsofUser))
		{
		renderAdmin("login/shoppingcart", array(
			'ProductsofUser' => $ProductsofUser
		));
		}
	}
}

function remove_product($product_id = '', $user_id = '')
{	
	//var_dump($product_id);
	//var_dump($user_id);
	//die();

	if (IsLoggedInSession()==false) 
	{
		echo 'U bent nog niet ingelogd!';
		render("login/login");
	}
	elseif (IsLoggedInSession()==true && IsAdmin()==false) 
	{
		if (empty($product_id) && empty($user_id))
		{
			echo 'Product niet gevonden!';
			header('location: ' . URL . 'login/shoppingcart/' . $user_id);
			exit();
		}
		elseif (isset($product_id) && isset($user_id))
		{
			RemoveProductfromCart($product_id, $user_id);
			echo 'product is verwijderd!';
			header('location: ' . URL . 'login/shoppingcart/' . $user_id);
			exit();
		}
	}
	elseif (IsLoggedInSession()==true && IsAdmin()==true) 
	{
		if (empty($product_id) && empty($user_id))
		{
			echo 'Product niet gevonden!';
			$ProductsofUser = DisplayCartProducts($user_id, $product_id);
			header('location: ' . URL . 'login/shoppingcart/' . $user_id);
			exit();
		}
		elseif (isset($product_id) && isset($user_id))
		{
			RemoveProductfromCart($product_id, $user_id);
			echo 'product is verwijderd!';
			header('location: ' . URL . 'login/shoppingcart/' . $user_id);
			exit();
		}
	}
}