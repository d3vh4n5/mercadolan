<?php
include './class/autoload.php';

$nuevaVisita = new visitas();
$nuevaVisita->origen = 'Home';
$nuevaVisita->guardar();

$lista_prod = productos::listar();
$lista_largo = count($lista_prod);
$contador = 0;

//$lp = productos::listar();

if (isset($_GET['buy'])) {
    //header('location: ./backend/compra.php');
    include './backend/compra.php';
    die();
}
if (isset ($_POST['action'])){
    if ($_POST['valorBusqueda'] !== ''){
    include './backend/busqueda.php';
    die();
    //header('location: ./backend/busqueda.php?valorBusqueda='.$_POST['valorBusqueda']);
    }else {}
}

$basepath = $_SERVER['SCRIPT_NAME'];
include './views/home.html';


