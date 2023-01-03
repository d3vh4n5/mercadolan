
<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Database
 *
 * @author Hans
 */


try{
    $db = new PDO("mysql:dbname=miproyecto;host=127.0.0.1","root","");
    //echo "<br>La conexión con el servidor se realizó correctamente..<br>";
    //echo "<pre>";
    //    print_r($db);
     //   echo "</pre>";
}catch(PDOException $e){
    echo '<br>'
        . '<p style="color:red;">'
        . 'Error de conexión con el servidor<br>'
        .$e->getMessage()
        ."</p>";
}

//echo '<span style="font-size: 20px; color: blue; font-style: italic">HOLA MUNDO!!!</span><br>';


class base_datos {
    /*@autor Juan Angel Basgall*/
    private $gbd;
    
    function __construct($driver, $base_datos, $host, $user, $pass){
        $conection = $driver.":dbname=".$base_datos.";host=$host";
        $this->gbd = new PDO($conection,$user,$pass);
        
        if (!$this->gbd){
            throw new Exception("<br>No se ha podido realizar la conexión...");
        }
    }
    function select($tabla, $filtros = null, $arr_prepare = null, $orden = null, $limit = null){
        $sql = "SELECT * FROM ".$tabla;
        if ($filtros != null){
            $sql .= " WHERE " . $filtros;
        }
        if ($orden != null){
            $sql .= " ORDER BY " . $orden;
        }
        if ($limit != null){
            $sql .= " LIMIT " . $limit;
        }
        echo "<pre>";
        print_r($sql);
        echo "</pre>";
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_prepare);
        if ($resource){
            return $resource->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new Exception("<br>No se pudo realizar la consulta de selección");
        }
    }
    
    function delete($tabla, $filtros = null, $arr_prepare = null){
        $sql = "DELETE FROM " .$tabla . " WHERE " . $filtros;
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_prepare);
        if ($resource){
            return true;
        } else {
            throw new Exception("<br>No se pudo realizar la consulta de borrado");
        }
    }
    
    function insert($tabla,$campos,$valores, $arr_prepare = null){
        $sql = "INSERT INTO " . $tabla . " (" . $campos . ") VALUES ($valores)";
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_prepare);
        if ($resource){
            return $this->gbd->lastInsertId();
        } else {
            echo "<pre>";
            print_r($resource->errorInfo());
            echo "</pre>";
            throw new Exception("<br>No se pudo realizar la consulta de inserción");
        }
    }
    
    function update ($tabla, $campos, $filtros, $arr_prepare = null){
        $sql = "UPDATE " . $tabla . " SET " . $campos . " WHERE " . $filtros;
        $resource = $this->gbd->prepare($sql);
        $resource->execute($arr_prepare);
        if ($resource){
            return true;
        } else {
            echo "<pre>";
            print_r($resource->errorInfo());
            echo "</pre>";
            throw new Exception("<br>No se pudo realizar la consulta de actualización");
        }
    } 
    static function lastinsert(){
        return $gbd->lastInsertId();
}

}
