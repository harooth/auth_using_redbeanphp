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
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<form action="action.php" method="post">
		<label for="">Username:</label>
		<input type="text" name="username" value="<?= @$_SESSION['old']['username']; ?>" placeholder="Your username">
		<label for="">Password:</label>
		<input type="password" name="password" placeholder="Your password">
		<button type="submit" name="do_login">Login</button>
		<p>
			Still don't have an account? - <a href="signup.php">Create account!</a>
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