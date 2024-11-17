<?php 

    session_start(); 
    include './php/conexion.php';
    $id_producto = $_GET['id']; 
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HORIZON MARCKETING</title>
    <style>
        #estrella{
            color: yellow;
            filter: drop-shadow(0 0 10px yellow);
        }
        .box-producto-img{
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
        }
        #btnAnadirCarrito{
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 35px;
            border: 1px solid;
            border-radius: 5px;
            cursor: pointer;
            background-color: royalblue;
            color: white;
        }
        #btnLabel{
            position: relative;
            width: 90%;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            border-radius: 5px;
            text-decoration: none;
            color: black;
            background-color: transparent;
            z-index: 50;
            overflow: hidden;
            transition: .3s;
            cursor: pointer;
        }
        #btnLabel:hover{
            background-color: black;
            color: white;
        }
    </style>
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
                <a href="./carrito.php"><i class="bi bi-cart-fill"></i></a>
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
            <li><a href="./carrito.php"><i class="bi bi-cart-fill"></i>Carrito</a></li>
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
                    #se genera la consulta para porder obtener la foto de la imagen 
                    $sql = "SELECT id FROM productos WHERE id = '$id_producto'"; #selecciona el id del producto
                    #se ejecuta la conexion
                    $ejecutar = $conexion -> query($sql);

                    while($datos = $ejecutar -> fetch_object()){
                        #muestra la imagen
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
                    #genera la consulta para obtener la informacion de todas las entidades del producto
                    $sql = "SELECT * FROM productos WHERE id = '$id_producto'"; #selecciona todos los campos de la tabla productos cuando el id sea el "el id que se obtuvo con GET"
                    $ejecutar = $conexion -> query($sql);#se ejecuta la consulta

                    while($datos = $ejecutar -> fetch_object()){
                            $sub_categoria = $datos -> sub_categoria; #se obtiene la subcatgoria del producto para despues usarla
                        ?>
                        <h3><?php echo ucwords($datos -> nombre) ?></h3> <!-- Se pone en mayusculas la primera letra del nombre del producto -->
                        <p><?= $datos -> descripcion ?></p> <!-- Se obtine la descripcion del producto -->
                        <p><b>Color: </b><?php echo ucwords($datos -> color) ?></p> <!-- Se obtine el color del producto -->
                        <p><b>Marca: </b><?php echo ucwords($datos -> marca) ?></p> <!-- Se obtine la marca -->
                        <div class="box-puntuacion">
                            <p id="num-pun">4</p> <!-- Puntuacion de las estrellas -->
                            <div class="estrellas">
                                <p><i class="bi bi-star-fill"></i></p> <!-- Estrellas -->
                                <p><i class="bi bi-star-fill"></i></p>
                                <p><i class="bi bi-star-fill"></i></p>
                                <p><i class="bi bi-star-fill"></i></p>
                                <p><i class="bi bi-star"></i></p>
                            </div>
                        </div>
                        <?php

                            if($datos -> intereses != "n / a"){ ?> <!-- Si lo que contiene intereses es diferente a "n / a" -->
                                <div class="box-meses">
                                    <p><?= $datos -> intereses ?></p> <!-- Se muestran los intereses --> 
                                </div>
                            <?php } #Si no tuviera intereses no se mostrarian
                            
                        ?>
                        <div class="box-precio-2">
                            <?php
                                if($datos -> descuento != "n / a"){ ?> <!-- Si lo que contiene intereses es diferente a "n / a" -->
                                    <label>Precio $<?= $datos -> precio - (($datos -> precio * $datos -> descuento) / 100) ?></label> <!-- Operacion para sar el precio con descuento -->
                                    <p class="p-precio-sin">$<?= $datos -> precio  ?></p> <!-- Se obtiene precio sin descuento -->
                                    <p class="p-descuento"><?= $datos -> descuento ?>% de descuento</p> <!-- Se obtiene el mumero de descuento -->
                                <?php } else { ?>
                                    <label>Precio $<?= $datos -> precio ?></label> <!-- Si no tuviera descuento solo se mustra el precio -->
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
                                
                        #se genera la consulta para obtener el producto con el id
                        $sql = "SELECT * FROM productos WHERE id = '$id_producto'";
                        #se ejecuta la consulta
                        $ejecutar = $conexion -> query($sql);

                        while ($datos = $ejecutar -> fetch_object()){ ?>
                            <!-- Se le inserta los valores del producto desde que hay en bd -->
                            <input type="hidden" name="txtidUsuario" value="<?= $id_usuario ?>" required>
                            <input type="hidden" name="txtidProducto" value="<?= $datos -> id ?>" required>
                        <?php }
                    ?>  
                    <!-- Cuando da click se mandan los datos al carrito -->
                    <?php
                        if($cuenta == 1){ ?>
                            <button id="btnAnadirCarrito" type="submit">Añadir al carrito</button>
                        <?php } else { ?>
                            <label id="btnAnadirCarrito">Añadir al carrito</label>
                        <?php }
                    ?>
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

                    #se genera la consulta para mostrar los producto de la misma subcategoria del producto inicial
                    $sql = "SELECT * FROM productos WHERE sub_categoria = '$sub_categoria'";
                    #se ejecuta la consulta
                    $ejecutar = $conexion -> query($sql);

                    while($datos = $ejecutar -> fetch_object()){
                        #Si el id del producto es igual al id del producto inicial, no se muestra
                        if($datos -> id != $id_producto ){ ?>
                            <form class="producto product">
                            <div class="box-producto-img">
                                <?php #se muestra la imagen del producto
                                    echo '
                                        <img src="./productos/mos.php?id='. htmlspecialchars($datos -> id , ENT_QUOTES) .'" alt="">
                                    ';
                                ?>
                            </div>
                            <!-- Se muestra el nombre del producto -->
                            <h3><marquee><?= $datos -> nombre ?></marquee></h3>
                            <div class="box-precio">
                            <!-- Se  muestra el precio del producto -->
                                <p>Precio: $<?= $datos -> precio ?></p>
                                <?php #si el descuento es diferente de n / a se muestra
                                    if($datos -> descuento != "n / a"){ ?>
                                        <p class="des"><?= $datos -> descuento ?>% de descuento</p>
                                    <?php }
                                ?>  
                            </div>
                            <div class="box-btn"> <!-- Se manda el id del producto al archivo producto_indiv.php por la url -->
                                <a href="./producto_indiv.php?id=<?= $datos -> id ?>">Ver mas <span></span></a>
                                <?php
                                    if($cuenta == 1){ ?>
                                        <button>Añadir al carrito</button>
                                    <?php } else { ?>
                                        <label id="btnLabel">Añadir al carrito</label>
                                    <?php }
                                ?>
                            </div>
                        </form>
                        <?php }
                        
                    }

                ?>
            </div>
        </div>
        <div class="box-4">
            <div class="box-coment-calif">
                <form method="POST" action="./php/registrar_comentario.php" class="box-img-user">
                    <h2>Escribe tu comentario</h2>
                    <div class="box-flex">
                        <?php

                            if($cuenta == 1){
                                #se muestra los datos del registro del usuario que esta en sesion
                            $sql = "SELECT id , foto , usuario FROM usuarios WHERE id = '$id_usuario'";
                            #se ejecuta la consulta
                            $ejecutar = $conexion -> query($sql);

                            while($datos = $ejecutar -> fetch_object()){
                                
                                #si la entidad esta vacia se muestra una imagen preterminada
                                if($datos -> foto == NULL){ ?>
                                    <div class="box-user">
                                        <img src="./img/usuarioSinFoto.png" alt="">
                                    </div>
                                <?php } else { #si no esta vacia muestra la foto del usuario
                                    echo '
                                        <div class="box-user">
                                            <img src="./php/mostrar_foto_usu.php?id=' . htmlspecialchars($datos -> id, ENT_QUOTES) . ' " alt="">
                                        </div>
                                    ';
                                }

                            ?>                            
                            <div class="box-inp">
                                <label>Usuario:</label>
                                <!-- Muestra el usuario del usuario -->
                                <input type="text" name="txtUsuario" value="<?= $datos -> usuario ?>">
                            </div>

                            <?php }
                            }else { ?>
                                
                                <div class="box-user">
                                    <img src="./img/usuarioSinFoto.png" alt="">
                                </div>
                                

                                                       
                            <div class="box-inp">
                                <label>Usuario:</label>
                                <!-- Muestra el usuario del usuario -->
                                <input type="text" name="txtUsuario" value="">
                            </div>

                            <?php }
                            

                        ?>
                    </div>
                    <div class="box-textarea">
                        <textarea name="txtComentario" id="text-coment" maxlength="230" placeholder="Escriba comentario..."></textarea>
                        <p id="box-letras">0 / 230</p> <!-- Caja de comentario -->
                    </div>
                    <div style="top: -70px;" class="box-calif-stars">
                        <h3>Calificar</h3>
                        <div class="box-stars">
                            <input type="radio" value="1" name="radios" id="star-1" required> <!-- Input radio para poder mandar el numero elegido de estrellas -->
                            <input type="radio" value="2" name="radios" id="star-2" required>
                            <input type="radio" value="3" name="radios" id="star-3" required>
                            <input type="radio" value="4" name="radios" id="star-4" required>
                            <input type="radio" value="5" name="radios" id="star-5" required>

                            <label class="lb-star-1" for="star-1"><i class="bi bi-star-fill"></i></i></label> <!-- Estrellas -->
                            <label class="lb-star-2" for="star-2"><i class="bi bi-star-fill"></i></label>
                            <label class="lb-star-3" for="star-3"><i class="bi bi-star-fill"></i></label>
                            <label class="lb-star-4" for="star-4"><i class="bi bi-star-fill"></i></label>
                            <label class="lb-star-5" for="star-5"><i class="bi bi-star-fill"></i></label>
                        </div>
                    </div>
                    <input type="hidden" name="txtIdProducto" value="<?= $id_producto ?>">
                    <!-- se manda el id del producto  -->
                    <?php
                        if($cuenta == 1){ ?>
                            <button style="top: -50px;" id="btnEnviarComen">Enviar 
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                         </button>
                        <?php }else { ?>
                            <label style="top: -50px; display: flex; align-items: center; justify-content: center;" id="btnEnviarComen">
                                Enviar
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </label>
                        <?php }
                    ?>
                </form>
                <div class="box-comentarios">
                    <?php
                        include './php/conexion.php';
                        #se genera la consulta para obtener la foto , el nombre de usuario, el comentario y las estrellas de los comentario
                        $sql = "SELECT T.id, T.foto, T.usuario, P.usuario, P.comentario, P.estrellas FROM `comentarios` P INNER JOIN `usuarios` T WHERE T.usuario = P.usuario AND P.id_producto = '$id_producto'";
                        $ejecutar = $conexion -> query($sql);

                        while($datos = $ejecutar -> fetch_object()){ ?>

                        <div class="comentario">
                            <div class="nombre-user">
                                <div class="img-user">
                                    <?php

                                        if($datos -> foto == NULL){ ?> <!-- Se verifica si no tiene nada la entidad de foto -->
                                            <img src="./img/usuarioSinFoto.png" alt=""> <!-- Se muestra una imagen por preterminada -->
                                        <?php } else { 
                                            #si no esta vacio se muetra la foto del usuario
                                            echo '
                                                <img src="./php/mostrar_foto_usu.php?id= ' . htmlspecialchars($datos -> id , ENT_QUOTES) . ' " alt="">
                                            ';
                                        }

                                    ?>
                                </div>
                                <h3><?= $datos -> usuario ?></h3> <!-- Se muestra el nombre de usuario -->
                            </div>
                            <p><?= $datos -> comentario ?></p> <!-- Se muestra el comentario -->
                            <div style="margin-left: 10px;" class="box-stars">
                                <?php

                                    switch($datos -> estrellas){ #se usa el switch dependiendo del numero de estrellas
                                        case 1:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                            <?php
                                        break;
                                        case 2:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                            <?php
                                        break;
                                        case 3:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                            <?php
                                        break;
                                        case 4:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                            <?php
                                        break;
                                        case 5:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                            <?php
                                        break;
                                        }


                                ?>
                            </div>
                        </div>

                        <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="box-3 box-productos-2">
            <h2>Otros productos</h2>
            <div class="productos">
                <?php
                #se genera una consulta donde se eliga una subcategoria al azar
                $sql_1 = "SELECT sub_categoria FROM categorias ORDER BY RAND() LIMIT 1;";
                #se ejecuta la consulta
                $ejecutar_1 = $conexion -> query($sql_1);

                $datos_1 = $ejecutar_1 -> fetch_object();
                $subCategoriaSql = $datos_1 -> sub_categoria; #la subcategoria elegida se guarda en una variable

                #se seleciona todos las entidades de productos cuando la categoria sea la que se eligio al azar
                $sql = "SELECT * FROM productos WHERE sub_categoria = '$subCategoriaSql'";
                #se ejecuta la consulta
                $ejecutar = $conexion -> query($sql);
                                    
                while($datos = $ejecutar -> fetch_object()){
                    if($datos -> id != $id_producto ){ ?> <!-- Si el id del producto es diferente al del producto inicial -->
                        <div class="producto product">
                        <div class="box-producto-img">
                            <?php
                                #se muestra la imagen del producto
                                echo '
                                    <img src="./productos/mos.php?id='. htmlspecialchars($datos -> id , ENT_QUOTES) .'" alt="">
                                ';
                            ?>
                        </div>
                        <!-- Se muestra el nombre del producto -->
                        <h3><?= $datos -> nombre ?></h3>
                        <div class="box-precio">
                            <!-- Se muestra el precio -->
                            <p>Precio: $<?= $datos -> precio ?></p>
                            <?php
                                if($datos -> descuento != "n / a"){ ?> <!-- Si el descuento es diferente a n / a -->
                                    <p class="des"><?= $datos -> descuento ?>% de descuento</p> <!-- Se muestra el descuento -->
                                <?php }
                            ?>  
                        </div>
                        <div class="box-btn"> <!-- Se manda el id del producto por el link -->
                            <a href="./producto_indiv.php?id=<?= $datos -> id ?>">Ver mas <span></span></a>
                            <?php
                                    if($cuenta == 1){ ?>
                                        <button>Añadir al carrito</button>
                                    <?php } else { ?>
                                        <label id="btnLabel">Añadir al carrito</label>
                                    <?php }
                                ?>
                        </div>
                    </div>
                <?php }
                }
                ?>
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

        textarea.addEventListener('keyup', contarLetras); //Mientras se escribe en la caja de comentario va hacer lo siguiente

        function contarLetras(){ //La funcion de cuando esta escribiedo

            let cantLetras = textarea.value.length; //Se van contando las letras
            box.innerHTML = `${cantLetras} / 230`; //Se muestra el total del letra

        }

    </script>
</body>
</html>