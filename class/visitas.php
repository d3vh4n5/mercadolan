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
class visitas {
    protected $id;
    public $ip;
    public $agent;
    public $navegador;
    public $dispositivo;
    public $so;
    public $fecha;
    public $origen;
    
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
        } else if (preg_match('/SamsungBrowser[\/\s](\d+\.\d+)/', $this->agent) ) {
          echo "<br>Navegador: SamsungBrowser";
        } else {
            $this->navegador = 'Indefinido';
        }
        
        $iphone = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'iphone'));
        $android = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'android'));
        $palmpre = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'webos'));
        $blackberry = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'blackberry'));
        $ipod = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'ipod'));
        $ipad = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'ipad'));
        $samsung = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'SamsungBrowser'));

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
        }else if ($samsung){
            $this->dispositivo = "Samsung";
            $this->so =  "Android";
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
        $resp = $db->insert("visitas", "id, ip, agent, navegador, dispositivo, so, fecha, origen", "?,?,?,?,?,?,?,?",
                array($this->id, $this->ip, $this->agent, $this->navegador, $this->dispositivo, $this->so, $this->fecha, $this->origen));
    
        if($resp){
            //echo "agregado correctamenta";
        }else{
            //echo "<br>Error en la respuesta de insertado la base de datos!!!<br>";
            //return false;
        }
    }
}
/*
$nuevaConexion = new conexiones(); ahora visitas porque fue renombrada
echo "<pre>";
print_r($nuevaConexion);
echo "</pre>";
$nuevaConexion->guardar();
 */