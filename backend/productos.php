<?php

include '../class/autoload.php';


if(isset($_POST['action']) && $_POST['action'] == 'agregar'){/* Con el action solo tambien funciona, pero chequeando el valor es mas seguro y además mas ordenado por si tenemos varios botones*/
    /*$nuevoProducto = new productos(intval($id)); el formulario ya no pide id*/
    
    $folder = explode("\\", __DIR__);//Convertimos la direccion de url en un array, quitarmos los separadores y cada palabra pasa a ser 1 valor del array
    array_pop($folder);//Eliminamos el último valor del array
    
    $folder = implode("\\", $folder)."\\assets\\img\\productos\\";//rearmamos el array y terminamos de completar la dirección a la que queremos ir
    
    //print_r(pathinfo($_FILES['imagen']['name']));
    /*Usamos pathinfo para ver y obtener ciertas cosas del archivo file que cargamos.
     * en este caso obtendremos la extención.
     */
    $nombre_archivo = md5($_FILES['imagen']['tmp_name'].date("Y-m-d H:i:s")).".".pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
 
   /* if(!move_uploaded_file($_FILES['imagen']['tmp_name'], $folder.$nombre_archivo)){
        die("No se pudo mover el archivo a ".$folder.$nombre_archivo);
    }
    * Reemplazado por el de abajo en el host, porque sino no funcionaba (Me lo ponia en otra carpeta)
    */
    if((pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION)!='jpg')&&(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION))!= 'png'){
        
        echo"<div class='alert alert-danger' role='alert' style='position:absolute;
            top:50%; left:50%; translate-y;transform: translate(-50%, -50%);
            box-shadow: 0px 0px 10px 1200px rgba(0,0,0,0.3);'>
                ⚠ ?¡Extención de archivo incorrecta! ⚠<br>
                <br>Solo se puede subir archivos de extencion png y jpg<br>
                Archivo subido: ".pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION)."<br>
                <button name='back' onclick='history.back()' action='back' class='btn btn-success'>OK</button>
              </div>";
        die();
    }
    if(!move_uploaded_file($_FILES['imagen']['tmp_name'], '../assets/img/productos/'.$nombre_archivo)){
        die("No se pudo mover el archivo a ".$folder.$nombre_archivo);
    }
    //die();
    $nuevoProducto = new productos($_POST['codigo_producto']);
    $nuevoProducto->nombre_producto = $_POST['producto'];
    $nuevoProducto->descripcion = $_POST['descripcion'];
    $nuevoProducto->precio = $_POST['precio'];
    $nuevoProducto->id_categoria = $_POST['categoria'];
    $nuevoProducto->imagen = $nombre_archivo;
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
    unlink('../assets/img/productos/'.$_GET['imagen']);
    if ($nuevoProd->eliminar()){
        //Agregar aca para que borre la imagen
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
        

