<?php
session_start();
//require './views/compra.html';
//require '../class/autoload.php';


if (isset($_POST['action'])){
    
    //print_r($_SESSION);
    //die();
    if (!isset($_SESSION['session1']['nombre'])){
        $mensaje = "<div class='alertaLog'>
                <h3>⚠️ No estás logeado<br></h3>
                <br>
                <p>Por favor, logéate para continuar con el proceso de compra.</p>
                <br>
                <button name='back' onclick='history.back()' action='back'>OK</button>
              </div>";
        echo $mensaje;
    } else {
        echo "<p style='background: orange; '>Flow en construcción</p>";
    }
    
}





require './backend/views/compra.html';
$basepath = $_SERVER['SCRIPT_NAME'];