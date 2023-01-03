
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/estiloshp.css">
    <link rel="stylesheet" href="./normalyze.css">
    <title>Document</title>
</head>
<body>
    <header>head
        <div class="contenedorLogo">
            <img class="logo" sizes="" src="../assets/img/Logo.png" alt="">
        </div>
    </header>
        <div class="contenedorProductos">
            <div class="categoria">
                <h2 class="titulo">Categoria</h2>
                <div class="fila">
                    <div class="producto">
                        <p class="nombre">Nombre de producto</p>
                        <img class="imgProd" src="../assets/img/imagen.png" name="imagen producto" alt="">
                        
                        <p class="cat">cat</p>
                        <p class="descripcion">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, molestias? Facilis soluta amet laboriosam tenetur sed voluptas, iste </p>
                    </div>
                    <div class="producto">
                        <p class="nombre">Nombre de producto</p>
                        <img class="imgProd" src="./imagenes/imagen.png" name="imagen producto" alt="">
                        
                        <p class="cat">cat</p>
                        <p class="descripcion">descripcion</p>
                    </div>
                    <div class="producto">
                        <p class="nombre">Nombre de producto</p>
                        <img class="imgProd" src="./imagenes/imagen.png" name="imagen producto" alt="">
                        
                        <p class="cat">cat</p>
                        <p class="descripcion">descripcion</p>
                    </div>
                    <div class="producto">
                        <p class="nombre">Nombre de producto</p>
                        <img class="imgProd" src="./imagenes/imagen.png" name="imagen producto" alt="">
                        
                        <p class="cat">cat</p>
                        <p class="descripcion">descripcion</p>
                    </div>
                </div>
                
            </div>
<!--
            <h2 class="titulo">Categoria</h2>
            <div class="fila">
                <div class="producto">
                    <p class="nombre">Nombre de producto</p>
                    <img class="imgProd" src="./imagenes/imagen.png" name="imagen producto" alt="">
                    
                    <p class="cat">cat</p>
                    <p class="descripcion">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, molestias? Facilis soluta amet laboriosam tenetur sed voluptas, iste </p>
                </div>
                <div class="producto">
                    <p class="nombre">Nombre de producto</p>
                    <img class="imgProd" src="./imagenes/imagen.png" name="imagen producto" alt="">
                    
                    <p class="cat">cat</p>
                    <p class="descripcion">descripcion</p>
                </div>
                <div class="producto">
                    <p class="nombre">Nombre de producto</p>
                    <img class="imgProd" src="./imagenes/imagen.png" name="imagen producto" alt="">
                    
                    <p class="cat">cat</p>
                    <p class="descripcion">descripcion</p>
                </div>
                <div class="producto">
                    <p class="nombre">Nombre de producto</p>
                    <img class="imgProd" src="./imagenes/imagen.png" name="imagen producto" alt="">
                    
                    <p class="cat">cat</p>
                    <p class="descripcion">descripcion</p>
                </div>
            </div>
            
        </div>
        
       
        </div>-->
    
<hr></hr>
<table width='100%'>
<?php

  
           
include '../class/autoload.php';
$lista_prod = productos::listar();
$lista_largo = count($lista_prod);
$contador = 0;
while($contador<$lista_largo){ ?> 
    <tr width='100%'>  
        <?php 
        echo count($lista_prod);
        for ($i=1; $i<=4 && $contador<$lista_largo; $i++) { ?>
            <td>
                <div class="producto">
                    <p class="nombre"><?php echo $lista_prod[$contador]['nombre_producto'] ?></p>
                    <img class="imgProd" src="../assets/img/imagen.png" name="imagen producto" alt="">

                    <p class="cat"><?php 
                                    #$nc = new categorias();
                                    #$nombre2 = $nc->nombrecat($lista_prod[$contador]['id_categoria']);
                                    #echo $nombre2;
                                    echo categorias::nombrecat($lista_prod[$contador]['id_categoria']);
                                    
                                  ?>
                    </p>
                    <p class="precio"><?php echo $lista_prod[$contador]['precio'] ?></p>
                    <p class="descripcion"><?php echo $lista_prod[$contador]['descripcion'] ?> </p>
                </div>
                <?php 
                $contador++;
                ?>
                <hr></hr>
            </td>
            
        <?php 
        
        } ?> 
            
    </tr>    
<?php } ?> 
             


?>
    
</table>
    <footer>foot</footer>
</body>
</html>