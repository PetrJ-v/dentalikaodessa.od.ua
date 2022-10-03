<?php

require_once('phpmailer/PHPMailerAutoload.php');
//-----
$data = $_POST;
// $sitename = $_POST['siteAddres'];
$sitename = 'dentalika';
$subject = "Заявка со страницы \"$sitename\""; // тема письма
$message = "";
foreach ($data as $key => $value) {
	$message = $message .' '.$key. ' = '.$value. '<br />';
};
//-----

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$mail->isSMTP();// Set mailer to use SMTP	// Specify main and backup SMTP servers

$mail->Host = 'smtp.ukr.net';
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'webinsv@ukr.net'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'ibsuURT5ePlYxudN'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров


$mail->setFrom('webinsv@ukr.net'); // от кого будет уходить письмо?
$mail->addAddress('webinsv@ukr.net');     // Кому будет уходить письмо
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта dentalika';
$mail->Body    = $message;
// $mail->Body    = '' .$contactInfo . ' оставил заявку, его телефон ' .$contactInfo. '<br>Почта этого пользователя: ' .$contactInfo;
$mail->AltBody = '';

$result = $mail->Send();

if(!$result) {
	// There was an error
	// Do some error handling things here
	echo $mail->ErrorInfo;
} else {
	echo "success";
}
?>
