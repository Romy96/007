<h1>Welkom!</h1>
<?php
if(isset($user)):
?>
<ul>
	<input type="hidden" name="id" value="<?=$user[0]['id']?>">
	<li>Account: <span><?=$user[0]['firstname']?></span></li>
	<li><a href="<?= URL ?>login/delete/<?=$user[0]['id']?>">Verwijder</a></li>
</ul>
<?php
endif;
?>

