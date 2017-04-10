<h1>Verwijder gebruiker</h1>
<?php
if(isset($user)):
?>
	<form method="post" action="<?= URL ?>/login/deleteAction/<?=$user['id']?>">
		<div>
			<input type="hidden" name="id" value="<?=$user['id']?>">
			<label for="username">Gebruikersnaam:</label>
			<span><?=$user['username']?></span>
		</div>
		<div>
			<label for="email">Email:</label>
			<span><?=$user['email']?></span>
		</div>
		<div>
			<label></label>
			<input type="submit" name="confirmed" value="Yes">
			<input type="submit" name="canceled" value="No">
		</div>
	</form>
<?php
endif;
?>