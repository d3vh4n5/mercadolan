<?php
session_start();
ob_start();

include './views/contact.html';
include_once '../mail/sendMail.php';

if (isset($_POST['enviar'])){
    if( !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['subject']) && !empty($_POST['email']) && !empty($_POST['msg'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];
        // $file = $_POST['file'];
        try {
            if (sendMail($name, $surname, $email, $subject, $msg)) {
                echo "
                    
                    El mensaje se envió correctamente
                ";
            } else {
                echo "El mensaje no pudo ser enviado. Mailer Error: {$e}";
            }
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Mailer Error: {$e}";
        }
    }
}