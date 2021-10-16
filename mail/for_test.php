<?php 
	require('test.php');
	if(isset($_POST['get']))
	{
		$mail->addAddress("jyroqope@ryteto.me");
		$mail->Body    = time();
		if($mail->send())
		{
			echo "ok";
		}
		else echo "error";
	}
 ?>
 <form action="index.php" method="post">
 	<button name="get">Send!</button>
 </form>