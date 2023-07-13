<?php
ob_start();
/* 
   Haremos validaciones de parte del servidor
 */

require '../class/autoload.php';
require './views/login.html';

function detector($var){
    $var = filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
    if (strpos($var, "<")|| strpos($var, ">")|| strpos($var, "\\")|| strpos($var, "/")|| strpos($var, "(")|| strpos($var, ")")|| strpos($var, "'")|| strpos($var, '"') || strpos($var, ';')){
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
    $pass = sha1(filter_var($_POST['pass'], FILTER_SANITIZE_SPECIAL_CHARS));
    detector($email);
    detector($pass);
    // $mensajeError = "<div class='alert alert-danger' role='alert'>
    //                     <p style='font-size:30px;'>⚠️ </p>
    //                     → Usuario o contraseña incorrectos.
    //                     </div>";
    $mensajeError = "
        <div class='alert' >
            <p class='kingsConsole'>> 
                access: PERMISION DENIED....and....<br>
                YOU DIDN´T SAY THE MAGIC WORD!<br>
                YOU DIDN´T SAY THE MAGIC WORD!<br>
                YOU DIDN´T SAY THE MAGIC WORD!<br>
            </p>
            <br>
            <div class='kingMessage'>
                <span class='kingTitle'><p>::::::::::::: <b>THE KING</b> :::::::::::::</p></span>
                <span class='kingTitle2'>
                    <p>1 item</p>
                    <p>42.0 MB in disk</p>
                    <p>777.0 avilable</p>
                </span>
                <video autoplay loop muted playsinline width='400px' style='position: relative; left: -50px;' src='../assets/img/theking.mp4' class='kingVideo'></video>
                <audio autoplay loop controls src='../assets/sound/theking.mp3'>                
            </div>                
            <br>⚠ Usuario o contraseña incorrectos.<br><br>
            <button name='back' onclick='history.back()' action='back'>OK</button>
        </div>";
    try{
        $db = base_datos::conect();
        $resp = $db->select("usuarios", "email=? AND pass=?", array($email, $pass));
        if (isset($resp[0]['id'])){
            ob_end_clean();//ob_start() al principio del archivo para almacenar en búfer la salida y luego utilizar una función como ob_end_clean() antes de enviar los encabezados de redirección. En resumen, tu problema es que algo esta imprimiendo algo antes de ejecutar la redirección, debes asegurarte de que no hay ninguna salida antes de enviar los encabezados de redirección.
            session_start();
            $_SESSION['session1']['nombre'] = '🧕 '.$resp[0]['nombre'];
            $_SESSION['session1']['email'] = $resp[0]['email'];
            $_SESSION['session1']['id'] = $resp[0]['id'];
            $nuevaConexion = new conexiones();
            $nuevaConexion->usuario = $resp[0]['email'];
            $nuevaConexion->tiempo = time();
            $nuevaConexion->tipo_intento = 'exitoso';
            $nuevaConexion->guardar();
            header('location: ../index.php');
            return;
        } else {
            $nuevaConexion = new conexiones();
            $nuevaConexion->usuario = $email;
            $nuevaConexion->tiempo = time();
            $nuevaConexion->tipo_intento = 'fallida-P';
            $nuevaConexion->guardar();
            echo $mensajeError;
            die();
            echo "No coinciden";
            echo "<br>tirar easter egg";
        }
    } catch (PDOException $e){
        echo '<br>'
            . '<p style="color:red; text-align: center;">'
            . '⚠ Error, el servidor no está disponible en este momento.<br>'
            .$e->getMessage()
            ."</p>";
    } catch (Exception $ex){
        echo '<br>'
            . '<p style="color:red; text-align: center;">'
            . '⚠ Hubo un error inesperado.<br>'
            .$ex->getMessage()
            ."</p>";
    }
}
