<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'aaaaaa';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'info@global-tc.pl';                     //SMTP username
	$mail->Password   = 'aaaaaa';                               //SMTP password
	$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	

	//Від кого лист
	$mail->setFrom('info@global-tc.pl', 'AuOreTrade'); // Вказати потрібний E-mail
	//Кому відправити
	$mail->addAddress('info@global-tc.pl'); // Вказати потрібний E-mail
	//Тема листа
	$mail->Subject = 'AuOreTrade';

	//Тіло листа
	$body = '<h1>AuOreTrade</h1>';

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Name:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['email']))){
		$body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
	}
	if(trim(!empty($_POST['number']))){
		$body.='<p><strong>Number:</strong> '.$_POST['number'].'</p>';
	}
	if(trim(!empty($_POST['message']))){
		$body.='<p><strong>Message:</strong> '.$_POST['message'].'</p>';
	}		
	

	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'Error';
	} else {
		$message = 'Successfully!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>