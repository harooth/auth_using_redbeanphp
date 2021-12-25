<?php
	require_once('phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'smtp.mail.ru';

		$mail->SMTPAuth = true;
		$mail->Username = 'nortest17@mail.ru';
		$mail->Password = 'hxc13Ua9Y9iYsQrVDyJG';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('nortest17@mail.ru');

		$mail->Subject = 'Confirm';
?>