<?php



//setcookie('lenguage', 'ES', time()+30);
//setcookie('darkmode', 'NO', time()+30);
//setcookie('user', 'asdasd', time() +30);


$nombre = "user";
$valor = "cookie de prueba3";
$expira = time() + 30 ;
$dir = "/";
$dominio = "localhost";
$https = false;
$http = false;

setcookie($nombre, $valor, $expira, $dir, $dominio, $https, $http);

/*
 * https://www.youtube.com/watch?v=zR_UkpPZC4M
 * https://www.youtube.com/watch?v=LCkdML5ASUw
 * https://www.youtube.com/watch?v=SwZcGIMr3HQ
 * 
 * https://www.youtube.com/watch?v=3oFoB_ZJcWM

*/

