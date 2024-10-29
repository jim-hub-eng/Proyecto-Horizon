<?php

    $sub_categoria = $_GET['subCategoria'];

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucwords($sub_categoria) ?> | Horizon Marcketing</title>
    <link rel="stylesheet" href="../css/productos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    
    <nav class="navegacion">
        <div class="cat">
            <h2><?php echo ucwords($sub_categoria); ?></h2>
        </div>
        <div class="box-buscador">
            <input type="search" id="inp-buscador" placeholder="Buscar..." required>
            <label for="inp-buscador"><i class="bi bi-search"></i></label>
        </div>
        <div class="navegacion-box">
            <div class="carrito">
                <a href="../carrito.html"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="btn-menu">
                <button onclick="abrirMenu()"><i class="bi bi-list"></i></button>
            </div>
        </div>
        <div class="nav-1">
            <a class="btn-verCategoria" href=""><i class="bi bi-list-ul"></i>Categorias</a>
            <a class="Ayuda" href=""><i class="bi bi-info-circle"></i>Ayuda</a>
            <a class="Preguntas" href=""><i class="bi bi-question-lg"></i>Preguntas</a>
            <div class="categorias">
                <div class="box-categoria">
                    <a href="../categorias/casa.html">
                        <img src="../img/casa.png">
                        <h4>Hogar</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="">
                        <img src="../img/electrodomesticos.png">
                        <h4>Electrodomesticos</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="">
                        <img src="../img/ropa.png">
                        <h4>Ropa</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="../categorias/Baño.html">
                        <img src="../img/baño.png">
                        <h4>Baño</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="">
                        <img src="../img/maquillage.png">
                        <h4>Maquillage</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="">
                        <img src="../img/jugetes.png">
                        <h4>Juegetes</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="../categorias/muebles.html">
                        <img src="../img/muebles.png">
                        <h4>Muebles</h4>
                    </a>
                </div>
            </div>
        </div>
        <a class="btn-regresar" href="../index.html"><i class="bi bi-arrow-left"></i></a>
    </nav>

    <div class="menu">
        <h2>Menu</h2>
        <button id="cerrarMenu" onclick="cerrarMenu()">&times;</button>
        <ul class="ul-1-from-menu">
            <li><button onclick="abrirCategoriasDeMenu()"><i class="bi bi-list-ul"></i>Categorias</button></li>
            <li><a href="../login.html"><i class="bi bi-person"></i>Iniciar Sesion</a></li>
            <li><a href="../carrito.html"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
            <li><button onclick="apaBusquedaFlotante()"><i class="bi bi-search"></i>Buscar</button></li>
        </ul>
        <ul class="ul-2-from-menu">
            <li><a href="#"><i class="bi bi-info-circle"></i>Ayuda</a></li>
            <li><a href="#"><i class="bi bi-question-lg"></i>Preguntas</a></li>
        </ul>
    </div>

    <div class="busqueda-from-menu">
        <div class="box-btn">
            <button id="desBusquedaFlotante" onclick="desBusquedaFlotante()"> &times;</button>
        </div>
        <h2>Buscador</h2>
        <p>Ingresa el articulo que quieres buscar.</p>
        <div class="box-inp-busqueda">
            <label for=""><i class="bi bi-search"></i></label>
            <input type="text" placeholder="Buscar...">
        </div>
    </div>

    <div class="categorias-form-menu">
        <h2>Categorias</h2>
        <button onclick="cerrarCategoriasDeMenu()">&times;</button>
        <ul>
            <li>
                <a href="../categorias/casa.html">
                    <img src="../img/casa.png" alt="">
                    <h4>Hogar</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/electrodomesticos.png" alt="">
                    <h4>Electrodomesticos</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/ropa.png" alt="">
                    <h4>Ropa</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/baño.png" alt="">
                    <h4>Baño</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/maquillage.png" alt="">
                    <h4>Maquillage</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/jugetes.png" alt="">
                    <h4>Juguetes</h4>
                </a>
            </li>
            <li>
                <a href="../categorias/muebles.html">
                    <img src="../img/muebles.png" alt="">
                    <h4>Muebles</h4>
                </a>
            </li>
        </ul>
    </div>

   ------------PRODUCTOS-------------
   <div class="product-container">
    <?php

        include '../php/conexion.php';

        $sql = "SELECT * FROM productos WHERE sub_categoria = '$sub_categoria'";
        $resultado = $conexion -> query($sql);

        while($datos = $resultado -> fetch_object()){ ?>
            <div class="product">
                <?php echo '<img src="./mos.php?id=' . htmlspecialchars($datos -> id, ENT_QUOTES) . '" >'; ?>
                <h3><?= ucwords($datos ->  nombre) ?></h3>
                <p class="price">Precio: $<?= $datos -> precio ?> 
                    <?php
                        if($datos -> descuento == 'n / a'){ ?>
                            <span class="discount"></span>
                        <?php }else{ ?>
                            <span class="discount"><?= $datos -> descuento ?>% de descuento</span>
                        <?php }
                    ?>
                </p>
                <a href="#" class="ov-btn-grow-skew-reverse">Ver Mas</a>
            </div>
        <?php }

    ?>
    <!--
    <div class="product">
        <img src="../img/baño/MuebleB2.png" alt="Producto 2">
        <h3>GABINETE STRATBURG 30 2PZAS COLOR CARAMEL</h3>
        <p class="price">Precio: $70.00</p>
        <a href="#" class="ov-btn-grow-skew-reverse">Ver Mas</a>
    </div>

    <div class="product">
        <img src="../img/baño/MuebleB3.png" alt="Producto 3">
        <h3>GABINETE PARA BAÑO DE PISO CLADY BLANCO 24 PULGADAS CON LAVABO</h3>
        <p class="price">Precio: $45.00 <span class="discount">15% de descuento</span></p>
        <a href="#" class="ov-btn-grow-skew-reverse">Ver Mas</a>
    </div>

    <div class="product">
        <img src="../img/baño/MueblesB4.png" alt="Producto 4">
        <h3>MUEBLE PARA BAÑO HOLLYBROOK CLIFTON 62.2 X 42.5 X 87.3 CM</h3>
        <p class="price">Precio: $100.00</p>
        <a href="#" class="ov-btn-grow-skew-reverse">Ver Mas</a>
    </div>

    <div class="product">
        <img src="../img/baño/MueblesB5.png" alt="Producto 5">
        <h3>MUEBLE PARA BAÑO WESTCOURT 155 X 55.9 X 99 CM</h3>
        <p class="price">Precio: $30.00</p>
        <a href="#" class="ov-btn-grow-skew-reverse">Ver Mas</a>
    </div>

    <div class="product">
        <img src="../img/baño/MueblesB6.png" alt="Producto 6">
        <h3>MUEBLE PARA BAÑO WESTCOURT 155 X 55.9 X 97.8 CM</h3>
        <p class="price">Precio: $80.00</p>
        <a href="#" class="ov-btn-grow-skew-reverse">Ver Mas</a>
    </div>
