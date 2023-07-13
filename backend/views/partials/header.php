<header id="inicio">
        <img class="logo" sizes="" src="/assets/img/Logo.png" alt="logo">

        <input type="checkbox" id="check">
        <label for="check"  class="mostrar-menu">
            &#8801
        </label>
        <nav class="menu">
        <form class="buscador" role="search" method="POST">
            <input class="inputBuscador" name="valorBusqueda" type="text" placeholder="🔍">
            <button class="btnBuscador" type="submit" name="buscar" value="busqueda">Buscar</button>
        </form>
            <a href="/index.php">Inicio</a>
            <a href="/index.php#ofertas">Ofertas</a>
            <a href="/backend/acerca_de.php">Acerca de</a>
            <?php
            if (isset($_SESSION['session1']['nombre'])){ 
                $carritos = carritos::listar();
                $cantidadItems = 0;
                foreach ($carritos as $carrito){
                    if ($carrito['id_usuario'] === $_SESSION['session1']['id']){
                        $cantidadItems += 1;
                    }
                }
                ?>
            
                <div class="desplegableUsuario">
                    <a href="#" class="btnUsusario"><?php echo $_SESSION['session1']['nombre'] ?></a>
                    <a href="/backend/carrito.php" class="carrito">🛒 <?php echo $cantidadItems; ?></a>
                    <div class="menuUsuario">
                        <ul>
                            <li><a href="/backend/logout.php">Desconectarse</a></li>
                            <?php 
                                if ($_SESSION['session1']['nombre'] === '♛ admin'){
                                    echo "<li><a href='/backend/productos.php'>Agregar productos</a></li>";
                                    echo "<li><a href='/backend/categorias.php'>Agregar categorías</a></li>";
                                    echo "<li><a href='/backend/views/incompleto.html'>Ver estadísticas</a></li>";
                                }else{
                                    echo "<li><a href='/backend/carrito.php'>Ir al carrito</a></li>";
                                    echo "<li><a href='/backend/views/incompleto.html'>Cambiar contraseña</a></li>";
                                    echo "<li><a href='/backend/views/incompleto.html'>Cambiar email</a></li>";
                                    echo "<li><a href='/backend/views/incompleto.html'>Opción</a></li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div> <?php
            }else{ ?>
                <input type="button" class="botonLog" value="Log in" onclick="document.location.href='/backend/login.php'">
            <?php } ?>
            <label for="check"  class="esconder-menu">
                &#215
            </label>
        </nav>
    </header>


<?php
if (isset ($_POST['buscar'])){
    if ($_POST['valorBusqueda'] !== ''){
    // include '/backend/busqueda.php';
    header('location: /backend/busqueda.php?valorBusqueda='.$_POST['valorBusqueda']);
    die();
    }else {}
}