<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */



/*========== Código creado como pruebas de tablas =========================*/



try{
    $gbd = new PDO("mysql:dbname=miproyecto;host=127.0.0.1","root","");
    //El IF BOT EXISTS puede no ir pero mejor que esté
    $resource = $gbd->prepare("CREATE TABLE IF NOT EXISTS `Usuarios` (
                     `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                     `nombre` varchar(50) NOT NULL,
                     `apellido` varchar(50) NOT NULL,
                     `fecha_nacimiento` date NOT NULL,
                     `email` varchar(200) NOT NULL,
                     `domicilio` varchar(200) NOT NULL,
                     PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8");
    echo 'La conexión  con el servidor fue exitosa....<br>';
     if ($resource->execute()){
         echo "<br>Tabla creada correctamente";
     }else {
         echo "<br>No se pudo crear la tabla";
         echo $resource->errorCode();
         print_r($resource->errorInfo());
     }
} catch (PDOException $e){
    echo 'Falló: '.$e->getMessage();
}