-->
</div>
</div>
    <footer>
        <div class="redes">
            <h3>Redes Sociales</h3>
            <ul>
                <li>
                    <a class="btn-ins" href="#">
                        <i class="bi bi-instagram"></i>
                        <span>Instagram</span>
                    </a>
                </li>
                <li>
                    <a class="btn-face" href="#">
                        <i class="bi bi-facebook"></i>
                        <span>Facebook</span>
                    </a>
                </li>
                <li>
                    <a class="btn-x" href="#">
                        <i class="bi bi-twitter-x"></i>
                        <span>Twitter</span>
                    </a>
                </li>
                <li>
                    <a class="btn-tiktok" href="#">
                        <i class="bi bi-tiktok"></i>
                        <span>TikTok</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="atencionCliente">
            <h2>Atencion al Cliente</h2>
            <ul>
                <li><a href="#">Ayuda</a></li>
                <li><a href="#">Servicios</a></li>
            </ul>
        </div>
        <div class="politicas">
            <ul>
                <li><a href="#">Politicas de privacidad</a></li>
                <li><a href="#">Terminos de uso</a></li>
                <li><a href="#">Preguntas frecuentes</a></li>
            </ul>
        </div>
    </footer>

    <script src="../js/categorias-script.js"></script>
</body>
</html>