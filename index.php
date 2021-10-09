<?php 
	require "db.php";
	if(isset($_SESSION['user'])):
		if($_SESSION['user']['avatar'] != NULL):
?>
			<img src="<?php echo($_SESSION['user']['avatar']); ?>" width="200px"><br>
<?php
			endif;
		echo($_SESSION['user']['username']);
		echo "<br>";
		echo($_SESSION['user']['email']);
?>

	<br>
	<a href="exit.php">Logout</a>
<?php  
	else:
?>
<p>You are not logged in!<br><a href="signin.php">Signin</a> or <a href="signup.php">Register</a></p>
<?php endif; ?>