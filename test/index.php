<?php

$basepath = $_SERVER['SCRIPT_NAME'];

//este es dinamico, te muestra la ubicacion donde estás parado;
echo __DIR__.DIRECTORY_SEPARATOR;
echo "<br>";
// Este es estático, siempre es la carpeta raiz del proyecto
echo $_SERVER['DOCUMENT_ROOT'];
echo "<br>";

// Este es dinamico, pero es la porción de la url que sigue despues del
// directorio raiz
echo $basepath;

die();