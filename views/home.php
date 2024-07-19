<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/normalyze.css">
    <link rel="stylesheet" href="./assets/css/estiloshp.css">
    <title>Mercado Lan</title>
</head>
<body>
    <?php
        include 'backend/views/partials/header.php';
    ?>
    <section class="contenedorPrincipal">
        <div class="carrusel">
            <input type="button" value="<" class="atras">
            <div class="cuerpoCarrusel">
                <div class="imagenes">
                    <div class="imagen">
                        <img src="./assets/img/D_NQ_718313-MLA53587679163_022023-OO.webp" alt="">
                    </div>
                    <div class="imagen">
                        <img src="./assets/img/D_NQ_927039-MLA53514001723_012023-OO.webp" alt="">
                    </div>
                    <div class="imagen">
                        <img src="./assets/img/D_NQ_938120-MLA53589620773_022023-OO.webp" alt="">
                    </div>
                </div>
                <div class="puntos">
                    <div class="punto uno"></div>
                    <div class="punto dos"></div>
                    <div class="punto tres"></div>
                </div>
            </div>
                <input type="button" value=">" class="adelante">
        </div>
        <div class="tituloPrincipal">
            <h2 class="titulo">Productos</h2>
            <hr></hr>
        </div>
        
        <div class="carruselTarjetas">
            <div class="cuerpoCarruselFila">
                <input type="button" value="<" class="atrasFila">
                    <div class="filaTarjetasCarrusel">
                        <div class="contenedorTarjetasCarrusel">
                            <?php 
                            foreach ($lista_prod as $lista_prod) { ?>
                            <div class="contenedorTarjeta">
                                <div class="tarjetaProducto tarjetaCarrusel" onclick="document.location.href='<?php echo $basepath."?buy&id=".$lista_prod['id']; ?>'" >
                                    <p class="nombre"><?= $lista_prod['nombre_producto'] ?></p>
                                    <img class="imgProd" src="
                                         <?php
                                            if ($lista_prod['imagen']){
                                                echo "./assets/img/productos/".$lista_prod['imagen'];
                                            }else{
                                                echo "./assets/img/imagen.png";
                                            }       
                                         ?>
                                         " name="imagen producto" alt="">
                                    <p class="cat"><?= $lista_prod['categoria'] ?>
                                    <p class="precio"><?= $lista_prod['precio'] ?></p>
                                    <p class="descripcion"><?= $lista_prod['descripcion'] ?> </p>
                                </div>
                            </div>
                            <?php } ?> 
                        </div>
                    </div>
                <input type="button" value=">" class="adelanteFila">
            </div>
        </div>
        <section id="ofertas" class="seccionTarjetasGrandes">
            <div class="contenedorTarjetasGrandes">
                <div class="tarjetaGrande">
                    <img class="imgProdTG" src="./assets/img/Banner" alt="alt"/>
                    <p class="cat"></p>
                    <p class="precio">Promo Nescafé</p>
                    <p class="descripcion">Este mes aprovechpa las promos en todos los productos NESCAFÉ,
                        <br>y participá por precios increíbles!</p>
                </div>
                <div class="tarjetaGrande">
                    <img class="imgProdTG" src="./assets/img/Promo.jpg" alt="alt"/>
                    <p class="tituloTG"></p>
                    <p class="precio">Promo Mundialista!</p>
                    <p class="descripcion">El mes del mundial nos tra muchas alegrías, y una de ellas.. ¡Son las promos!
                    <br> Buscá la etiqueta ganadora en cualquiera de los productos adheridos a la promo mundialista, ¡¡y podes llevear un millón de pesos!!
                    </p>
                </div>
            </div>
        </section>
        <div class="tituloPrincipal">
            <h2 class="titulo">Productos </h2>
            <hr></hr>
        </div>
        <table class="tablaProductos">
            <tbody>
                <tr class="fila">  
                    <?php 
                    $lista_prod=productos::listar();
                    foreach ($lista_prod as $lista_prod) { ?>
                        <td>
                            <div class="tarjetaProducto" onclick="document.location.href='<?php echo $basepath."?buy&id=".$lista_prod['id']; ?>'" >
                                <p class="nombre"><?= $lista_prod['nombre_producto'] ?></p>
                                <img class="imgProd" src="
                                     <?php
                                     if ($lista_prod['imagen']){
                                        echo "./assets/img/productos/".$lista_prod['imagen'];
                                     }else{
                                        echo "./assets/img/imagen.png";
                                     }       
                                     ?>
                                     " name="imagen producto" alt="">
                                <p class="cat"><?= $lista_prod['categoria']?>
                                <p class="precio"><?= $lista_prod['precio'] ?></p>
                                <p class="descripcion"><?= $lista_prod['descripcion'] ?> </p>
                            </div>
                        </td>
                    <?php } ?> 
                </tr>
            </tbody>
        </table>
        
        <?php
            include './backend/views/partials/footer.php'
        ?>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="./assets/js/main.js"></script>
</body>
</html>