<?php
if(isset($user)):
?>
<h1>Profile</h1>
	<div>
		<label for="firstname">Firstname: <?=$user['firstname']?></label>
		<input type="hidden" name="id" value="<?=$user['id']?>">
	</div>
	<div>
		<label for="prefix">Prefix: <?=$user['prefix']?></label>
	</div>
	<div>
		<label for="lastname">Lastname: <?=$user['lastname']?></label>
	</div>
	<div>
		<label for="username">Username: <?=$user['username']?></label>
	</div>
	<div>
		<label for="email">Email: <?=$user['email']?></label>
	</div>
	<div>
		<a href="<?= URL ?>backend/editProfile/<?=$user['id']?>">Edit profile</a>
	</div>
<?php
	endif;
?>