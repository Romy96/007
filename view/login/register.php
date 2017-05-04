<h1>Registreer</h1>
<form action="<?= URL ?>login/registerSave" method="post">
	<div>
		<label for="firstname">Firstname:</label>
		<input class="form-control"  type="text" name="firstname">
	</div>
	<div>
		<label for="prefix">Prefix:</label>
		<input class="form-control"  type="text" name="prefix">
	</div>
	<div>
		<label for="lastname">Lastname:</label>
		<input class="form-control"  type="text" name="lastname">
	</div>
	<div>
		<label for="homeadress">Home adress:</label>
		<input class="form-control" type="text" name="homeadress">
	</div>
	<div>
		<label for="zipcode">Zip code:</label>
		<input class="form-control" type="text" name="zipcode">
	</div>
	<div>
		<label for="username">Username:</label>
		<input class="form-control"  type="text" name="username">
	</div>
	<div>
		<label for="password">Password:</label>
		<div class="input-group margin-bottom-sm">
		<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
		<input class="form-control" type="password" name="password">
		</div>
	</div>
	<div>
		<label for="email">Email:</label>
		<div class="input-group margin-bottom-sm">
		<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
		<input class="form-control" type="email" name="email">
		</div>
	</div>
	<div>
		<input type="submit" value="Send">
	</div>
</form>