<?php
session_start();
ob_start();
include '../class/autoload.php';





if (isset($_POST['action'])){
    $carritos = carritos::listar();
    foreach ($carritos as $carrito){
        if ($carrito['id_usuario'] === $_SESSION['session1']['id']){
            $item = new carritos($carrito['id']);;
            if ($item->eliminar()){
                echo"<br> Eliminado correctamente";
            } else {
                echo "<br> Hubo un error al eliminar";
                return;
            }
        }
    }
    $mensaje = "<div class='alertaLog'>
            <h1>🎊</h1>
            <h3>Fin del recorrido<br></h3>
            <br>
            <p>Felicidades, has llegado al final del flujo de prueba para la compra 2.</p>
            <br>
            <button name='back' onclick='document.location.href=".'"'.'../index.php'.'"'."' action='back'>OK</button>
          </div>";
    ob_end_clean();
    echo $mensaje;
}else if (isset($_GET['rem'])) {
    $nuevoCarrito = new carritos($_GET['id']);
    if ($nuevoCarrito->eliminar()){
        header("location: ".$_SERVER['SCRIPT_NAME']);// esto direcciona la url al script actual quitando el GET
    } else{
        die("En estos momenos no podemos eliminar el producto");
    }
 }


$basepath = $_SERVER['SCRIPT_NAME'];
include './views/carrito.html';