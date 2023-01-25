<!DOCTYPE html>
<?php
//include './class/autoload.php';

// Pruebas para detección de dispositivos, para la tabla de registro de conexiones para estadísticas
echo "<br>========= Conexión info ===========";
echo "<p style='font-family: monospace;'>";
echo "<br>ip: ".getenv("REMOTE_ADDR");
//echo "<br>Navegador 1: ".getenv("HTTP_USER_AGENT");
//echo "<br>User Agent: ".$_SERVER['HTTP_USER_AGENT'];

//https://www.youtube.com/watch?v=PyWpGDt-e7s

//averiguar como funciona preg_match
$agent = $_SERVER['HTTP_USER_AGENT'];
if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
  echo "<br>Navegador: Internet Explorer";
} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
  echo "<br>Navegador: Chrome";
} else if (preg_match('/Edge\/\d+/', $agent) ) {
  echo "<br>Navegador: Edge";
} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
  echo "<br>Navegador: Firefox";
} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
  echo "<br>You're using Opera";
} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
  echo "<br>Navegador: Safari";
}

$mobile = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile'));
if ($mobile){
    echo '<br>Conexión desde un dispositivo móvil';
}else{
    echo '<br>Conexión desde en un PC';
}

// https://www.youtube.com/watch?v=0xnoQdWAGLQ

$iphone = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'iphon'));
$android = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'android'));
$palmpre = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'webos'));
$blackberry = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'blackberry'));
$ipod = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'ipod'));
$ipad = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'ipad'));

if ($iphone){
    echo "<br>Dispositico: iPhone";
}else if ($android){
    echo "<br>Dispositivo: Android";
}else if ($palmpre){
    echo "<br>Dispositivo: Web OS";
}else if ($blackberry){
    echo "<br>Dispositivo: BlackBerry";
}else if ($ipod){
    echo "<br>Dispositivo: iPod";
}else if ($ipad){
    echo "<br>Dispositivo: iPad";
}else{
    echo "<br>Dispositivo: PC";
    $win = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'win'));
    $linux = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'linux'));
    $mac = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mac'));
    if ($win){
        echo "<br>Sistema operativo: Windows";
    }else if ($linux){
        echo "<br>Siestema operativo: Linux";
    }else{
        echo "<br>Siestema operativo: MacOS";
    }
}
date_default_timezone_set("America/Argentina/Buenos_Aires");
echo "<br>Fecha de conexión: ".date("D d-M-Y  H:i:s");
echo "</p>";
echo "<br>===================================";
//-----
/*
if($iphone || $android || $palmre || $ipod || $blackberry){
    echo '<br>Estamos en un mobil';
}else{
    echo '<br>estamos en un pc';
}*/

//hacer un switch con case of (var con el dispositivo) y los dispositivos como para saber cual es.

/*
 * ip
 * Sistema operativo
 * Navegador
 * dispositivo
 * fecha
 * contador de peticiones para estadisticas de cantidad de conexiones
 * tabla con todos estos datos para estadisticas de conexiones
 */


// Fin del area de prueba de datos de conexiones y usuario

$lista_prod = productos::listar();
$lista_largo = count($lista_prod);
$contador = 0;

$lp = productos::listar();

include './views/home.html';


