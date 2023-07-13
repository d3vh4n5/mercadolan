<?php

include '../class/autoload.php';
$db = base_datos::conect();
$objeto = $db->select("productos");

if (isset($_GET)){
    $opcion = $_GET['opcion'];
    if ($opcion == 1){
        header('Content-type: application/json');
        echo json_encode($objeto);
    }else if ($opcion == 2){
        header('Content-type: image/png');
        readfile('../assets/img/dino.gif');
    }else if ($opcion == 3){
        header('Content-type: text/plain');
        echo "Este es un ejemplko de devolucionde un texto plano";
    }else if ($opcion == 4){
        header('Content-type: application/zip');
        /*
            El content disposition: attachment inidica que el archivo debe descargarse en lugar
            de mostrarse por el navegador, ademas tambien le damos un nombre al archivo para cuando 
            se descargue. El content disposition no solo sirve para archvos descargables, sino que 
            tiene varias opciones.
        */
        header('Content-Disposition: attachment; filename="ejemplo.zip"');
        readfile('ruta/a/mi/archivo.zip');
    } else {
        echo "error";
    }
}
