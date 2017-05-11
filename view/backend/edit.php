<h1>Bewerk gebruiker</h1>
<?php
if(isset($user)):
?>
<div class="row">
	<div class="col-md-12">
		<form action="<?= URL ?>backend/editSave/<?=$user['id']?>" method="post">
			<div class="form-group">
				<label for="firstname" class="col-md-2">Username:</label>
				<div class="input-group margin-bottom-sm col-md-10">
				<input type="hidden" name="id" value="<?=$user['id']?>">
				<input class="form-control"  type="text" name="username" value="<?=$user['username']?>">
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-md-2">Password:</label>
				<div class="input-group margin-bottom-sm col-md-10">
				<input class="form-control" type="password" name="password" value="<?=$user['password']?>">
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-md-2">Email:</label>
				<div class="input-group margin-bottom-sm col-md-10">
				<input class="form-control"  type="text" name="email" value="<?=$user['email']?>">
				</div>
			</div>
			<div class="form-group">
				<label for="roles" class="col-md-2">Roles:</label>
				<div class="checkbox col-md-10">
				<?php
					foreach ($roles as $row):
		        echo'<input type="checkbox" name="roles[]" value="' . $row['id'] . '" ' . ($row["login_id"] == null ? "" : "checked") . '>' . $row['name'] . '<br />';
				endforeach;
				?>
				</div>
			</div>
			<div>
				<input type="submit" value="Send">
			</div>
		</form>
	</div>
</div>
<?php
endif;
?>