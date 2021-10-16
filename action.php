<?php 
	require "db.php";
	require_once "mail/references.php";
	
	if (isset($_SESSION['user'])) {
		header("Location: index.php");
	}else{
		header("Location: signin.php");
	}
	$data = $_POST;

	//hin username-i u email-i value-nery pahpanelu hamar
	$_SESSION['old'] =[
		'username' => $data['username'],
		'email' => $data['email']
	];

	if(isset($data['do_signup'])){
		//check
		if(trim($data['username']) == ''){
			$_SESSION['errors'] = "Enter username";
		}

		else if(trim($data['email']) == ''){
			$_SESSION['errors'] = "Enter email";
		}

		else if( $data['password'] == '' ){
			$_SESSION['errors'] = "Enter password";
		}

		else if($data['password_2'] != $data['password']){
			$_SESSION['errors'] = "Wrong password";
		}

		if(R::count("users", "username = ?", array($data['username'])) > 0){
			$_SESSION['errors'] = "This username already exists!";
		}

		if(R::count("users", "email = ?", array($data['email'])) > 0){
			$_SESSION['errors'] = "This email already exists!";
		}
		//stugum enq error ka te che, ete che grancum enq
		if(isset($_SESSION['errors'])){
			header("Location: signup.php"); //stex error ka :xD
		} 
		else{
			//good, register
			$path = 'uploads/'. time() . $_FILES['avatar']['name'];
			if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $path)) {
				$path = 'uploads/default.png';
			}
			$user = R::dispense('users');
			$user->username = $data['username'];
			$user->email = $data['email'];
			$user->avatar = $path;
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			$user->email_verified = 0;
			R::store($user);

			$code = mt_rand(1111,9999);

			$_SESSION['temp_user'] = [
					"email" => $user->email,
					"code" => $code
				];


			$mail->addAddress($user->email);
			$mail->Body    = $code;
			$mail->send();

			header("Location: confirm.php");
		}

	}

	if(isset($data['do_login']))
	{
		//skzbum stugum enq logini arkayutyuny
		$user = R::findone('users', 'username = ? OR email = ?', array($data['username'], $data['username']));
		if($user)
		{
			//..heto stugum enq passwordi arkayutyuny
			if(password_verify($data['password'], $user->password))
			{
				if($user->email_verified == 0)
				{
					$code = mt_rand(1111,9999);

					$_SESSION['temp_user'] = [
					"email" => $user->email,
					"code" => $code
						];

					$mail->addAddress($user->email);
					$mail->Body    = $code;
					$mail->send();

					header("Location: confirm.php");
				}
				else
				{
					$_SESSION['user'] = [
						"username" => $user->username,
						"email" => $user->email,
						"avatar" => $user->avatar
					];
					header("Location: index.php");
				}
				
			}
			else
			{
				$_SESSION['errors'] = "Wrong password!";
			}
		}
		else 
		{
			$_SESSION['errors'] = "Username doesn't exist!";
		}
	}



 ?>