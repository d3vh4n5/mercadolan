<?php
session_start();
ob_start();

include '../class/autoload.php';
include './views/contact.html';
include_once '../mail/sendMail.php';
include_once '../helpers/validateCaptcha.php';

if (isset($_POST['enviar'])){
    if( !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['subject']) && !empty($_POST['email']) && !empty($_POST['msg'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];
        // $file = $_POST['file'];
        $token = $_POST['g-recaptcha-response'];
        try {
            if(validateCaptcha($token)){

                if (sendMail($name, $surname, $email, $subject, $msg)) {
                    header('Location: /backend/thanks.php');
                    exit();
                } else {
                    echo "<div class='error'>
                        <p>
                            Error, No se pudo enviar el mensaje.
                        </p>
                        <button name='back' onclick='history.back()' action='back'>OK</button>
                    </div>";
                }
            }
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Mailer Error: {$e}";
        }
    }
}