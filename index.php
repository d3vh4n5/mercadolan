<?php
include './class/autoload.php';

$nuevaVisita = new visitas();
$nuevaVisita->guardar();

$lista_prod = productos::listar();
$lista_largo = count($lista_prod);
$contador = 0;

$lp = productos::listar();

include './views/home.html';


