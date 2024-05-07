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

	/*
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = 'info@auoretrade.com';                     //SMTP username
	$mail->Password   = '+(jy#[.Wjz98';                               //SMTP password
	$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
	$mail->Port       = 465;                 
	*/

	$to = "wdinyaaal@gmail.com";
    $subject = "AuOreTrade";
    $message = '<h1>AuOreTrade</h1>';

	//Від кого лист
	$mail->setFrom('info@auoretrade.com', 'AuOreTrade'); // Вказати потрібний E-mail
	//Кому відправити
	$mail->addAddress('info@auoretrade.com'); // Вказати потрібний E-mail
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
	
	/*
	//Прикріпити файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//шлях завантаження файлу
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузимо файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото у додатку</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

	$mail->Body = $body;

	//Відправляємо
	if (!$mail->send()) {
		$message = 'Помилка';
	} else {
		$message = 'Дані надіслані!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>