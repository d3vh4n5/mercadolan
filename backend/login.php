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
                
                function probarSesion($sesion = null){
                    if ($sesion ===null){
                        $sesion = $_SESSION;
                    }
                    if(isset($sesion)){
                        echo "session existe";
                        echo "<pre>";
                        print_r($sesion);
                        echo "</pre>";
                    }else{
                        echo "parece que la sesion no existe";
                        echo "<pre>";
                        print_r($sesion);
                        echo "</pre>";
                    }
                }
               
                session_start();
                $_SESSION['session1']['nombre'] = $usuario['nombre'];
                $_SESSION['session1']['email'] = $usuario['email'];
                $_SESSION['session2']['nombre'] = 'prueba';
                $_SESSION['session2']['email'] = 'prueba';
                probarSesion();
                $_SESSION = session_destroy();
                probarSesion();
                unset($_SESSION['sesion1']);
                probarSesion();
                unset($_SESSION);
                probarSesion();
                
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