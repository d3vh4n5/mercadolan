<?php

/* 
 * =================== REGISTRARSE ============================
 */

require '../class/autoload.php';
require './views/registrarse.html';

/*ideas para validar:

 * https://www.youtube.com/watch?v=gwqTpyZwEY0
 * terminar de ver bootstrap
 * overflow-y: scroll; (por lo de cuando imprime el mensaje no se ve el logo, no es necesarioigual)
  */

if (isset($_POST['enviar'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $nuevoUsuario = new usuarios();
    $nuevoUsuario->nombre = $_POST['nombre'];
    $nuevoUsuario->email = $_POST['email'];
    $nuevoUsuario->pass = $_POST['pass'];
    
    
    /*
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<br>Boton apretado";*/
    if (isset($_POST['captcha'])){
        $errores = array();
        if (trim($nombre) === ''){
            array_push($errores, "El campo Nombre no puede estar vacío.");
        }
        if (trim($email) ==='' || strpos($email, '@')===false){
            array_push($errores, "Increse un correo electrónico válido.");
        }else {
            $usuarios = usuarios::listar();
            foreach ($usuarios as $usuario){
                if ($usuario['email'] === $_POST['email']){
                    array_push($errores,'El mail yá está en uso, por favor use uno diferente.');
                }
            }
        }
        if (trim($pass)===''|| strlen($pass)<8){
            array_push($errores, "La contraseña no puede estar vacía, ni tener menos de 8 caracteres.<br>");
        }
        if (count($errores)>0){
            echo "<div class='alert alert-danger' role='alert'>
            <p style='font-size:30px;'>⚠️ </p>";
                foreach ($errores as $error){
                    echo "<br>→".$error;
                }
            echo "</div>";
            die();
        }
        $nuevoUsuario->guardar();
        if (!$nuevoUsuario->guardar()){
            die("En estos momentos, no podemos realizar la operación solicitada");
        } else {
            echo '<div class="alert alert-success" role="alert">
                    ¡Registro realizado con éxito!';
                    
            echo '<button  onclick='.'"document.location.href='."'../index.php'".'"'."class='btn btn-success'>OK</button>";
            echo  "</div>";
        }
        
    } else {
        echo "<div class='alert alert-danger' role='alert' style='position:absolute;
            top:50%; left:50%; translate-y;transform: translate(-50%, -50%);
            box-shadow: 0px 0px 10px 1200px rgba(0,0,0,0.3);'>
                Lo sentimos.. No aceptamos robots en nuestra web.
                Intentelo nuevamente<br><br>
                <button name='back' onclick='history.back()' action='back' class='btn btn-success'>OK</button>
              </div>";
        
    }
}

