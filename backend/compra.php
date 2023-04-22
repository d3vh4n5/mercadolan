<?php
session_start();
ob_start();
//require './views/compra.html';
//require '../class/autoload.php';


if (isset($_POST['action'])){
    
    //print_r($_SESSION);
    //die();
    if (!isset($_SESSION['session1']['nombre'])){
        $mensaje = "<div class='alertaLog'>
                <h1>⚠️</h1>
                <h3>No estás logeado<br></h3>
                <br>
                <p>Por favor, logéate para continuar con el proceso de compra.</p>
                <br>
                <button name='back' onclick='history.back()' action='back'>OK</button>
              </div>";
        echo $mensaje;
    } else {
        if ($_POST['action'] == 'comprar'){
            ob_end_clean();
            header('location: ./backend/confirmacion_compra.php?id='.$_GET['id'].'&c='.$_POST['cantidad']);
            die();
        } else {
            /*Aqui en lugar de redirigir tiene que guardar el objeto en carritos
en la base de datos y mostrar un cartel de que se agrego correctamente.
             * 
             * soolo el carrito del desplegable de usuario redirigirá a la página
             *  de carrito             */
            header('location: ./backend/carrito.php');
            echo "<p style='background: orange; '>Flow en construcción</p>";
        }
    }
    
}





$basepath = $_SERVER['SCRIPT_NAME'];
require './backend/views/compra.html';