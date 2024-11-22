<?php
    include '../php/conexion.php';
    
    session_start();
    $cuenta = 0;

    if(isset($_SESSION['correo'])){
        $correo = $_SESSION['correo'];
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $ejecutar = $conexion -> query($sql);
        
        $datos = $ejecutar -> fetch_object();
        $id = $datos -> id;
        $foto = $datos -> foto;
        $nombre = $datos -> nombre;
        $usuario = $datos -> usuario;
        $apellido_p = $datos -> apellido_p;
        $apellido_m = $datos -> apellido_m;
        $contrasena = $datos -> contrasena;
        $direccion = $datos -> direccion;
        $region = $datos -> region;

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
    <title>Mi Cuenta | Horizon Marcketing</title>
    <link rel="shortcut icon" href="img/logo-1_2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/cuenta-styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        #newpsw,
        #newrpsw{
            border-color: #202020;
            pointer-events: none;
        }
        #lb-newpsw,
        #lb-newrpsw{
            pointer-events: none;
        }
        #newpsw.activo,
        #newrpsw.activo{
            border-color: white;
            pointer-events: all;
        }
        footer{
            position: relative;
            top: 350px;
        }
    </style>
</head>
<body>
    
    <nav class="nav">
        <div class="box-1">
            <a id="cerrarSesion" href="../index.php"><i class="bi bi-arrow-left"></i></a>
            <div class="box-img-user">
                <?php
                   if($foto == NULL){
                    echo '<img src="../img/usuarioSinFoto.png" alt="">';
                }else{
                    echo '<img src="../php/mostrar_foto_usu.php?id=' . htmlspecialchars($id , ENT_QUOTES) . '" alt="">';
                }
                ?>
            </div>
            <div class="box-datos-user">
                <label><?= $usuario ?></label>
                <p><?php echo ucwords($nombre) . " " . ucwords($apellido_p) . " " . ucwords($apellido_m) ?></p>
            </div>
        </div>
        <box class="box-2">
            <button class="openSeleccion" id="openSeleccion"><i class="bi bi-pencil-square"></i></button>
            <a id="btnCerrarSesion" href="../php/cerrarSesion.php"><i class="bi bi-box-arrow-in-left"></i></a>
            <button id="btnMenu" onclick="abrirMenu()"><i class="bi bi-list"></i></button>
        </box>
    </nav>
   <!--MENU-->
   <div class="menu">
    <h2>Mi Cuenta</h2>
    <button id="cerrarMenu" onclick="cerrarMenu()">&times;</button>
    <div class="box-cuenta-img-datos">
        <div class="box-img">
            <?php
                if($foto == NULL){
                    echo '<img src="../img/usuarioSinFoto.png" alt="">';
                }else{
                    echo '<img src="../php/mostrar_foto_usu.php?id=' . htmlspecialchars($id , ENT_QUOTES) . '" alt="">';
                }
            ?>
        </div>
        <div class="dts-usuario">
            <label><?= $usuario ?></label>
            <p><?php echo ucwords($nombre) . " " . ucwords($apellido_p) . " " . ucwords($apellido_m) ?></p>
        </div>
    </div>
    <ul class="ul-1">
        <li><button class="openSeleccion"><i class="bi bi-pencil-square"></i>Modificar</button></li>
    </ul>
    <ul class="ul-2-from-menu">
        <li><a id="btnSC" href=""><i class="bi bi-box-arrow-in-left"></i>Salir</a></li>
    </ul>
