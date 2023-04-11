<?php
//include './autoload.php';

class productos {
    /*@autor Juan Angel Basgall*/
    protected $id;
    public $nombre_producto;
    public $descripcion;
    public $precio;
    public $id_categoria;
    public $imagen;
    public $stock;
    private $exist;
   
    public function __construct($id = null) {
      
        if ($id != null){
            $db = base_datos::conect();
            $resp = $db->select("productos", "id=?", array($id));
            if(isset($resp[0]["id"])){
                $this->id = $resp[0]["id"];
                $this->nombre = $resp[0]["nombre_producto"];
                $this->descripcion = $resp[0]["descripcion"];
                $this->precio = $resp[0]["precio"];
                $this->categoria = $resp[0]["id_categoria"];
                $this->imagen = $resp[0]['imagen'];
                $this->stock = $resp[0]['stock'];
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
        return $db->delete("productos", "id=" . $this->id);
    }
    
    public function insertar(){
        $db = base_datos::conect();
        $resp = $db->insert("productos", "id, nombre_producto, descripcion, precio, id_categoria, imagen, stock", "?,?,?,?,?,?,?",
                array($this->id, $this->nombre_producto, $this->descripcion, $this->precio, $this->id_categoria, $this->imagen, $this->stock));
        
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
        return $db->update("productos", "id=?, nombre_producto=?, descripcion=?, precio=?, id_categoria=?, imagen=?, stock=?", "id=?",
                array($this->id, $this->nombre_producto, $this->descripcion, $this->precio, $this->id_categoria, $this->imagen,$this->stock, $this->id));
    } //en el array anterior creo que falta imagen y id
    
    static function listar(){
        $db = base_datos::conect();
        return $db->select("productos");
    }
    public function get_codigo(){
        return $this->id;
    }
}


//$nuevoProducto = new productos(3);
//$nuevoProducto->nombre_producto = "macho";
//$nuevoProducto->descripcion = "este es un terminal del tipo macho";
//$nuevoProducto->precio = 55.22;
//$nuevoProducto->id_categoria = 1;
//$nuevoProducto->mostrar();
//$nuevoProducto->guardar();