<?php
if(isset($_SESSION['userId'])):
?>

<h1>Welkom <?=$_SESSION['username']?>!</h1>

<?php
endif;
?>