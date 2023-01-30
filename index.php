<?php
include './class/autoload.php';

$nuevaConexion = new conexiones();
$nuevaConexion->guardar();

$lista_prod = productos::listar();
$lista_largo = count($lista_prod);
$contador = 0;

$lp = productos::listar();

include './views/home.html';


