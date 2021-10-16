<?php
require "db.php";

$data = $_POST;

//temp_user - en userna, ov vor petqa verifikacia ancni
if(isset($_SESSION["temp_user"]["code"]))
{
	// echo $_SESSION["temp_user"]["code"];

	if(isset($data['button_confirm_email']))
	{
		if($data['input_confirm_email'] == $_SESSION["temp_user"]["code"])
		{
			$user = R::findone('users', 'email = ?', array($_SESSION['temp_user']['email']));
			$user->email_verified = "1";
			R::store($user);
			unset($_SESSION['temp_user']);
			$_SESSION['user'] = [
						"username" => $user->username,
						"email" => $user->email,
						"avatar" => $user->avatar
					];
			unset($_SESSION['temp_user']);
			header("Location: signin.php");
		}
		
		else
			echo "no";
	}
}
else
	header("Location: index.php")
?>

<form action="confirm.php" method="post" style="width: 200px;">
	<input type="text" name="input_confirm_email">
	<button type="submit" name="button_confirm_email">Submit</button>
</form>
