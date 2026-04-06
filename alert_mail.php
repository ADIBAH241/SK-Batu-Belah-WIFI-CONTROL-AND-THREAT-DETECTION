<?
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendAlert($message){

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPauth = true;
$mail->Username  = 'yourgmail@gmail.com';
$mail->Password = 'your_app_password';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('yourgmail@gmail.com','SKBB Security System');
$mail->addAddress('admin@skbb.local');

$mail->Subject = 'Security Alert - SKBB';
$mail->Body = $message;

$mail->send();
}
?>
