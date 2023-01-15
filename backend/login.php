<?php

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
            if ($usuario['pass'] === $_POST['pass']){
                session_start();
                $_SESSION['session1']['nombre'] = $usuario['nombre'];
                $_SESSION['session1']['email'] = $usuario['email'];
                
                header('location: ./productos.php');
                
                //unset($_SESSION);
            }else{
                echo $mensajeError;
            die();
            }
        }else{
            echo $mensajeError;
        }
    }
   
}

//00webhost

//https://ar.000webhost.com/   para subirlo gratis