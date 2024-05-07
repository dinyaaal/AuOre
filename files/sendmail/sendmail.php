<?php
    $to = "wdinyaaal@gmail.com";
    $subject = "AuOreTrade";
    $message = '<h1>AuOreTrade</h1>';

    // Тіло листа
    $body = '<h1>AuOreTrade</h1>';

    if (!empty($_POST['name'])) {
        $body .= '<p><strong>Name:</strong> ' . $_POST['name'] . '</p>';
    }
    if (!empty($_POST['email'])) {
        $body .= '<p><strong>Email:</strong> ' . $_POST['email'] . '</p>';
    }
    if (!empty($_POST['number'])) {
        $body .= '<p><strong>Number:</strong> ' . $_POST['number'] . '</p>';
    }
    if (!empty($_POST['message'])) {
        $body .= '<p><strong>Message:</strong> ' . $_POST['message'] . '</p>';
    }

    // Дополнительные заголовки
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: wdinyaaal@gmail.com\r\n";
    // Можно добавить заголовок "Reply-To" для указания адреса, на который должны отправляться ответы

    // Отправка письма
    if (mail($to, $subject, $body, $headers)) {
        $message = 'Дані надіслані!';
    } else {
        $message = 'Помилка';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>
