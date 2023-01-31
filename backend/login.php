<?php
ob_start();
/* 
 * Haramos validaciones de parte del servidor
 */

require '../class/autoload.php';
require './views/login.html';

function detector($var){
    $var = filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
    if (strpos($var, "<")|| strpos($var, ">")|| strpos($var, "\\")|| strpos($var, "/")|| strpos($var, "(")|| strpos($var, ")")|| strpos($var, "'")|| strpos($var, '"')){
        die("<div class='alert alert-danger' role='alert' style='position:absolute;
            top:50%; left:50%; translate-y;transform: translate(-50%, -50%);
            box-shadow: 0px 0px 10px 1200px rgba(0,0,0,0.3);'>
                ⚠ Hemos detectado caracteres inválidos ⚠<br>
                <br>Por favor, elimnínelos e intentelo nuevamente<br><br>
                <button name='back' onclick='history.back()' action='back' class='btn btn-success'>OK</button>
              </div>");
    }
}



if (isset($_POST['enviar'])){
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_SPECIAL_CHARS);
    detector($email);
    detector($pass);
    $mensajeError = "<div class='alert alert-danger' role='alert'>
                        <p style='font-size:30px;'>⚠️ </p>
                        → Usuario o contraseña incorrectos.
                        </div>";
    $usuarios = usuarios::listar();
    foreach ($usuarios as $usuario){
        if ($usuario['email'] === $email){
            if ($usuario['pass'] === sha1($pass)){
                ob_end_clean();//ob_start() al principio del archivo para almacenar en búfer la salida y luego utilizar una función como ob_end_clean() antes de enviar los encabezados de redirección. En resumen, tu problema es que algo esta imprimiendo algo antes de ejecutar la redirección, debes asegurarte de que no hay ninguna salida antes de enviar los encabezados de redirección.
                session_start();
                $_SESSION['session1']['nombre'] = '🧕 '.$usuario['nombre'];
                $_SESSION['session1']['email'] = $usuario['email'];
                $nuevaConexion = new conexiones();
                $nuevaConexion->usuario = $usuario['email'];
                $nuevaConexion->tiempo = time();
                $nuevaConexion->tipo_intento = 'exitoso';
                $nuevaConexion->guardar();
                header('location: ../index.php');
                return;
            }else{
                $nuevaConexion = new conexiones();
                $nuevaConexion->usuario = $usuario['email'];
                $nuevaConexion->tiempo = time();
                $nuevaConexion->tipo_intento = 'fallida-P';
                $nuevaConexion->guardar();
                echo $mensajeError;
                die();
            }
        }else{
            
        }
    }
    $nuevaConexion = new conexiones();
    $nuevaConexion->usuario = $email;
    $nuevaConexion->tiempo = time();
    $nuevaConexion->tipo_intento = 'fallida-U';
    $nuevaConexion->guardar();
    echo $mensajeError;
    die();
   
}

//00webhost

//https://ar.000webhost.com/   para subirlo gratis