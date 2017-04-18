<h1>Bewerk gebruiker</h1>
<?php
if(isset($user)):
?>
<form action="<?= URL ?>backend/editSave/<?=$user['id']?>" method="post">
	<div>
		<label for="firstname">Username:</label>
		<input type="hidden" name="id" value="<?=$user['id']?>">
		<input type="text" name="username" value="<?=$user['username']?>">
	</div>
	<div>
		<label for="password">Password:</label>
		<input type="password" name="password" value="<?=$user['password']?>">
	</div>
	<div>
		<label for="email">Email:</label>
		<input type="text" name="email" value="<?=$user['email']?>">
	</div>
	<div>
		<input type="submit" value="Send">
	</div>
<?php
endif;
?>
</form>