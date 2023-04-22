<?php
session_start();
ob_start();
//require './views/compra.html';
//require '../class/autoload.php';


$mensaje = "<div class='alertaLog'>
                <h1>⚠️</h1>
                <h3>No estás logeado<br></h3>
                <br>
                <p>Por favor, logéate para continuar con el proceso de compra.</p>
                <br>
                <button name='back' onclick='history.back()' action='back'>OK</button>
              </div>";
$mensajeCarrito = "<div class='alertaLog'>
            <h1>🎊</h1>
            <h3>Producto agregado con éxito<br></h3>
            <br>
            <p>Tu producto se agregó correctamente al carrito, podés acceder al mismo desde la pestaña de usuario.</p>
            <br>
            <button name='back' onclick='document.location.href=".'"'.'./index.php'.'"'."' action='back'>OK</button>
          </div>";

if (isset($_POST['action'])){
    if (!isset($_SESSION['session1']['nombre'])){
        echo $mensaje;
    } else {
        if ($_POST['action'] == 'comprar'){
            ob_end_clean();
            header('location: ./backend/confirmacion_compra.php?id='.$_GET['id'].'&c='.$_POST['cantidad']);
            die();
        } else {
            $carrito = new carritos();
            $carrito->id_usuario = $_SESSION['session1']['id'];
            $carrito->id_producto = $_GET['id'];
            $carrito->cantidad = $_POST['cantidad'];
            if($carrito->guardar()){
                /*Restar en el stok del producto*/
                echo $mensajeCarrito;
            } else {
                echo "<br> Hubo un error al guardar el item en el carrito";
            }
        }
    }
    
}





$basepath = $_SERVER['SCRIPT_NAME'];
require './backend/views/compra.html';