<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html" );
}

require 'mail/phpmailer/PHPMailer.php';
require 'mail/phpmailer/Exception.php';
require 'mail/phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$foto = $_FILES['foto']; //array assoc - $foto['tmp_name']; $foto['size'] - $foto['name']

if( empty(trim($nombre)) ) $nombre = 'anonimo';
if( empty(trim($apellido)) ) $apellido = '';

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre $apellido / $email</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;

//Create an instance; passing `true` enables exceptions
$mailer = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Hotmail
    $mailer->isSMTP();
    $mailer->Host = 'smtp-mail.outlook.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'no-reply-devhans@outlook.com'; // Tu dirección de correo de Hotmail
    $mailer->Password = ''; // Tu contraseña de Hotmail
    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailer->Port = 587;

    // Configuración del correo

    //Este es el mail desde el cual enviamos el mail automatico
    // $mailer->setFrom($email, "$nombre $apellido");
    $mailer->setFrom('no-reply-devhans@outlook.com', "DevHans");
    // El siguiente mail es el target
    $mailer->addAddress('juanangelbasgall@hotmail.com', 'Sitio web');
    $mailer->Subject = "Mensaje web: $asunto";
    $mailer->msgHTML($body);
    $mailer->AltBody = strip_tags($body);
    $mailer->CharSet = 'UTF-8';

    // Opciones interesantes:
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    if ($foto['size'] > 0) {
        $mailer->addAttachment($foto['tmp_name'], $foto['name']);
    }

    $rta = $mailer->send();
    echo "Mensaje enviado";
    print_r($rta);
    // Redirigir después de enviar el correo
    // header("Location: gracias.html");
    exit;
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Mailer Error: {$mailer->ErrorInfo}";
}
?>