

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




if(isset($_REQUEST['guardar'])){
    $nom=$_REQUEST['producto'];
    $id=$_REQUEST['id'];
    $descripcion=$_REQUEST['descripcion'];
    $precio=$_REQUEST['precio'];
    $idCat=$_REQUEST['categoria'];

    $nuevoProducto = new productos(intval($id));
    $nuevoProducto->nombre_producto = htmlspecialchars($nom);
    $nuevoProducto->descripcion = htmlspecialchars($descripcion);
    $nuevoProducto->precio = floatval($precio);
    $nuevoProducto->id_categoria = intval($idCat);
    $nuevoProducto->guardar();
    if (!$nuevoProducto->guardar()){
        die("En estos momentos, no podemos realizar la operación solicitada");
    } else {
        header("location: ".$_SERVER['SCRIPT_NAME']);//esto redirecciona la url al script actual quitando el post
        /*
        echo '<p style="'
        . 'color: lightgreen;'
        . 'font-size: 30px;'
                . '">';
        echo "→ $nom se guardó corectamente <br>"
                . "→               ID: ";
        echo '</p>';*/
    } 
    
  
 } else if (isset($_GET['add'])) {
     $categorias = categorias::listar();
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
     $nuevoProd = new productos($_GET['id']);
     include './views/productos.html';
     die();
 }

$lista_prod = productos::listar();
$basepath = $_SERVER['SCRIPT_NAME']; //indica la url del script en el navegador
include './lista_productos.php';




/*
if(isset($_POST['action']) && $_POST['action'] == 'guardar'){
    $miProducto = new productos();
    $miProducto->nombre = $_POST['producto'];
    $miProducto->descripcion = $_POST['descripcion'];
    $miProducto->precio = $_POST['precio'];
    $miProducto->categoria = $_POST['categoria'];
    $miProducto->guardar();
    
    echo"<br>La información se cargó correctamente..";
        
        echo '<p style="'
        . 'color: lightgreen;'
        . 'font-size: 30px;'
                . '">';
        
        echo "→ El nombre ingresado es : $miProducto->nombre <br>"
                . "→               ID: $miProducto->id";
        
        echo '</p>';
    
}else if (isset($_GET['add'])){
    include 'views/productos.html';
    die();
}
$lista_pro = productos::listar();
include 'views/lista_productos.html';
*/
?>
        <a  class="a" href="./views/productos.html">
    Volver a cargar otro producto</a>
<a class="a" href="./lista_productos.php">
    Listar Productos</a>
        <a class="a" href="./views/categorias.html">
    Agregar Categorías</a>
        

