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
       <div> <h1>Lista de categorias </h1>
        <table>
          <thead> 
            <tr> 
               <th> ID categorias</th> 
               <th>Nombre</th>  
            <tr>    
          </thead> 
          <tbody>   
              <?php 
              include '../class/autoload.php';
              $lista_ctg = categorias::listar();
              foreach($lista_ctg as $listaCategorias){ ?> 
              <br>
              <tr>  
                  <td><?php echo $listaCategorias['id'] ?></td> 
                  <td><?php echo $listaCategorias['nombre_categoria'] ?></td> 
              </tr>    
              <?php } ?> 
          </tbody>   
        </table>      
     </div>  
      </center>
       <br><br><br><br>
       <a class="a" href="./views/categorias.html">Agregar más categorías</a>
       <a class="a" href="./views/productos.html">
    Agregar Productos</a>
       <br>
       <br>
       <h2>Juan Angel Basgall</h2>
  
 </body>  
</html> 
