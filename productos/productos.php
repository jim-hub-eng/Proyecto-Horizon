<?php

    include '../php/conexion.php';
    $sub_categoria = $_GET['subCategoria'];
    session_start();
    $cuenta = 0;

    if(isset($_SESSION['correo'])){
        $correo = $_SESSION['correo'];
        $sql = "SELECT id FROM usuarios WHERE correo = '$correo';";
        $ejecutar = $conexion -> query($sql);
        $datos = $ejecutar -> fetch_object();
        $id_usuario = $datos -> id;
        $cuenta = 1;
    }else{
        $cuenta = 0;
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucwords($sub_categoria) ?> | Horizon Marcketing</title>
    <style>
        #btn-anadir-carrito{
            background: #fff; /* color de fondo */
            color: #020202; /* color de fuente */
            border: 2px solid #000000; /* tamaño y color de borde */
            padding: 16px 20px;
            border-radius: 20px; /* redondear bordes */
            position: relative;
            z-index: 1;
            overflow: hidden;
            display: inline-block;
            text-decoration: none;
            cursor: pointer;
            bottom: -10px;
        }
        #btn-anadir-carrito:hover{
            color: #fff;
        }
        #btn-anadir-carrito span{
            content: "";
            background: #460562; /* color de fondo hover */
            position: absolute;
            z-index: -1;
            padding: 16px 20px;
            display: block;
            left: -20%;
            right: -20%;
            top: 0;
            bottom: 0;
            transform: skewX(45deg) scale(0, 1);
            transition: all 0.3s ease;
        }
        #btn-anadir-carrito:hover span{
            transition: all .5s ease-out;
            transform: skewX(45deg) scale(1, 1);
        }
    </style>
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
            <a href="../carrito.php"><i class="fas fa-shopping-cart"></i></a>
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
                    <a href="../categorias/casa.php">
                        <img src="../img/casa.png">
                        <h4>Hogar</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="../categorias/electrodomesticos.php">
                        <img src="../img/electrodomesticos.png">
                        <h4>Electrodomesticos</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="../categorias/ropa.php">
                        <img src="../img/ropa.png">
                        <h4>Ropa</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="../categorias/Baño.php">
                        <img src="../img/baño.png">
                        <h4>Baño</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="../categorias/maquillaje.php">
                        <img src="../img/maquillage.png">
                        <h4>Maquillage</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="../categorias/juguetes.php">
                        <img src="../img/jugetes.png">
                        <h4>Juegetes</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="../categorias/muebles.php">
                        <img src="../img/muebles.png">
                        <h4>Muebles</h4>
                    </a>
                </div>
            </div>
        </div>
        <a class="btn-regresar" href="../index.php"><i class="bi bi-arrow-left"></i></a>
    </nav>

    <div class="menu">
        <h2>Menu</h2>
        <button id="cerrarMenu" onclick="cerrarMenu()">&times;</button>
        <ul class="ul-1-from-menu">
            <li><button onclick="abrirCategoriasDeMenu()"><i class="bi bi-list-ul"></i>Categorias</button></li>
            <li><a href="../carrito.php?id=<?= $id_usuario ?>"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
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
            <form action="../php/mostrar_carrito.php" method="POST"  class="product">
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
                <input type="hidden" name="txtidProducto" value="<?= $datos -> id ?>">
                <input type="hidden" name="txtidUsuario" value="<?= $id_usuario ?>">
                <input type="hidden" name="txtSubCategoria" value="<?= $sub_categoria ?>">
                <a href="../producto_indiv.php?id=<?= $datos -> id ?>" class="ov-btn-grow-skew-reverse">Ver Mas</a>
                <?php
                    if($cuenta == 1){ ?>
                        <button id="btn-anadir-carrito">Añadir al carrito <span></span></button>
                    <?php }else{ ?>
                        <span id="btn-anadir-carrito">Añadir al carrito <span></span></span>
                    <?php }
                ?>
            </form>
        <?php }

    ?>
</div>
</div>
    <footer id="footer">
        <div class="redes">
            <h3>Redes Sociales</h3>
            <ul>
                <li>
                    <a target="_blanck" class="btn-ins" href="https://www.instagram.com/programmers._.123?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
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
                <li><a href="./Ayuda.html">Ayuda</a></li>
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