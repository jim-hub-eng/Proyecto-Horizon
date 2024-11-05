<?php

    $id_usuario = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
    <!-- <div class="box-img-producto">
                <img src="../img/juguetes/figuras_accion/fa1.png" alt="">
            </div> -->
    <div class="media-car">
    <?php
            include './php/conexion.php';

            $total = 0;
            $total_cant = 0;

            $sql = "SELECT P.id , P.descuento, P.nombre, P.precio, T.id_producto, T.cant_producto, T.codigo FROM productos P INNER JOIN carrito T ON P.id = T.id_producto WHERE T.id_usuario = '$id_usuario';";
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
                    <?php  ?>
                    <p>Total: $<?= $total ?></p>
                    <p>Cantidad de productos: <?= $total_cant ?></p>
                </div>
                <button onclick="btnPagar()">Pagar</button>
            </div>
        </div>
    </div>

    <div class="container">
        <form id="orderForm">
            <span id="btnCerrarPaga" onclick="btnCerrarPaga()">&times;</span>
            <div class="row">
                <div class="col">
                    <h3 class="title">Dirección de envio</h3>
                    <div class="inputBox">
                        <span>Nombre Completo:</span>
                        <input required type="text" id="nombreCompleto" placeholder="Ingrese nombre completo">
                    </div>
                    <div class="inputBox">
                        <span>Correo:</span>
                        <input required type="email" id="correo" placeholder="Ingrese correo">
                    </div>
                    <div class="inputBox">
                        <span>Dirección :</span>
                        <input required type="text" id="direccion" placeholder="Ingrese dirección">
                    </div>
                    <div class="inputBox">
                        <span>Ciudad :</span>
                        <select required id="ciudad">
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
                            <input required type="number" min="1" id="codigoPostal" class="input-quantity" placeholder="Ingrese codigo postal">
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
                        <input required type="text" id="nombreTarjeta" placeholder="Ingrese nombre en tarjeta">
                    </div>
                    <div class="inputBox">
                        <span>numeros de la tarjeta:</span>
                        <input required type="number" id="numeroTarjeta" class="input-quantity" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>Fecha de vencimiento</span>
                        <input required type="text" id="fechaVencimiento" placeholder="MM/AA">
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


    <script src="js/carrito-script.js"></script>
</body>
</html>