<h1>Profielwijziging</h1>
<form action="<?= URL ?>login/profileEditSave/<?= $_SESSION['userId'] ?>" method="post">
	<div>
		<input type="hidden" name="id" value="<?= $profile['id'];?>">
		<label for="firstname">Firstname:</label>
		<input class="form-control" type="text" name="firstname" value="<?= $profile['firstname'];?>">
	</div>
	<div>
		<label for="prefix">Prefix:</label>
		<input class="form-control" type="text" name="prefix" value="<?= $profile['prefix'];?>">
	</div>
	<div>
		<label for="lastname">Lastname:</label>
		<input class="form-control" type="text" name="lastname" value="<?= $profile['lastname'];?>">
	</div>
	<div>
		<label for="username">Username:</label>
		<input class="form-control" type="text" name="username" value="<?= $profile['username'];?>">
	</div>
	<div>
		<label for="password">Password:</label>
		<div class="input-group margin-bottom-sm">
		<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
		<input class="form-control" type="password" name="password">
	</div>
	<div>
		<label for="email">Email:</label>
		<div class="input-group margin-bottom-sm">
		<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
		<input class="form-control" type="text" name="email" value="<?= $profile['email'];?>">
	</div>
		<label for="is_admin">Will this be an admin account?</label>
		<label class="checkbox-inline"><input type="checkbox" id="yes" name="is_admin" value="1">Yes</label>
	<div>
		<input type="submit" value="Send">
	</div>
</form>