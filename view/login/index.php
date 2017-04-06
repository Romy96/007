<h1>Welkom!</h1>
<?php
if(isset($user)):
	foreach ($user as $row):
?>
<ul>
	<input type="hidden" name="id" value="<?=$row['id']?>">
	<li>Account: <span><?=$row['firstname']?></span></li>
	<li><a href="<?= URL ?>login/delete/<?=$row['id']?>">Verwijder</a></li>
</ul>
<?php
endforeach;
endif;
?>

