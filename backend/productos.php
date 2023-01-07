

<html>
    <head>
        <title>Productos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
    </head>
    <body>

<?php

include '../class/autoload.php';


if(isset($_POST['action']) && $_POST['action'] == 'agregar'){/* Con el action solo tambien funciona, pero chequeando el valor es mas seguro y además mas ordenado por si tenemos varios botones*/
    /*$nuevoProducto = new productos(intval($id)); el formulario ya no pide id*/
    $nuevoProducto = new productos($_POST['codigo_producto']);
    $nuevoProducto->nombre_producto = $_POST['producto'];
    $nuevoProducto->descripcion = $_POST['descripcion'];
    $nuevoProducto->precio = $_POST['precio'];
    $nuevoProducto->id_categoria = $_POST['categoria'];
    $nuevoProducto->guardar();
    if (!$nuevoProducto->guardar()){
        die("En estos momentos, no podemos realizar la operación solicitada");
    } else {
        header("location: ".$_SERVER['SCRIPT_NAME']);//esto redirecciona la url al script actual quitando el post
    } 
    
  
 } else if (isset($_GET['add'])) {
     //$categorias = categorias::listar();
     $prod = new productos();
     include './views/productos.html';
     die();
 }else if (isset($_GET['rem'])) {
    $nuevoProd = new productos($_GET['id']);
    if ($nuevoProd->eliminar()){
        header("location: ".$_SERVER['SCRIPT_NAME']);// esto direcciona la url al script actual quitando el GET
    } else{
        die("En estos momenos no podemos eliminar el producto");
    }
 }else if (isset($_GET['edit'])){
     $prod = new productos($_GET['id']);
     $prod->nombre_producto = $prod->nombre;
     $prod->id_categoria = $prod->categoria;
     include './views/productos.html';
     die();
 }

$lista_prod = productos::listar();
$basepath = $_SERVER['SCRIPT_NAME']; //indica la url del script en el navegador
include './views/lista_productos.html';


?>
        <!--
        <a  class="a" href="./views/productos.html">
    Volver a cargar otro producto</a>
<a class="a" href="./lista_productos.php">
    Listar Productos</a>
        <a class="a" href="./views/categorias.html">
    Agregar Categorías</a>
        

