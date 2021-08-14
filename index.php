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
?>
<p>You are not logged in!<br><a href="signin.php">Signin</a> or <a href="signup.php">Register</a></p>
<?php endif; ?>