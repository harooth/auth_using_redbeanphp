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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
	 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
	<div class="main">
	<div class="container">
	<form action="action.php" method="post">
		<h2>Login</h2>
		<input type="text" name="username" value="<?= @$_SESSION['old']['username']; ?>" placeholder="Username or email">
		<input type="password" name="password" placeholder="Password">
		<button type="submit" name="do_login">Login</button>
		<p class="link">
			Still don't have an account? - <a href="signup.php">Create account!</a>
		</p>
		<?php
			if( isset( $_SESSION['errors'] ) ){
				echo '<div class="error">'. '<ion-icon class="icon" name="close-circle"></ion-icon><p>' .$_SESSION['errors']. '</div>';
			}
			if(isset( $_SESSION['success'] ) ){
				echo '<div class="success">' .'<ion-icon class="icon" name="checkmark-circle"></ion-icon><p>'
				.$_SESSION['success']. '</p></div>';
			}
			unset($_SESSION['errors']);
			unset($_SESSION['old']);
			unset($_SESSION['success']);
		 ?>
	</form>
</div>
</div>
</body>
</html>

<?php } ?>