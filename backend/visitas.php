<!DOCTYPE html>

<html>
    <head>
        <title>Visitas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                height: 100vh;
                background: #000;
                color: green;
                overflow-y: scroll;
                display: grid;
                place-items: center;
                font-family: monospace;
            }
        </style>
    </head>
    <body>

<?php

include '../class/autoload.php';


function listar(){
    $db = base_datos::conect();
    return $db->select("visitas", "origen<>?", array('Home'));
}

$lista = listar();

echo "Coincidencias: ".count($lista);

foreach ($lista as $visita){
    if ($visita['ip']!='152.168.243.71'){
        echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
        echo "<br>ip: ".$visita['ip'];
        echo "<br>dispositivo: ".$visita['dispositivo'];
        echo "<br>origen: ".$visita['origen'];
        echo "<br>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
    }
    
}