
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


<?php #echo '<span style="font-size: 20px; color: blue; font-style: italic">HOLA MUNDO!!!</span><br>'; 



/*@autor Juan Angel Basgall*/
include '../class/autoload.php';

/*
if(isset($_POST['action']) && $_POST['action'] == 'guardar'){
    $miCategoria = new categorias();
    $miCategoria->nombre = $_POST['categoria'];
    $miCategoria->guardar();
}else if (isset($_GET['add'])){
    include 'views/categorias.html';
    die();
}
 * 
 */
//$lista_ctg = categorias::listar();
//include 'views/lista_categorias.html';

if(isset($_REQUEST['guardar'])){
        $nom=$_REQUEST['categoria'];
        $id=$_REQUEST['id'];
        $nuevaCategoria = new categorias($id);
        $nuevaCategoria->nombre_categoria = $nom;
        $nuevaCategoria->guardar();

        //var_dump($nuevaCategoria);
        
        echo '<p style="'
        . 'color: lightgreen;'
        . 'font-size: 30px;'
                . '">';
        
        echo "→ El nombre ingresado es : $nom <br>"
                . "→               ID: $id";
        
        echo '</p>';
        
        
     }
     
     /*      
Probar estos comandos que me tiró marisa, porque al hacer el post le tomaba el id como
si fuera un string entonces le tiraba error
      * 
      * 

$categoria= new Categorias(intval($_POST["numeroCategoria"]));  // esto convierte el string en integer
$categoria->guardar($arr_prepare=[htmlspecialchars($_POST["descripcion"])]); // esto convierte el texto en algo para que el araay funciona
      
      */
     
     
     
     
     
?>
        <a  class="a" href="./views/categorias.html">
    Volver a cargar otra categoría</a>
<a class="a" href="./lista_categorias.php">
    Listar Categorias</a>
        <a class="a" href="./views/productos.html">
    Agregar Productos</a>
        
        
