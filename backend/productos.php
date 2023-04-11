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
    $extencion = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
    if(($extencion!='jpg')&&($extencion!= 'jpeg')&&($extencion!= 'png')&&($extencion!= 'webp')){
        
        /*echo"<div class='alert alert-danger' role='alert' style='position:absolute;
            top:50%; left:50%; translate-y;transform: translate(-50%, -50%);
            box-shadow: 0px 0px 10px 1200px rgba(0,0,0,0.3);'>
                ⚠ ?¡Extención de archivo incorrecta! ⚠<br>
                <br>Archivos permitidos: png, jpg, jpeg, webp<br>
                Archivo subido: ".pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION)."<br>
                <button name='back' onclick='history.back()' action='back' class='btn btn-success'>OK</button>
              </div>";*/
        echo "<script> 
                alert(`⚠ ¡Extención de archivo incorrecta! ⚠ \n\n".
                        "Archivos permitidos: png, jpg, jpeg, webp \n".
                        "Extención del archivo subido: ".pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION)."`);
                history.back();
             </script>";
        die();
    }
    if(!move_uploaded_file($_FILES['imagen']['tmp_name'], '../assets/img/productos/'.$nombre_archivo)){
        die("No se pudo mover el archivo a ".$folder.$nombre_archivo);
    }
    $nuevoProducto = new productos($_POST['codigo_producto']);
    $nuevoProducto->nombre_producto = $_POST['producto'];
    $nuevoProducto->descripcion = $_POST['descripcion'];
    $nuevoProducto->precio = $_POST['precio'];
    $nuevoProducto->id_categoria = $_POST['categoria'];
    $nuevoProducto->imagen = $nombre_archivo;
    $nuevoProducto->stock = $_POST['stock'];
    $nuevoProducto->guardar();
    if (!$nuevoProducto->guardar()){
        die("En estos momentos, no podemos realizar la operación solicitada");
    } else {
        if (strlen($_POST['imagen_anterior']) > 10){
            try{
                unlink('../assets/img/productos/'.$_POST['imagen_anterior']);
            }catch (Exception $ex){
                echo "<br>la imagen no estaba".$ex;
            }
        }
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
        unlink('../assets/img/productos/'.$_GET['imagen']);
        header("location: ".$_SERVER['SCRIPT_NAME']);// esto direcciona la url al script actual quitando el GET
    } else{
        die("En estos momenos no podemos eliminar el producto");
    }
 }else if (isset($_GET['edit'])){
     $prod = new productos($_GET['id']);
     $prod->nombre_producto = $prod->nombre;//Este cambio y el de abajo es porque tenia distinto los registros de la superglobal a la de la clase, quizas por el name del input
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
        

