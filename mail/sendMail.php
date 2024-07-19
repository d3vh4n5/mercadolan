<?php

// phpmailer
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/SMTP.php';
// config
require_once '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;


// function sendMail($name, $surname, $email, $subject, $msg, $file){
function sendMail($name, $surname, $email, $subject, $msg){
    if( empty(trim($name)) ) $name = 'anonimo';
    if( empty(trim($surname)) ) $surname = '';
    
    $body = <<<HTML
        <h1>Contacto desde la web</h1>
        <p>De: $name $surname / $email</p>
        <h2>$subject</h2>
        $msg
    HTML;
    
    //Create an instance; passing `true` enables exceptions
    $mailer = new PHPMailer(true);
    
    // Configuración del servidor SMTP de Hotmail
    $mailer->isSMTP();
    $mailer->Host = 'smtp-mail.outlook.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = APP_EMAIL; // Tu dirección de correo de Hotmail
    $mailer->Password = APP_EMAIL_PASS; // Tu contraseña de Hotmail
    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailer->Port = 587;
    
    // Configuración del correo
    
    //Este es el mail desde el cual enviamos el mail automatico
    // $mailer->setFrom($email, "$nombre $apellido");
    $mailer->setFrom(APP_EMAIL, "DevHans");
    // El siguiente mail es el target
    $mailer->addAddress($email, "Sitio Web"); // Se lo reenvio tmb al contacto
    $mailer->addAddress("juanangelbasgall@hotmail.com", "Sitio Web"); // y a mi
    $mailer->Subject = "Mensaje web: $subject";
    $mailer->msgHTML($body);
    $mailer->AltBody = strip_tags($body);
    $mailer->CharSet = 'UTF-8';
    
    // Opciones interesantes:
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    
    // if ($file['size'] > 0) {
    //     $mailer->addAttachment($file['tmp_name'], $file['name']);
    // }
    
    return $mailer->send();
}

?>