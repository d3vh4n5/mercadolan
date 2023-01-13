<?php

/* 
 * Haramos validaciones de parte del servidor
 */

require '../class/autoload.php';
require './views/login.html';

if (isset($_POST['enviar'])){
    if (trim($_POST['nombre']) == ""){
        throw new Exception("Error en la carga del nombre, por favor verifique el mismo");
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo "el mail ingresado no es correcto";
    }
    if(empty($_POST['password'])){
        echo "el password está vacío";
    }
}

//00webhost

//https://ar.000webhost.com/   para subirlo gratis