<?php
/*@autor Juan Angel Basgall*/

class autocarga {
    static public function cargar_clase ($clase){
        $arrayClases = array();
        $base = __DIR__.DIRECTORY_SEPARATOR;
        $arrayClases['base_datos'] = $base.'base_datos.php';
        $arrayClases['categorias'] = $base.'categorias.php';
        $arrayClases['productos'] = $base.'productos.php';
        $arrayClases['usuarios'] = $base.'usuarios.php';
        $arrayClases['conexiones'] = $base.'conexiones.php';
        $arrayClases['admin'] = $base.'admin.php';
        
        if (isset($arrayClases[$clase])){
            if (file_exists($arrayClases[$clase])){
                include $arrayClases[$clase];
            } else{
                throw new Exception("Archivo de clases no encontrada [{$arrayClases[$clase]}]");
            }
        }
    }
}

spl_autoload_register('autocarga::cargar_clase');