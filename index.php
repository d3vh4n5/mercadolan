<?php
include './class/autoload.php';

$nuevaVisita = new visitas();
$nuevaVisita->origen = 'Home';
$nuevaVisita->guardar();

$lista_prod = productos::listar();
$lista_largo = count($lista_prod);
$contador = 0;

// echo "<pre>";
// print_r($lista_prod );
// echo "</pre>";

// die();

if (isset($_GET['buy'])) {
    //header('location: ./backend/compra.php');
    include './backend/compra.php';
    die();
}

$basepath = $_SERVER['SCRIPT_NAME'];
include './views/home.php';


