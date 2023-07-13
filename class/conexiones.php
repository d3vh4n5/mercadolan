<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of conexiones
 *
 * @author Hans
 */
//include './autoload.php';
class conexiones {
    public $id;
    public $ip;
    public $agent;
    public $navegador;
    public $dispositivo;
    public $so;
    public $fecha;
    public $tiempo;
    public $tipo_intento;
    public $usuario;
    public $estado;
    
    public function __construct($id = null){
        $this->id = $id++;
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        if( preg_match('/MSIE (\d+\.\d+);/', $this->agent) ) {
          $this->navegador = "Internet Explorer";
        } else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $this->agent) ) {
          $this->navegador = "Chrome";
        } else if (preg_match('/Edge\/\d+/', $this->agent) ) {
          $this->navegador = "Edge";
        } else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $this->agent) ) {
          $this->navegador = "Firefox";
        } else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $this->agent) ) {
          $this->navegador = "Opera";
        } else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $this->agent) ) {
          $this->navegador = "Safari";
        }
        
        $iphone = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'iphone'));
        $android = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'android'));
        $palmpre = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'webos'));
        $blackberry = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'blackberry'));
        $ipod = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'ipod'));
        $ipad = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'ipad'));

        if ($iphone){
            $this->dispositivo = "iPhone";
            $this->so = "iOS";
        }else if ($android){
            $this->dispositivo = "Android";
            $this->so = "Android";
        }else if ($palmpre){
            $this->dispositivo = "Web OS";
            $this->so = "Web OS";
        }else if ($blackberry){
            $this->dispositivo = "BlackBerry";
            $this->so = "BlackBerry OS";
        }else if ($ipod){
            $this->dispositivo = "iPod";
            $this->so = "iOS";
        }else if ($ipad){
            $this->dispositivo = "iPad";
            $this->so = "iPad OS";
        }else{
            $this->dispositivo = "Computer";
            $win = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'win'));
            $linux = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'linux'));
            $mac = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mac'));
            if ($win){
                $this->so = "Windows";
            }else if ($linux){
                $this->so = "Linux";
            }else{
                $this->so ="MacOS";
            }
        }
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $this->fecha = date("D d-M-Y  H:i:s");
    }
    
    public function guardar(){
        $db = base_datos::conect();
        $resp = $db->insert("conexiones", "id, ip, agent, navegador, dispositivo, so, fecha,tiempo, tipo_intento, usuario", "?,?,?,?,?,?,?,?,?,?",
                array($this->id, $this->ip, $this->agent, $this->navegador, $this->dispositivo, $this->so, $this->fecha, $this->tiempo, $this->tipo_intento, $this->usuario));
    
        if($resp){
            //echo "agregado correctamenta";
        }else{
            //echo "<br>Error en la respuesta de insertado la base de datos!!!<br>";
            //return false;
        }
    }
    public function listar(){
        //Listar las conexiones que comparten el usuario, son fallidas y tienen una
         //       diferencia menor de 300 en el time
        $filtros = 'usuario='."'".$this->usuario."'";
        $db = base_datos::conect();
        return $db->select("conexiones", $filtros);
    
    }
}
/*
$nuevaConexion = new conexiones();
$nuevaConexion->usuario = 'juan';//En la practica sera $_POST['usuario']
$coincidencias = $nuevaConexion->listar();
$tiempo = time();
foreach ($coincidencias as $c){
    if ($c['tiempo']+300 < $tiempo){
        
        echo "Usuario bloqueado";
    }else{
        echo "puedes intentar";
    }
}
$nuevaConexion->tiempo = time();
$nuevaConexion->tipo_intento = 'fallido';
$nuevaConexion->guardar();

echo "<pre>";
print_r($nuevaConexion);
echo "</pre>";
echo "<pre>";
print_r($coincidencias);
echo "</pre>";



/*
if ($nuevaConexion->tiempo < (time()+300)){
    $nuevaConexion->tiempo = time();
    $nuevaConexion->cantidad_actual = +1;
    $nuevaConexion->cantidad_total = +1;
    $nuevaConexion->tipo_intento = False;
    $nuevaConexion->usuario = $usuario;//En la practica sera $_POST['usuario']
    if ($nuevaConexion->cantidad_actual < 5){
        $nuevaConexion->estado = 'activo';
    }else{
        $nuevaConexion->estado = blockeado;
    }
    
}



echo "<pre>";
print_r($nuevaConexion);
echo "</pre>";
//$nuevaConexion->guardar();
 */