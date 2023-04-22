<?php

include '../class/autoload.php';






if (isset($_POST['action'])){
    $mensaje = "<div class='alertaLog'>
            <h1>🎊</h1>
            <h3>Fin del recorrido<br></h3>
            <br>
            <p>Felicidades, has llegado al final del flujo de prueba para la compra.</p>
            <br>
            <button name='back' onclick='document.location.href=".'"'.'../index.php'.'"'."' action='back'>OK</button>
          </div>";
    echo $mensaje;
}








include './views/confirmacion_compra.html';



