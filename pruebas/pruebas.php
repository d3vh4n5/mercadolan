<!DOCTYPE html>

<html>
    <head>
        <title>Pruebas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
    </head>
    <body>
        
        
        
<?php



/*
$string = '<script>alert("Hackeado")</script>';

function detector($var){
    $var = filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
    if (strpos($var, "<")|| strpos($var, ">")|| strpos($var, "\\")|| strpos($var, "/")|| strpos($var, "(")|| strpos($var, ")")|| strpos($var, "'")|| strpos($var, '"')){
        die("<div class='alert alert-danger' role='alert' style='position:absolute;
            top:50%; left:50%; translate-y;transform: translate(-50%, -50%);
            box-shadow: 0px 0px 10px 1200px rgba(0,0,0,0.3);'>
                Hemos detectado caracteres especiales:<br><br>".$var."
                <br><br>Por favor, elimnínelos e intentelo nuevamente<br><br>
                <button name='back' onclick='history.back()' action='back' class='btn btn-success'>OK</button>
              </div>");
    }
}

detector($string);

/*

$var = '<script>alert("Hackeado")</script>';
echo '<br>'.filter_var($var, FILTER_SANITIZE_STRING);
echo '<br>'.filter_var($var, FILTER_SANITIZE_SPECIAL_CHARS);
$mail = 'hola><><()"@"////(Mundo';
echo '<br>'.filter_var($mail, FILTER_SANITIZE_EMAIL);

/*
echo '<br>'.time();

$timeIntento = time();
if (time() < $timeIntento+60){
    echo "<br>no puedes ingresar el pass ->".time();
}else {
    echo "<br>ya puedes ingresar el pass ->".time();
}

/*
echo '<br>md5:'.md5('hola');
echo '<br>sha1:'.sha1('hola');

/*

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




/*
require '../class/PHPMailer-master/src/Exception.php';
require '../class/PHPMailer-master/src/PHPMailer.php';
require '../class/PHPMailer-master/src/SMTP.php';

include '../class/autoload.php';




//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.live.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'losangelestransporte@hotmail.com';                     //SMTP username
    $mail->Password   = '******';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('losangelestransporte@hotmail.com', 'Mailer');
    $mail->addAddress('juanangelbasgall@hotmail.com');     //Add a recipient

 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mail de pruebas desde Mailer PHP';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





//
//echo "pruebas php, ahora agregando finalmente el git";

/*
$datos = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
        $idprod =  base_datos::lastinsert();
        echo "<pre>";
        print_r($idprod);
        echo "</pre>";

$datos = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");


if(isset($_REQUEST['guardar'])){
    
    try{
        $producto = $_REQUEST['producto'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $query = "INSERT INTO imagenes(nombre_imagen, imagen) VALUES('$producto', '$imagen')";
        $resultado = $datos->execute($query);

        if ($resultado){
            echo "se inserto";
        } else {
            echo "No se inserto";
        }
    } catch (Exception $e) {
        echo '<br>'
        . '<p style="color:red;">'
        . 'Error de conexión con el servidor<br>'
        .$e->getMessage()
        ."</p>";
    }
    
}













if (is_array($variable) == true) {
    echo 'is array';
} else {
    echo 'is not array';
}








/*

Pruebas para obtener el nombre de una categoria

$datos = new base_datos("mysql", "miproyecto", "127.0.0.1", "root", "");
$nombrecat = $datos->select('Categorias', 'id=1');
$nombre = $nombrecat[0]['nombre_categoria'];
echo $nombre, '<br>';


en base a esta prueba, se modificó el metodo listar de categorías, y se agrego
        uno nuevo que se llama "nombrecat"
$nc = new categorias();
$nombre2 = $nc->nombrecat(2);
echo $nombre2;








 Estructura básica de while y for, con indice variable para imprimir en filas
$lista_prod = productos::listar();
$largo = count($lista_prod);

if (is_array($lista_prod) == true) {
    echo 'is array';
} else {
    echo 'is not array';
}

$i=0;
while ($i < $largo){
    echo 'Probando', $i, '<br>';
    for ($j=1; $j<=4 && $i<$largo; $j++){
        echo 'hola', ' \'',$lista_prod[$i]['nombre_producto'],'\' ', $j;
        $i++;
    }
    echo '<br>';
}

 */
