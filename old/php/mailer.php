<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './includes/PHPMailer/PHPMailerAutoload.php';

$nombre = $_POST["datos"]["nombre"];
$email = $_POST["datos"]["mail"];
$mensaje = $_POST["datos"]["mensaje"];

$mail = new PHPMailer;

$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;          
$mail->Username = 'pluscodefest@gmail.com';
$mail->Password = 'randompass12345';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->From = $email;
$mail->FromName = "Contacto de pluscode";
$mail->addAddress("pluscodefest@gmail.com");
$mail->addReplyTo($email);

$mail->isHTML(true);

$mail->Subject = 'Mensaje del Formulario de ' . $nombre;
$mail->Body    = $mensaje;
$mail->AltBody = strip_tags($mail->Body);

if(!$mail->send()) {
    echo "Error :(";
} else {
    echo "Mensaje enviado!";
}
