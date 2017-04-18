<h1>Bewerk gebruiker</h1>
<?php
if(isset($user)):
?>
<form action="<?= URL ?>backend/editSave/<?=$user['id']?>" method="post">
	<div>
		<label for="firstname">Username:</label>
		<div class="input-group margin-bottom-sm">
		<input type="hidden" name="id" value="<?=$user['id']?>">
		<input class="form-control"  type="text" name="username" value="<?=$user['username']?>">
		</div>
	</div>
	<div>
		<label for="password">Password:</label>
		<div class="input-group margin-bottom-sm">
		<input class="form-control" type="password" name="password" value="<?=$user['password']?>">
		</div>
	</div>
	<div>
		<label for="email">Email:</label>
		<div class="input-group margin-bottom-sm">
		<input class="form-control"  type="text" name="email" value="<?=$user['email']?>">
		</div>
	</div>
	<div>
		<input type="submit" value="Send">
	</div>
<?php
endif;
?>
</form>