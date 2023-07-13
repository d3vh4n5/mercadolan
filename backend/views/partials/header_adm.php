<header>
    <img class="logo" sizes="" src="../assets/img/Logo.png" alt="" width="150px;">
    <a class="btnHome" href="../index.php">🏠</a>
    <div class="desplegableUsuario">
        <a href="#"><?php echo $_SESSION['session1']['nombre'] ?></a>
        <div class="menuUsuario">
            <ul>
                <li><a href="./logout.php">Desconectarse</a></li>
                <?php 
                    if ($_SESSION['session1']['nombre'] === '♛ admin'){
                        echo "<li><a href='./productos.php'>Agregar productos</a></li>";
                        echo "<li><a href='./categorias.php'>Agregar categorías</a></li>";
                        echo "<li><a href='./views/incompleto.html'>Ver estadísticas</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</header>