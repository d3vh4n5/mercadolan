<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of carrito
 *
 * @author Hans
 */
class carritos {
    protected $id;
    public $id_usuario;
    public $id_producto;
    public $cantidad;
    private $exist;
    
    public function __construct($id = null) {
        if ($id != null){
            $db = base_datos::conect();
            $resp = $db->select("carritos", "id=?", array($id));
            if(isset($resp[0]["id"])){
                $this->id = $resp[0]["id"];
                $this->id_usuario = $resp[0]["id_usuario"];
                $this->id_producto = $resp[0]["id_producto"];
                $this->cantidad = $resp[0]["cantidad"];
                $this->exist = true;
            }
        } else {
            #echo "<br> el ID es nulo<br>";
        }
    }
    
    public function mostrar(){
        echo "<br>-------------------------------------";
        echo"<pre>";
        //var_dump($this);
        print_r($this);
        echo "</pre>";
        echo "<br>-------------------------------------";
    }

    public function guardar(){
        if ($this->exist) {
            return $this->actualizar();
        }else{
            return$this->insertar();
        }
    }
    public function eliminar(){
        $db = base_datos::conect();
        return $db->delete("carritos", "id=" . $this->id);
    }
    
    public function insertar(){
        $db = base_datos::conect();
        $resp = $db->insert("carritos", "id, id_usuario, id_producto, cantidad", "?,?,?,?",
                array($this->id, $this->id_usuario, $this->id_producto, $this->cantidad));
        
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
        return $db->update("carritos", "id=?, id_usuario=?, id_producto=?, cantidad=?", "id=?",
                array($this->id, $this->id_usuario, $this->id_producto, $this->cantidad, $this->id));
    }
    
    static function listar(){
        $db = base_datos::conect();
        return $db->select("carritos");
    }
}
