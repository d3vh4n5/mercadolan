
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/estiloshp.css">
    <link rel="stylesheet" href="./normalyze.css">
    <title>Mercado Lan</title>
</head>
<body>
    <header>head
        <div class="contenedorLogo">
            <img class="logo" sizes="" src="../assets/img/Logo.png" alt="">
            <input type="button" class="botonLog" value="Loguearse y cargar productos" onclick="document.location.href='./productos.php'">
            <a class="autor" href="https://www.linkedin.com/in/juanangelbasgall/">"Mercado Lan" -> Por @Juan Angel Basgall</a>
        </div>
    </header>
    <section class="contenedorPrincipal">
        <div class="tituloPrincipal">
            <h2 class="titulo">Productos</h2>
            <hr></hr>
        </div>


        <table class="tablaProductos">
        <?php
        include '../class/autoload.php';
        $lista_prod = productos::listar();
        $lista_largo = count($lista_prod);
        $contador = 0;
        while($contador<$lista_largo){ ?> 
            <tr class="fila">  
                <?php 
                count($lista_prod);
                for ($i=1; $i<=4 && $contador<$lista_largo; $i++) { ?>
                    <td>
                        <div class="tarjetaProducto">
                            <p class="nombre"><?php echo $lista_prod[$contador]['nombre_producto'] ?></p>
                            <img class="imgProd" src="../assets/img/imagen.png" name="imagen producto" alt="">

                            <p class="cat"><?php echo categorias::nombrecat($lista_prod[$contador]['id_categoria']); ?>
                            </p>
                            <p class="precio"><?php echo $lista_prod[$contador]['precio'] ?></p>
                            <p class="descripcion"><?php echo $lista_prod[$contador]['descripcion'] ?> </p>
                        </div>
                        <?php $contador++; ?>
                    </td>
                <?php } ?> 

            </tr>
        <?php } ?> 
        </table>
    </section>
    <footer></footer>
</body>
</html>