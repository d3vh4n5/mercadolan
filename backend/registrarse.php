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
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    echo "<br>Boton apretado";
    if (isset($_POST['captcha'])){
        echo "<br>Hola humano";
    } else {
        echo "<br>VETE!! no eres humano!!";
    }
}