<!DOCTYPE html>

<html>
    <head>
        <title>Lista de Productos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
    </head>
    <body>
    
        <center>  
            <div> <h1>Lista de productos </h1>
             <table >
               <thead> 
                 <tr> 
                     <th>Accion</th>
                    <th> ID productos</th> 
                    <th>Nombre</th>   
                    <th>Descripcion</th>  
                    <th>Precio</th>  
                    <th>Categoria ID</th>
                    <th>Categoría</th>
                 <tr>    
               </thead> 
               <tbody>   
                   <?php 
                   //include '../class/autoload.php';
                   $lista_prod = productos::listar();
                   foreach($lista_prod as $listaProductos){ ?> 
                   <tr> 
                       <td>
                           <a class="botonActionTabla E" href="<?php echo $basepath."?edit&id=".$listaProductos['id']; ?>">Editar</a>
                           <a class="botonActionTabla" href="<?php echo $basepath."?rem&id=".$listaProductos['id'];?>">Eliminar</a>
                       </td>
                       <td><?php echo $listaProductos['id'] ?></td> 
                       <td><?php echo $listaProductos['nombre_producto'] ?></td> 
                       <td><?php echo $listaProductos['descripcion'] ?></td>
                       <td><?php echo $listaProductos['precio'] ?></td>
                       <td><?php echo $listaProductos['id_categoria'] ?></td>
                       <td><?php echo categorias::nombrecat($listaProductos['id_categoria']); ?></td>
                   </tr>    
                   <?php } ?> 
               </tbody>  
               <tfoot>
                   <tr>
                       <td colspan="7" style="text-align: center; padding: 20px;">
                           <input type="button" class="botonFoot" value="Agregar Producto" onclick="document.location.href='<?php echo $basepath."?add" ?>'">
                           <input type="button" class="botonFoot" value="Agregar Categorías" onclick="document.location.href='./categorias.php'">
                       </td>
                   </tr>
               </tfoot>
             </table>      
          </div>  
        </center>
    <!--
       <br><br><br><br>
       <a class="a" href="./views/productos.html">Agregar más productos</a>
       <a class="a" href="./views/categorias.html">Agregar Categorías</a>
       <br>
       <br>
    -->
       <h2>Juan Angel Basgall</h2>
  
 </body>  
</html> 