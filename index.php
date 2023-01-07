<!DOCTYPE html>
<?php
include './class/autoload.php';
echo "comentario de prueba";
$lista_prod = productos::listar();
$lista_largo = count($lista_prod);
$contador = 0;

$lp = productos::listar();

include './views/home.html';

?>
