<?php
	require_once('phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'smtp.mail.ru';

		$mail->SMTPAuth = true;
		$mail->Username = 'confirm-harut@mail.ru';
		$mail->Password = 'Barevtxas12';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;

		$mail->setFrom('confirm-harut@mail.ru');

		$mail->Subject = 'Confirm';
?>