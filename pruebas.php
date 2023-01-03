<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>Pruebas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
    </head>
    <body>
        



<?php
include './class/autoload.php';

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

echo "pruebas php, ahora agregando finalmente el git";

/*
$datos = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        $idprod =  base_datos::lastinsert();
        echo "<pre>";
        print_r($idprod);
        echo "</pre>";

$datos = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");


if(isset($_REQUEST['guardar'])){
    
    try{
        $producto = $_REQUEST['producto'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $query = "INSERT INTO imagenes(nombre_imagen, imagen) VALUES('$producto', '$imagen')";
        $resultado = $datos->execute($query);

        if ($resultado){
            echo "se inserto";
        } else {
            echo "No se inserto";
        }
    } catch (Exception $e) {
        echo '<br>'
        . '<p style="color:red;">'
        . 'Error de conexión con el servidor<br>'
        .$e->getMessage()
        ."</p>";
    }
    
}













if (is_array($variable) == true) {
    echo 'is array';
} else {
    echo 'is not array';
}








/*

Pruebas para obtener el nombre de una categoria

$datos = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
$nombrecat = $datos->select('Categorias', 'id=1');
$nombre = $nombrecat[0]['nombre_categoria'];
echo $nombre, '<br>';


en base a esta prueba, se modificó el metodo listar de categorías, y se agrego
        uno nuevo que se llama "nombrecat"
$nc = new categorias();
$nombre2 = $nc->nombrecat(2);
echo $nombre2;








 Estructura básica de while y for, con indice variable para imprimir en filas
$lista_prod = productos::listar();
$largo = count($lista_prod);

if (is_array($lista_prod) == true) {
    echo 'is array';
} else {
    echo 'is not array';
}

$i=0;
while ($i < $largo){
    echo 'Probando', $i, '<br>';
    for ($j=1; $j<=4 && $i<$largo; $j++){
        echo 'hola', ' \'',$lista_prod[$i]['nombre_producto'],'\' ', $j;
        $i++;
    }
    echo '<br>';
}

 */