<?php

    include './php/conexion.php';

    session_start();
    $cuenta = 0;

    if(isset($_SESSION['correo'])){
        $correo = $_SESSION['correo'];
        $cuenta = 1;
        $sql = "SELECT id FROM usuarios WHERE correo = '$correo'";
        $ejecutar = $conexion -> query($sql);
        $datos = $ejecutar -> fetch_object();
        $id_usuario = $datos -> id;
    }else{
        $cuenta = 0;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito | Horizon Marcketing</title>
    <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .media-alert{
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            height: 300px;
            top: 70px;
            color: white;
        }
        .media-alert img{
            position: relative;
            width: 200px;
        }
        .media-alert a{
            padding: 7px 40px;
            background-color: transparent;
            border: 1px solid white;
            border-radius: 14px;
            color: white;
            text-decoration: none;
        }
        .media-alert a:hover{
            background-color: white;
            color: black;
        }
    </style>
</head>
<body>
    
    <nav class="navegacion">
        <div class="link-regresar">
            <a href="./index.php">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
        <div class="title">
            <h2>Carrito</h2>
        </div>
    </nav>
    
    <?php
        if($cuenta == 1){ ?>
            <div class="media-car">
    <?php
            include './php/conexion.php';

            $total = 0;
            $total_cant = 0;

            $sql = "SELECT P.id , P.descuento, P.nombre, P.precio, T.id_producto, T.cant_producto, T.codigo FROM productos P INNER JOIN carrito T ON P.id = T.id_producto WHERE T.id_usuario = '$id_usuario' AND T.pagado = 'no';";
            $ejecutar = $conexion -> query($sql);
            while($datos = $ejecutar -> fetch_object()){ 
                    
                    $total_cant += $datos -> cant_producto;  
                    if($datos -> descuento == 'n / a'){
                        $total += ($datos -> precio * $datos -> cant_producto);
                    }else{
                        $total += ($datos -> precio - ($datos -> precio * $datos -> descuento / 100)) * $datos -> cant_producto; 
                    }

                    ?>
                <div class="producto">
                    <div class="box-img-producto">
                        <?php echo '<img src="./productos/mos.php?id=' . htmlspecialchars($datos -> id_producto , ENT_QUOTES) . '">'; ?>
                    </div>
                    <div class="title">
                        <label><?= $datos -> nombre  ?></label>
                        <div class="precio">
                            <?php
                                if($datos -> descuento == 'n / a'){ ?>
                                    <p>Precio $<?= $datos -> precio ?></p> 
                                <?php
                                } else { ?>
                                    <p>Precio $<?= $datos -> precio - ($datos -> precio * $datos -> descuento / 100) ?></p> 
                                    <span class="precio-sin-descuento">$<?= $datos -> precio  ?></span> 
                                    <span class="span-des"><?= $datos -> descuento ?>% de descuento</span>
                                <?php }
                            ?>
                            <span>Cantidad: <?= $datos -> cant_producto ?></span>
                        </div>
                    </div>
                    <div class="box-acciones">
                        <a href="./php/borrar_producto_carrito.php?cod_producto=<?= $datos -> codigo ?>&id_usuario=<?= $id_usuario ?>" class="btn-elim" href=""><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            <?php }
        ?>
        <div class="media-pagar">
            <div class="box-pagar">
                <div class="datos-pagar">
                    <p>Total: $<?= $total ?></p>
                    <p>Cantidad de productos: <?= $total_cant ?></p>
                </div>
                <button onclick="btnPagar()">Pagar</button>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="./php/pagar_carrito.php" method="POST" id="orderForm">
            <span id="btnCerrarPaga" onclick="btnCerrarPaga()">&times;</span>
            <div class="row">
                <div class="col">
                    <h3 class="title">Dirección de envio</h3>
                    <input type="hidden" name="txtid" value="<?= $id_usuario ?>">
                    <div class="inputBox">
                        <span>Nombre Completo:</span>
                        <input required type="text" name="nombreCompleto" id="nombreCompleto" placeholder="Ingrese nombre completo">
                    </div>
                    <div class="inputBox">
                        <span>Correo:</span>
                        <input required type="email" name="correo" id="correo" placeholder="Ingrese correo">
                    </div>
                    <div class="inputBox">
                        <span>Dirección :</span>
                        <input required type="text" name="direccion" id="direccion" placeholder="Ingrese dirección">
                    </div>
                    <div class="inputBox">
                        <span>Ciudad :</span>
                        <select required name="ciudad" id="ciudad">
                            <option disabled selected value="">Seleccione una ciudad</option>
                            <option value="Estado de Mexico">Estado de Mexico</option>
                            <option value="Ciudad de Mexico">Ciudad de Mexico</option>
                            <option value="Cuautitlan Izcalli">Cuautitlan Izcalli</option>    
                            <option value="Monterrey">Monterrey</option>    
                        </select>
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>Codigo postal:</span>
                            <input required type="number" name="codigoPostal" min="1" id="codigoPostal" class="input-quantity" placeholder="Ingrese codigo postal">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h3 class="title">pago</h3>
                    <div class="inputBox">
                        <span>tarjetas validas :</span>
                        <img src="./img/targetas/bbva.png" alt="">
                        <img src="./img/targetas/bankName.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>nombre en tarjeta :</span>
                        <input required type="text" id="nombreTarjeta" name="nombreTarjeta" placeholder="Ingrese nombre en tarjeta">
                    </div>
                    <div class="inputBox">
                        <span>numeros de la tarjeta:</span>
                        <input required type="number" id="numeroTarjeta" name="numeroTarjeta" class="input-quantity" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>Fecha de vencimiento</span>
                        <input required type="text" id="fechaVencimiento" name="fechaVencimiento" placeholder="MM/AA">
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>Codigo de seguridad:</span>
                            <input required type="number" id="cvv" class="input-quantity" placeholder="CVV">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Aceptar" class="submit-btn">
        </form>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <i class="fas fa-check-circle modal-icon"></i>
            <p id="modalText"></p>
            <button onclick="window.history.back()">Aceptar</button>
        </div>
    </div>
        <?php } else{ ?>
            <div class="media-alert">
                <img src="./img/carritoSinCompras.png">
                <p>Inicie sesion para poder añadir al carrito</p>
                <a href="./login.php">Iniciar Sesion</a>
            </div>
        <?php }
    ?>

    


    <script src="js/carrito-script.js"></script>
</body>
</html>