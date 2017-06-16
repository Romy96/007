<?php

require(ROOT . "model/LoginModel.php");

function index()
{
	if(IsLoggedInSession()==false)
	{
		render("home/index");	
	}
	elseif (IsLoggedInSession()==true && IsAdmin() == false) 
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