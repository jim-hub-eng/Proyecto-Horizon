<?php

    $id_usuario = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito | Horizon Marcketing</title>
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
    <div class="media-car">
        <?php
            include './php/conexion.php';
            $sql = "SELECT P.id , P.descuento, P.nombre, P.precio, T.id_producto, T.cant_producto FROM productos P INNER JOIN carrito T ON P.id = T.id_producto WHERE T.id_usuario = '$id_usuario';";
            $ejecutar = $conexion -> query($sql);
            while($datos = $ejecutar -> fetch_object()){ ?>
                <div class="producto">
                    <?php echo '<img src="./productos/mos.php?id=' . htmlspecialchars($datos -> id_producto , ENT_QUOTES) . '">'; ?>
                    <div class="title">
                        <label><?= $datos -> nombre  ?></label>
                        <div class="precio">
                            <p>Precio $<?= $datos -> precio ?></p> 
                            <?php
                                if($datos -> descuento != 'n / a'){ ?>
                                    <span class="precio-sin-descuento">$<?= $datos -> precio ?></span> 
                                    <span class="span-des"><?= $datos -> precio ?>% de descuento</span>
                                <?php
                                }
                            ?>
                            <span>Cantidad: <?= $datos -> cant_producto ?></span>
                        </div>
                    </div>
                    <div class="box-acciones">
                        <a class="btn-elim" href=""><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            <?php }
        ?>
        <div class="media-pagar">
            <div class="box-pagar">
                <div class="datos-pagar">
                    <p>Total: $000</p>
                    <p>Cantidad de productos: 000</p>
                </div>
                <button>Pagar</button>
            </div>
        </div>
        </div>
    </div>



</body>
</html>