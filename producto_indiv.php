<?php 

    session_start();

    $id_usuario = $_SESSION['id'];
    $id_producto = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| Horizon Marcketing</title>
    <link rel="stylesheet" href="css/producto_indiv-styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                <a href="./carrito.php?id=<?= $id_usuario ?>"><i class="bi bi-cart-fill"></i></a>
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
            <li><button style="margin-left: -5px;" onclick="abrirCategoriasDeMenu()"><i class="bi bi-list-ul"></i>Categorias</button></li>
            <li><a href="./carrito.php?id=<?= $id_usuario ?>"><i class="bi bi-cart-fill"></i>Carrito</a></li>
            <li><button style="margin-left: -5px;" onclick="apaBusquedaFlotante()"><i class="bi bi-search"></i>Buscar</button></li>
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

    <div class="media">
        <div class="media-2">
            <div class="box">
                <?php
                    
                    include './php/conexion.php';

                    $sql = "SELECT id FROM productos WHERE id = '$id_producto'";
                    $ejecutar = $conexion -> query($sql);

                    while($datos = $ejecutar -> fetch_object()){
                        echo '
                        <div class="box-img">
                            <img src="./productos/mos.php?id= ' . htmlspecialchars($datos -> id, ENT_QUOTES) . ' " alt="">
                        </div>
                    ';
                    }

                ?>
            </div>
            <div class="box">
                <div class="box-info">
                <?php
                    
                    include './php/conexion.php';

                    $sql = "SELECT * FROM productos WHERE id = '$id_producto'";
                    $ejecutar = $conexion -> query($sql);

                    while($datos = $ejecutar -> fetch_object()){
                            $sub_categoria = $datos -> sub_categoria;
                        ?>
                        <h3><?php echo ucwords($datos -> nombre) ?></h3>
                        <p><?= $datos -> descripcion ?></p>
                        <p><b>Color: </b><?php echo ucwords($datos -> color) ?></p>
                        <p><b>Marca: </b><?php echo ucwords($datos -> marca) ?></p>
                        <div class="box-puntuacion">
                            <p id="num-pun">4</p>
                            <div class="estrellas">
                                <p><i class="bi bi-star-fill"></i></p>
                                <p><i class="bi bi-star-fill"></i></p>
                                <p><i class="bi bi-star-fill"></i></p>
                                <p><i class="bi bi-star-fill"></i></p>
                                <p><i class="bi bi-star"></i></p>
                            </div>
                        </div>
                        <div class="box-meses">
                            <p><?= $datos -> intereses ?></p>
                        </div>
                        <div class="box-precio-2">
                            <label>Precio $<?= $datos -> precio ?></label>
                            <?php
                                if($datos -> descuento != "n / a"){ ?>
                                    <p class="p-precio-sin">$<?= $datos -> precio - (($datos -> precio * $datos -> descuento) / 100)  ?></p>
                                    <p class="p-descuento"><?= $datos -> descuento ?>% de descuento</p>
                                <?php }
                            ?>  
                        </div>
                    </div>
                    <?php }

                ?>
            </div>
        </div>

        <div class="box-2">
            <div class="box-info-2">
                <span></span>
                <form style="margin-top: 50px;" class="bx" action="./php/anadirCarroProductoIndiv.php" method="POST">
                    <?php

                        include './php/conexion.php';

                        $sql = "SELECT * FROM productos WHERE id = '$id_producto'";
                        $ejecutar = $conexion -> query($sql);

                        while ($datos = $ejecutar -> fetch_object()){ ?>
                            <input type="hidden" name="txtidUsuario" value="<?= $id_usuario ?>" required>
                            <input type="hidden" name="txtidProducto" value="<?= $datos -> id ?>" required>
                        <?php }
                    ?>  
                    <button id="btnAnadirCarrito" type="submit">Añadir al carrito</button>
                </form>
                <div class="bx">
                    <button id="btnComprar">Comprar</button>
                </div>
                <div class="box-datos">
                    <p>Enviado desde <b>Horizon Marcketing</b></p>
                </div>
            </div>
            <div class="box-ofrecimientos">
                <div class="card">
                    <div class="box-ofrecimiento-img">
                        <img src="img/ofrecimientos/entrega.png" alt="">
                    </div>
                    <h3>Enviado por Horizon Marcketing</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel dolorum culpa aliquid illo modi aperiam dolor! Quod id ratione accusamus officia beatae adipisci</p>
                </div>
                <div class="card">
                    <div class="box-ofrecimiento-img">
                        <img src="img/ofrecimientos/seguridadDeEntrega.png" alt="">
                    </div>
                    <h3>Seguridad en el envio</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel dolorum culpa aliquid illo modi aperiam dolor! Quod id ratione accusamus officia beatae adipisci</p>
                </div>
                
            </div>
        </div>
        <div class="box-3">
            <h2>Productos Relacionados</h2>
            <div class="productos">
                <?php

                    $sql = "SELECT * FROM productos WHERE sub_categoria = '$sub_categoria'";
                    $ejecutar = $conexion -> query($sql);

                    while($datos = $ejecutar -> fetch_object()){
                        if($datos -> id != $id_producto ){ ?>
                            <div class="producto">
                            <div class="box-producto-img">
                                <img src="img/audifonos.png" alt="">
                            </div>
                            <h3><?= $datos -> nombre ?></h3>
                            <div class="box-precio">
                                <p>Precio: $<?= $datos -> precio ?></p>
                                <?php
                                    if($datos -> descuento != "n / a"){ ?>
                                        <p class="des"><?= $datos -> descuento ?>% de descuento</p>
                                    <?php }
                                ?>  
                            </div>
                            <div class="box-btn">
                                <a href="./producto_indiv.php?id=<?= $datos -> id ?>">Ver mas <span></span></a>
                                <button>Añadir al carrito</button>
                            </div>
                        </div>
                        <?php }
                        
                    }

                ?>
            </div>
        </div>
        <div class="box-4">
            <div class="box-coment-calif">
                <form class="box-img-user">
                    <h2>Escribe tu comentario</h2>
                    <div class="box-flex">
                        <div class="box-user">
                            <img src="./img/usuarioSinFoto.png" alt="">
                        </div>
                        <div class="box-inp">
                            <label>Usuario:</label>
                            <input type="text" value="">
                        </div>
                    </div>
                    <div class="box-textarea">
                        <textarea name="" id="text-coment" maxlength="230" placeholder="Escriba comentario..."></textarea>
                        <p id="box-letras">0 / 230</p>
                    </div>
                    <div class="box-calif-stars">
                        <h3>Calificar</h3>
                        <div class="box-stars">
                            <input type="radio" name="radios" id="star-1">
                            <input type="radio" name="radios" id="star-2">
                            <input type="radio" name="radios" id="star-3">
                            <input type="radio" name="radios" id="star-4">
                            <input type="radio" name="radios" id="star-5">

                            <label class="lb-star-1" for="star-1"><i class="bi bi-star-fill"></i></i></label>
                            <label class="lb-star-2" for="star-2"><i class="bi bi-star-fill"></i></label>
                            <label class="lb-star-3" for="star-3"><i class="bi bi-star-fill"></i></label>
                            <label class="lb-star-4" for="star-4"><i class="bi bi-star-fill"></i></label>
                            <label class="lb-star-5" for="star-5"><i class="bi bi-star-fill"></i></label>
                        </div>
                    </div>
                    <button id="btnEnviarComen">Enviar 
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </form>
                <div class="box-comentarios">
                    <div class="comentario">
                        <div class="nombre-user">
                            <div class="img-user">
                                <img src="img/sinImagen.png" alt="">
                            </div>
                            <h3>Jim Goonzalez Corona</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae rerum impedit numquam sed consequuntur aut dolorem enim neque ut in, voluptates autem doloremque, ipsam illo temporibus earum eos nihil? Error?</p>
                        <div style="margin-left: 10px;" class="box-stars">
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        </div>
                    </div>
                    <div class="comentario">
                        <div class="nombre-user">
                            <div class="img-user">
                                <img src="img/sinImagen.png" alt="">
                            </div>
                            <h3>Jim Goonzalez Corona</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae rerum impedit numquam sed consequuntur aut dolorem enim neque ut in, voluptates autem doloremque, ipsam illo temporibus earum eos nihil? Error?</p>
                        <div style="margin-left: 10px;" class="box-stars">
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        </div>
                    </div>
                    <div class="comentario">
                        <div class="nombre-user">
                            <div class="img-user">
                                <img src="img/sinImagen.png" alt="">
                            </div>
                            <h3>Jim Goonzalez Corona</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae rerum impedit numquam sed consequuntur aut dolorem enim neque ut in, voluptates autem doloremque, ipsam illo temporibus earum eos nihil? Error?</p>
                        <div style="margin-left: 10px;" class="box-stars">
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-3 box-productos-2">
            <h2>Otros productos</h2>
            <div class="productos">
                <div class="producto">
                    <div class="box-producto-img">
                        <img src="img/audifonos.png" alt="">
                    </div>
                    <h3>Titulo</h3>
                    <div class="box-precio">
                        <p>Precio: $3000</p>
                        <p class="des">10% de descuento</p>
                    </div>
                    <div class="box-btn">
                        <a href="">Ver mas <span></span></a>
                        <button>Añadir al carrito</button>
                    </div>
                </div>
                <div class="producto">
                    <div class="box-producto-img">
                        <img src="img/audifonos.png" alt="">
                    </div>
                    <h3>Titulo</h3>
                    <div class="box-precio">
                        <p>Precio: $3000</p>
                        <p class="des">10% de descuento</p>
                    </div>
                    <div class="box-btn">
                        <a href="">Ver mas <span></span></a>
                        <button>Añadir al carrito</button>
                    </div>
                </div>
                <div class="producto">
                    <div class="box-producto-img">
                        <img src="img/audifonos.png" alt="">
                    </div>
                    <h3>Titulo</h3>
                    <div class="box-precio">
                        <p>Precio: $3000</p>
                        <p class="des">10% de descuento</p>
                    </div>
                    <div class="box-btn">
                        <a href="">Ver mas <span></span></a>
                        <button>Añadir al carrito</button>
                    </div>
                </div>
                <div class="producto">
                    <div class="box-producto-img">
                        <img src="img/audifonos.png" alt="">
                    </div>
                    <h3>Titulo</h3>
                    <div class="box-precio">
                        <p>Precio: $3000</p>
                        <p class="des">10% de descuento</p>
                    </div>
                    <div class="box-btn">
                        <a href="">Ver mas <span></span></a>
                        <button>Añadir al carrito</button>
                    </div>
                </div>
            </div>
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

    <script src="./js/producto_indiv-script.js"></script>
    <script>

        const textarea =document.getElementById("text-coment");
        const box =document.getElementById('box-letras');

        textarea.addEventListener('keyup', contarLetras);

        function contarLetras(){

            let cantLetras = textarea.value.length;
            box.innerHTML = `${cantLetras} / 230`;

        }

    </script>
</body>
</html>