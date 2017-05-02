<?php
if(isset($user)):
?>
<h1>Edit profile</h1>
<form action="<?= URL ?>backend/profileSave/<?=$user['id']?>" method="post">
	<div>
		<label for="firstname">Firstname:</label>
		<input type="hidden" name="id" value="<?=$user['id']?>">
		<input class="form-control"  type="text" name="firstname" value="<?=$user['firstname']?>">
	</div>
	<div>
		<label for="prefix">Prefix:</label>
		<input class="form-control"  type="text" name="prefix" value="<?=$user['prefix']?>">
	</div>
	<div>
		<label for="lastname">Lastname:</label>
		<input class="form-control"  type="text" name="lastname" value="<?=$user['lastname']?>">
	</div>
	<div>
		<label for="homeadress">Home adress:</label>
		<input class="form-control" type="text" name="homeadress" value="<?=$user['home_adress']?>">
	</div>
	<div>
		<label for="zipcode">Zip code:</label>
		<input class="form-control" type="text" name="zipcode" value="<?=$user['zip_code']?>">
	</div>
	<div>
		<label for="username">Username:</label>
		<input class="form-control"  type="text" name="username" value="<?=$user['username']?>">
	</div>
	<div>
		<label for="email">Email:</label>
		<div class="input-group margin-bottom-sm">
		<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
		<input class="form-control" type="email" name="email" value="<?=$user['email']?>">
		</div>
	</div>
	<div>
		<input type="submit" value="Save">
	</div>
</form>
<?php
	endif;
?>