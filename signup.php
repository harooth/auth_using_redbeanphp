<?php 
	require "db.php";
		if(isset($_SESSION['user'])){
			header("Location: index.php");
		}
		else{
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<form action="action.php" method="post">

		<label>Username:</label>
		<input type="text" name="username" value="<?= @$_SESSION['old']['username']; ?>" placeholder="Enter your username">

		<label>Email:</label>
		<input type="email" name="email" value="<?= @$_SESSION['old']['email']; ?>" placeholder="Enter your email">

		<label>Password:</label>
		<input type="password" name="password" placeholder="Your password">

		<label>Confirm password:</label>
		<input type="password" name="password_2" placeholder="Confirm">

		<button type="submit" name="do_signup">Register</button>

		<p>
			Already have an account? - <a href="signin.php">Login!</a>
		</p>

		<?php
			if( isset( $_SESSION['errors'] ) ){
				echo '<div style="color: red;">' .$_SESSION['errors']. '</div>';
			}
			unset($_SESSION['errors']);
			unset($_SESSION['old']);
		 ?>
	</form>
</body>
</html>

<?php } ?>