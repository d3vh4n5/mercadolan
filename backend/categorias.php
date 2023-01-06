
<html>
    <head>
        <title>Categorias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- 
        <link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
        hago otro link igual, pero desde la perspectiva del controlador,
            es decir, como si el controlador fuera el html midmo. Sino no me 
            toma el css-->
        <link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
    </head>
    <body>


<?php



/*@autor Juan Angel Basgall*/
include '../class/autoload.php';

if(isset($_POST['action']) && $_POST['action'] == 'guardar'){
        /*$nuevaCategoria = new categorias($id); de momento no usamos el id */
        $nuevaCategoria = new categorias($_POST['codigo_categoria']);
        $nuevaCategoria->nombre_categoria = $_POST['categoria'];
        if (!$nuevaCategoria->guardar()){
        die("En estos momentos, no podemos realizar la operación solicitada");
        } else {
            header("location: ".$_SERVER['SCRIPT_NAME']);//esto redirecciona la url al script actual quitando el post
        } 
        
}else if (isset($_GET['add'])){
    //$lista_ctg = categorias::listar();
    $cate= new categorias();
    include 'views/categorias.html';
    die();
}else if (isset($_GET['rem'])) {
   $nuevaCategoria = new categorias($_GET['id']);
   if ($nuevaCategoria->eliminar()){
       header("location: ".$_SERVER['SCRIPT_NAME']);// esto direcciona la url al script actual quitando el GET
   } else{
       die("En estos momenos no podemos eliminar la categoria");
   }
}else if (isset($_GET['edit'])){
    $cate = new categorias($_GET['id']);
    include './views/categorias.html';
    die();
}

     /*      
Probar estos comandos que me tiró marisa, porque al hacer el post le tomaba el id como
si fuera un string entonces le tiraba error
      * 
$categoria= new Categorias(intval($_POST["numeroCategoria"]));  // esto convierte el string en integer
$categoria->guardar($arr_prepare=[htmlspecialchars($_POST["descripcion"])]); // esto convierte el texto en algo para que el araay funciona
      
      */
     
     
     
$lista_ctg = categorias::listar();
$basepath = $_SERVER['SCRIPT_NAME']; //indica la url del script en el navegador
include './lista_categorias.php';
     
?>
