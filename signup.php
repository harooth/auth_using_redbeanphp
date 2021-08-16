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
	<title>Register</title>
	<link rel="stylesheet" href="css/style.css">
	 <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
	<div class="main">
	<div class="container">
	<form action="action.php" method="post">
		<h2>Register</h2>
		<input type="text" name="username" value="<?= @$_SESSION['old']['username']; ?>" placeholder="Enter your username">

		<input type="email" name="email" value="<?= @$_SESSION['old']['email']; ?>" placeholder="Enter your email">

		<input type="password" name="password" placeholder="Your password">

		<input type="password" name="password_2" placeholder="Confirm password">

		<button type="submit" name="do_signup">Register</button>

		<p class="link">
			Already have an account? - <a href="signin.php">Login!</a>
		</p>

		<?php
			if( isset( $_SESSION['errors'] ) ){
				echo '<div class="error">'. '<ion-icon class="icon" name="close-circle"></ion-icon><p>'.$_SESSION['errors'] . '</p></div>';
			}
			unset($_SESSION['errors']);
			unset($_SESSION['old']);
		 ?>
	</form>
</div>
</div>
</body>
</html>

<?php } ?>