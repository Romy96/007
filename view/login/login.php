<div class = "container">
	<div class="wrapper">
		<form action="<?= URL ?>login/login" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Hier kunt u inloggen</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="username" placeholder="Gebruikersnaam" required="" autofocus="" />
			  <input type="password" class="form-control" name="password" placeholder="Wachtwoord" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="submit">Login</button>  			
		</form>			
	</div>
</div>