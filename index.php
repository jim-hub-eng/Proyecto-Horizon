<?php
    session_start();

    include './php/conexion.php';

    $correo = $_SESSION['correo'];

    $sql = "SELECT id FROM usuarios WHERE correo = '$correo'";
    $ejecutar = $conexion -> query($sql);

    while($datos = $ejecutar -> fetch_assoc()){
        $id_usuario = $_SESSION['id'] = $datos['id'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <style>
        .cerrarS{
            
                color: red;
                text-decoration: none;
        }
        @media(max-width: 720px){
            .box-cerrarsesion{
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="css/index-styles.css">
    <link rel="shortcut icon" href="img/logo-1_2.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>

    <nav class="navegacion">
        <div class="logo">
            <img src="img/logo.jpg" alt="">
        </div>
        <div class="box-buscador">
            <input type="search" id="inp-buscador" placeholder="Buscar..." required>
            <label for="inp-buscador"><i class="bi bi-search"></i></label>
        </div>
        <div class="navegacion-box">
            <div class="carrito">
                <a href="./carrito.php?id=<?= $id_usuario ?>"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="box-cerrarsesion">
                <a class="cerrarS" href="./php/cerrarSesion.php">Salir</a>
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
                    <a href="./categorias/casa.php">
                        <img src="img/casa.png">
                        <h4>Hogar</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/electronico.php">
                        <img src="img/electronico.png">
                        <h4>Electronico</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/ropa.php">
                        <img src="img/ropa.png">
                        <h4>Ropa</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/Baño.php">
                        <img src="img/baño.png">
                        <h4>Baño</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/maquillaje.php">
                        <img src="img/maquillage.png">
                        <h4>Maquillaje</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/juguetes.php">
                        <img src="img/jugetes.png">
                        <h4>Juguetes</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/muebles.php">
                        <img src="img/muebles.png">
                        <h4>Muebles</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/electrodomesticos.php">
                        <img src="img/electrodomesticos.png">
                        <h4>Electrodomesticos</h4>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="menu">
        <h2>Menu</h2>
        <button id="cerrarMenu" onclick="cerrarMenu()">&times;</button>
        <ul class="ul-1-from-menu">
            <li><button onclick="abrirCategoriasDeMenu()"><i class="bi bi-list-ul"></i>Categorias</button></li>
            <li><a href="./carrito.php?id=<?= $id_usuario ?>"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
            <li><button style="margin-left: -10px;" onclick="apaBusquedaFlotante()"><i class="bi bi-search"></i>Buscar</button></li>
            <li><a class="cerrarS" href="./php/cerrarSesion.php"><i class="bi bi-box-arrow-in-left"></i>Salir</a></li>
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
                <a href="./categorias/casa.php">
                    <img src="img/casa.png" alt="">
                    <h4>Hogar</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/electronico.php">
                    <img src="img/electronico.png" alt="">
                    <h4>Electronico</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/ropa.php">
                    <img src="img/ropa.png" alt="">
                    <h4>Ropa</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/Baño.php">
                    <img src="img/baño.png" alt="">
                    <h4>Baño</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/maquillaje.php">
                    <img src="img/maquillage.png" alt="">
                    <h4>Maquillaje</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/juguetes.php">
                    <img src="img/jugetes.png" alt="">
                    <h4>Juguetes</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/muebles.php">
                    <img src="img/muebles.png" alt="">
                    <h4>Muebles</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/electrodomesticos.php">
                    <img src="img/electrodomesticos.png" alt="">
                    <h4>Electrodomesticos</h4>
                </a>
            </li>
        </ul>
    </div>

    <!--
    <div class="root">
        <div class="media"> -->
            <div class="box-cate">
                <div class="box-carosel-ofertas">
                    <div class="boxes">
                        <img src="img/anuncios/oferta1.png" alt="">
                    </div>
                    <div class="boxes">
                        <img src="img/anuncios/oferta2.png" alt="">
                    </div>
                    <div class="boxes">
                        <img src="img/anuncios/oferta3.png" alt="">
                    </div>
                </div>
                <ul class="puntos">
                    <li class="punto punto1"><i class="bi bi-arrow-left"></i></li>
                    <li class="punto punto2"><i class="bi bi-arrow-right"></i></li>
                </ul>
            </div>
            <h2 class="titulo-1">TE OFRECEMOS</h2>
            <div class="box-acciones">
                <div class="box">
                    <div class="box-img">
                        <img src="./img/ofrecimientos/seguro-de-entrega.png" alt="">
                    </div>
                    <h3>ENVIO SEGURO</h3>
                    <p>Un envío seguro es esencial para una experiencia de compra en línea satisfactoria.</p>
                </div>
                <div class="box">
                    <div class="box-img">
                        <img src="./img/ofrecimientos/informacion-personal.png" alt="">
                    </div>
                    <h3>PRIVACIDAD DE DATOS</h3>
                    <p>Se implementar medidas de seguridad adecuadas, como cifrado, para proteger la información almacenada.</p>
                </div>
                <div class="box">
                    <div class="box-img">
                        <img src="./img/ofrecimientos/pago-seguro.png" alt="">
                    </div>
                    <h3>PAGOS SEGUROS</h3>
                    <p>Cualquier cuenta o targeta de credito no seran compartidos con nadie mas.</p>
                </div>
            </div>
            <div class="box-des-1">
                <div class="quienesSomos">
                    <img class="logo-img-somos" src="img/logo-1_2.png" alt="">
                    <div class="info">
                        <h2>QUIENES SOMOS</h2>
                        <p>En nuestra tienda departamental en Cuautitlán Izcalli, no solo nos enfocamos en ofrecer productos de calidad, sino también en crear un entorno seguro y confiable para nuestros clientes. Nos esforzamos por innovar constantemente, proteger la información y garantizar una experiencia de compra excepcional. Nuestra misión es ser la tienda de confianza en la que los habitantes de Cuautitlán Izcalli y sus alrededores encuentren todo lo que necesitan, con la seguridad y el compromiso que merecen.</p>
                        <p>Creemos firmemente que la experiencia de compra en HORIZON MARKETING debe ser fluida y agradable. Por eso, nuestra tienda ofrece un ambiente acogedor y personal capacitado que está listo para ayudar a nuestros clientes en cada paso del proceso de compra. Ya sea en la tienda física o a través de nuestro sitio web, buscamos que cada interacción sea positiva y satisfactoria.</p>
                    </div>
                </div>
            </div>
            <br>
            <br><br>
        <!-- </div> 
    </div>-->
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

    <script src="./js/index-script.js"></script>
</body>

</html>