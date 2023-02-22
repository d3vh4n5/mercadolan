<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of usuarios
 *
 * @author Hans
 */
class admin {
    protected $id;
    public $nombre;
    public $email;
    public $pass;
    private $exist;
    
    public function __construct($id = null) {
        $db = base_datos::conect();
        $resp = $db->select("admin", "id=?", array($id));
        if(isset($resp[0]["id"])){
            $this->id = $resp[0]["id"];
            $this->nombre = $resp[0]["nombre"];
            $this->email = $resp[0]["email"];
            $this->pass = $resp[0]["pass"];
            $this->exist = true;
        }  
    }
    public function guardar(){
        if ($this->exist) {
            return $this->actualizar();
        }else{
            return $this->insertar();
        }
    }
    public function eliminar(){
        $db = base_datos::conect();
        return $db->delete("admin", "id=" . $this->id);
    }
    
    public function insertar(){
        $db = base_datos::conect();
        $resp = $db->insert("admin", "id, nombre, email, pass", "?,?,?,?",
                array($this->id, $this->nombre, $this->email, $this->pass));
        
        if($resp){
            $this->id = $resp;
            $this->exist = true;
            return true;
        }else{
            echo "<br>Error en la respuesta de insertado la base de datos!!!<br>";
            return false;
        }
    }
    
    public function actualizar(){
        $db = base_datos::conect();
        return $db->update("admin", "id=?, nombre=?, email=?, pass=?", "id=?",
                array($this->id, $this->nombre, $this->email, $this->pass, $this->id));
    } //en el array anterior creo que falta imagen y id
    
    static function listar(){
        $db = base_datos::conect();
        return $db->select("admin");
    }
}
