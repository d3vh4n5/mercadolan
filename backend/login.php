<?php
ob_start();
/* 
 * Haramos validaciones de parte del servidor
 */

require '../class/autoload.php';
require './views/login.html';




if (isset($_POST['enviar'])){
    $mensajeError = "<div class='alert alert-danger' role='alert'>
                        <p style='font-size:30px;'>⚠️ </p>
                        → Usuario o contraseña incorrectos.
                        </div>";
    $usuarios = usuarios::listar();
    foreach ($usuarios as $usuario){
        if ($usuario['email'] === $_POST['email']){
            if ($usuario['pass'] === sha1($_POST['pass'])){
                ob_end_clean();//ob_start() al principio del archivo para almacenar en búfer la salida y luego utilizar una función como ob_end_clean() antes de enviar los encabezados de redirección. En resumen, tu problema es que algo esta imprimiendo algo antes de ejecutar la redirección, debes asegurarte de que no hay ninguna salida antes de enviar los encabezados de redirección.
                session_start();
                $_SESSION['session1']['nombre'] = '🧕 '.$usuario['nombre'];
                $_SESSION['session1']['email'] = $usuario['email'];
                
                header('location: ../index.php');
            }else{
                echo $mensajeError;
                die();
            }
        }else{
            echo $mensajeError;
            die();
        }
    }
   
}

//00webhost

//https://ar.000webhost.com/   para subirlo gratis