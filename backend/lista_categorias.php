<!DOCTYPE html>

<html>
    <head>
        <title>Lista de categorias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
    </head>
    <body>
    
        <center>  
            <div> 
                <h1>Lista de categorías </h1>
                <p style="color: orangered;">Si la categoría está en uso no se podrá borrar</p>
                <table>
                    <thead> 
                        <tr>
                            <th>Acción</th>
                            <th> ID categorias</th> 
                            <th>Nombre</th>  
                        <tr>    
                    </thead> 
                    <tbody>   
                        <?php 
                        //include '../class/autoload.php';
                        $lista_ctg = categorias::listar();
                        foreach($lista_ctg as $listaCategorias){ ?>
                        <tr>
                            <td>
                                <a href="<?php echo $basepath."?edit&id=".$listaCategorias['id']; ?>">Editar</a>
                                <a href="<?php echo $basepath."?rem&id=".$listaCategorias['id'];?>">Eliminar</a>
                            </td>
                            <td><?php echo $listaCategorias['id'] ?></td> 
                            <td><?php echo $listaCategorias['nombre_categoria'] ?></td> 
                        </tr>    
                        <?php } ?> 
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="tfoot">
                                <input type="button" class="botonFoot" value="Agregar Categoría" onclick="document.location.href='<?php echo $basepath."?add" ?>'">
                                <input type="button" class="botonFoot" value="Agregar Productos" onclick="document.location.href='./views/productos.html'">
                            </td>
                        </tr>
                    </tfoot>
                </table>      
            </div>  
        </center>
       <br><br><br><br>
       <h2>Juan Angel Basgall</h2>
  
 </body>  
</html> 
