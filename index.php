<?php 
	require "db.php";

	if(isset($_SESSION['user'])):
		echo($_SESSION['user']['username']);
		echo "<br>";
		echo($_SESSION['user']['email']);
?>
	<br>
	<a href="exit.php">Logout</a>
<?php  
else:
	echo 'You are not logged in!';
endif;
?>