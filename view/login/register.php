<h1>Registreer</h1>
<form action="<?= URL ?>login/createUser" method="post">
	<div>
		<label for="firstname">Firstname:</label>
		<input type="text" name="firstname">
	</div>
	<div>
		<label for="prefix">Prefix:</label>
		<input type="text" name="prefix">
	</div>
	<div>
		<label for="lastname">Lastname:</label>
		<input type="text" name="lastname">
	</div>
	<div>
		<label for="username">Username:</label>
		<input type="text" name="username">
	</div>
	<div>
		<label for="password">Password:</label>
		<input type="password" name="password">
	</div>
	<div>
		<label for="email">Email:</label>
		<input type="text" name="email">
	</div>
	<div>
		<input type="submit" value="Send">
	</div>
</form>