</div>
   <!-- FIN MENU-->
    <div class="media">
        <div class="box-car">
            <button id="btnComentarios" onclick="
                const carosel = document.querySelector('.box');
                carosel.classList.add('comentarios');
                carosel.classList.remove('compras');
            "><i class="bi bi-chat-left-dots"></i>Comentarios</button>
            <button id="btnCompras" onclick="
                const carosel = document.querySelector('.box');
                carosel.classList.add('compras');
                carosel.classList.remove('comentarios');
            " ><i class="bi bi-bag"></i>Compras</button>
        </div>
        <div class="box-carosel">
            <div class="carosel">
                <div class="box comentarios">
                    <div class="boxes">
                        <div class="box-titulo">
                            <h2>Comentario</h2>
                            <p>Se muestran todos los comentarios que hayas publicado.</p>
                        </div>
                        
                        <div class="box-comentarios">

                        <?php
                            $sql = "SELECT * FROM comentarios WHERE usuario = '$usuario';";
                            $ejecutar = $conexion -> query($sql);

                            while($datos = $ejecutar -> fetch_object()){ ?>
                                <div class="comentario">
                                    <div class="box-datos-img-c">
                                        <div class="box-img-user">
                                            <?php
                                                if($foto == NULL){
                                                    echo '<img src="../img/usuarioSinFoto.png" alt="">';
                                                }else{
                                                    echo '<img src="../php/mostrar_foto_usu.php?id='. htmlspecialchars($id, ENT_QUOTES) .'" alt="">';
                                                }
                                            ?>
                                        </div>
                                        <label><?= $datos -> usuario ?></label>
                                    </div>
                                    <p><?= $datos -> comentario ?></p>
                                    <div class="box-estrellas">
                                        <?php
                                            switch($datos -> estrellas){
                                                case 1:
                                                    echo '<label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star"></i></label>
                                                            <label><i class="bi bi-star"></i></label>
                                                            <label><i class="bi bi-star"></i></label>
                                                            <label><i class="bi bi-star"></i></label>';
                                                break;
                                                case 2:
                                                    echo '<label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star"></i></label>
                                                            <label><i class="bi bi-star"></i></label>
                                                            <label><i class="bi bi-star"></i></label>';
                                                    break;
                                                case 3:
                                                    echo '<label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star"></i></label>
                                                            <label><i class="bi bi-star"></i></label>';
                                                    break;
                                                case 4:
                                                    echo '<label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star-fill"></i></label>
                                                            <label><i class="bi bi-star"></i></label>';
                                                    break;
                                                    case 5:
                                                        echo '<label><i class="bi bi-star-fill"></i></label>
                                                                <label><i class="bi bi-star-fill"></i></label>
                                                                <label><i class="bi bi-star-fill"></i></label>
                                                                <label><i class="bi bi-star-fill"></i></label>
                                                                <label><i class="bi bi-star-fill"></i></label>';
                                                        break;
                                            }
                                        ?>
                                    </div>
                                </div>
                            <?php }
                        ?>
                        </div>
                    </div>
                    <div class="boxes">
                        <div class="box-titulo">
                            <h2>Compras</h2>
                            <p>Se mostraran todas las compras hechas.</p>
                        </div>
                        <div class="box-compras">
                                <div class="comprass">
                                    <?php
                                        $sql = "SELECT P.id , P.descuento, P.nombre, P.precio, T.id_producto, T.cant_producto, T.codigo, T.fecha FROM productos P INNER JOIN carrito T ON P.id = T.id_producto WHERE T.id_usuario = '$id' AND T.pagado = 'si';";
                                        $ejecutar = $conexion -> query($sql);
                                        while($datos = $ejecutar -> fetch_object()){ ?>
                                            <div class="compra">
                                                <div class="box-img-producto">
                                                    <?php 
                                                        echo '<img src="../productos/mos.php?id=' . htmlspecialchars($datos -> id_producto , ENT_QUOTES) . '">';
                                                    ?>
                                                </div>
                                                <div class="datos">
                                                    <marquee><h3><?= $datos -> nombre ?></h3></marquee>
                                                    <label>Cantidad: <?= $datos -> cant_producto ?></label>
                                                    <?php
                                                        if($datos -> descuento == 'n / a'){ ?>
                                                            <label>Precio: $<?= $datos -> precio ?></label>
                                                            <span>Total: $<?= $datos -> precio * $datos -> cant_producto ?></span>
                                                        <?php } else { ?>
                                                            <label>Precio: $<?= $datos -> precio - ($datos -> precio * $datos -> descuento / 100) ?></label>
                                                            <span><s>$<?= $datos -> precio ?></s></span>
                                                            <span><?= $datos -> descuento ?>% de descuento</span>
                                                            <span>Total: $<?= $datos -> precio - ($datos -> precio * $datos -> descuento / 100) * $datos -> cant_producto ?></span>
                                                        <?php }
                                                    ?>
                                                    <span>Fecha: <?= $datos -> fecha ?></span>
                                                </div>
                                            </div>
                                        <?php }

                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fondo">
        <div class="selecionar">
            <button id="closeSeleccion" onclick="cerrarSeleccion()">&times;</button>
            <h2>Que quieres modificar?</h2>
            <button class="eleccion">Foto de perfil</button>
            <button class="eleccion">Nombre</button>
            <button class="eleccion">Nombre de usuario</button>
            <button class="eleccion">Contraseña</button>
            <button class="eleccion">Ubicacion</button>
        </div>
    </div>
    <div class="box-foto-perfil">
        <form method="POST" action="../php_cuenta/mod_foto_cuenta.php" enctype="multipart/form-data" class="foto-perfil">
            <span id="ls-btn-1" class="ls-btn">&times;</span>
            <h2>Seleccione su foto de perfil.</h2>
            <div class="box-img-perfil">
                <img id="img" src="../img/sinImagen.png" alt="">
            </div>
            <div class="box-file">
                <input type="hidden" name="txtid" value="<?= $id ?>">
                <input type="file" name="foto" id="inputFile" required>
                <label class="lb-name" for="inputFile">Seleccione imagen</label>
            </div>
            <button id="btnGuardarImg">Guardar</button>
        </form>
    </div>
    <div class="box-nombre">
        <form method="POST" action="../php_cuenta/mod_nombre_cuenta.php">
            <span id="ls-btn-2" class="ls-btn">&times;</span>
            <h2>Ingrese los nuevos datos</h2>
            <div class="box-input">
                <input type="text" name="nombre" value="<?= $nombre ?>"  required>
                <label>Nombre</label>
            </div>
            <div class="box-input">
                <input type="text" name="apellido_p"  value="<?= $apellido_p ?>"  required>
                <label>Apellido Paterno</label>
            </div>
            <div class="box-input">
                <input type="text" name="apellido_m"  value="<?= $apellido_m ?>" required>
                <label>Apellido Materno</label>
            </div>
            <input type="hidden" name="txtid" value="<?= $id ?>">
            <button id="btnGuardar">Guardar</button>
        </form>
    </div>
    <div class="box-usuario">
        <form method="POST" action="../php_cuenta/mod_usuario_cuenta.php">
            <span id="ls-btn-3" class="ls-btn">&times;</span>
            <h2>Ingrese el nuevo dato</h2>
            <div class="box-input">
                <input type="text" maxlength="10" name="usuario" value="<?= $usuario ?>" id="nombreUsuario" required>
                <label for="nombreUsuario">Nombre de usuario</label>
                <p id="caja-conteo-nombre">0 / 10</p> 
            </div>
            <input type="hidden" name="txtid" value="<?= $id ?>">
            <button id="btnGuardar">Guardar</button>
        </form>
    </div>
    <div class="box-contrasena">
        <form method="POST" action="../php_cuenta/mod_psw_cuenta.php">
            <span id="ls-btn-4" class="ls-btn">&times;</span>
            <h2>Ingrese la nueva contraseña</h2>
            <div class="box-input">
                <input type="hidden" id="psw-actual" value="<?= $contrasena ?>">
                <input type="password" id="psw" required>
                <label for="psw">Ingrese su contraseña</label>
            </div>
            <div class="box-input">
                <input type="password" name="password" id="newpsw" required>
                <label id="lb-newpsw" for="newpsw">Nueva contraseña</label>
            </div>
            <div class="box-input">
                <input type="password" id="newrpsw" required>
                <label id="lb-newrpsw" for="newrpsw">Repetir contraseña</label>
                <p id="caja-verificacion-rpsw"></p>
            </div>
            <input type="hidden" name="txtid" value="<?= $id ?>">
            <button id="btnGuardar">Guardar</button>
        </form>
    </div>
    <div class="box-ubicacion">
        <form method="POST" action="../php_cuenta/mod_ubi_cuenta.php">
            <span id="ls-btn-5" class="ls-btn">&times;</span>
            <h2>Ingrese los nuevos datos</h2>
            <div class="box-input">
                <input type="text" name="direccion" value="<?= $direccion ?>" id="direccion" required>
                <label for="direccion">Direccion</label>
            </div>
            <div class="box-input">
                <input type="text" name="region" value="<?= $region ?>" id="region" required>
                <label for="region">Region</label>
            </div>
            <input type="hidden" name="txtid" value="<?= $id ?>">
            <button id="btnGuardar">Guardar</button>
        </form>
    </div>
    <footer>
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
    <script src="../js/cuenta-script.js"></script>
    <script>
        const psw = document.getElementById('psw');
const psw_actual = document.getElementById('psw-actual');

psw.addEventListener('input', validacion);

function validacion(){
    
    let password_actual = psw_actual.value;
    let password = psw.value;

    if(password == ''){
        newpsw.classList.remove("activo");
        newrpsw.classList.remove("activo");
    }else if(password === password_actual){
        newpsw.classList.add("activo");
        newrpsw.classList.add("activo");
    }else{
        newpsw.classList.remove("activo");
        newrpsw.classList.remove("activo");
    }

}
    </script>
</body>
</html>
