<h1>Registreer</h1>
<form action="<?= URL ?>login/registerSave" method="post">
	<div>
		<label for="firstname">Firstname:</label>
		<div class="input-group margin-bottom-sm">
		<input class="form-control"  type="text" name="firstname">
		</div>
	</div>
	<div>
		<label for="prefix">Prefix:</label>
		<div class="input-group margin-bottom-sm">
		<input class="form-control"  type="text" name="prefix">
		</div>
	</div>
	<div>
		<label for="lastname">Lastname:</label>
		<div class="input-group margin-bottom-sm">
		<input class="form-control"  type="text" name="lastname">
		</div>
	</div>
	<div>
		<label for="username">Username:</label>
		<div class="input-group margin-bottom-sm">
		<input class="form-control"  type="text" name="username">
		</div>
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
		<label for="isAdmin">Will this be an admin account?</label>
		<label class="checkbox-inline"><input type="checkbox" id="yes" name="yes" value="1">Yes</label>
	<div>
		<input type="submit" value="Send">
	</div>
</form>