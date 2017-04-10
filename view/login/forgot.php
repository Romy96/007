<h1>Forgot password?</h1>
<p>No worries! Just fill in your email and we will send you a new password!</p>
<form action="<?= URL ?>login/sendNewPassword" method="post">
	<div>
		<label for="email"></label>
		<input type="text" name="email">
	</div>
	<div>
		<label></label>
		<input type="submit" value="Save">
	</div>
</form>