<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="submit" name="enviar" value="Send">
    </form>
</body>
</html>

<?php

if (isset($_POST['enviar'])){
    try {
        $name = "Juan";
        $subject = "Test php";
        $msg = "Esto es un mensaje de prueba de mail desde php";
        $email = "juanangelbasgall@hotmail.com";
        $header = "From: noreply@example.com" . "\r\n";
        $header .= "Reply-to: noreply@example.com" . "\r\n";
        $header .= "X-Mailer: PHP/".phpversion();

        // Enviar el correo
        if (mail($email, $subject, $msg, $header)) {
            echo "Email enviado correctamente.";
        } else {
            echo "Falló el envío del email.";
        }

    } catch (Exception $e){
        echo "Se produjo un error: " . $e->getMessage();
    }
}

phpinfo();
