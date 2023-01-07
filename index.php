<!DOCTYPE html>
<?php
include './class/autoload.php';

$lista_prod = productos::listar();
$lista_largo = count($lista_prod);
$contador = 0;

$lp = productos::listar();

include './views/home.html';


