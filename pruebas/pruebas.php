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
