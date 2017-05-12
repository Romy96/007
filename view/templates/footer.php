<div style="border:1px solid grey; padding: 5px;">
<b>session debug:</b><br>
<?php 
	echo 'session id: ' . session_id() . '<br>'; 
	echo 'session userid: ' . (isset($_SESSION['userId'])?$_SESSION['userId']:'(undefined)') . '<br>'; 
	echo 'session username: ' . (isset($_SESSION['username'])?$_SESSION['username']:'(undefined)') . '<br>'; 
	if (isset($_SESSION['roles'])) {
		if (is_array($_SESSION['roles']) || is_object($_SESSION['roles'])) {
			foreach($_SESSION['roles'] as $role) {
				echo 'session role: ' . $role . '<br />';
			}
		}
	}
	else
	{
		echo 'session role: (undefined)';
	}
	if (isset($_SESSION['permissions'])) {
		if (is_array($_SESSION['permissions']) || is_object($_SESSION['permissions'])) {
			foreach($_SESSION['permissions'] as $permission) {
				echo 'session permission: ' . $permission . '<br />';
			}
		}
	}
	else
	{
		echo 'session permission: (undefined)';
	}
?>
</div>
</body>
</html>