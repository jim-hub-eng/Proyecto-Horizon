<?php

    include './conexion.php';

    $id_usuario = $_POST['txtid'];
    $id_producto = $_POST['txtidproducto'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $codigoPostal = $_POST['codigoPostal'];
    $nombreTarjeta = $_POST['nombreTarjeta'];
    $numeroTarjeta = $_POST['numeroTarjeta'];
    $fechaVencimiento = $_POST['fechaVencimiento'];

    $sql = "INSERT INTO compras(nombre_completo, correo, direccion, ciudad, cod_postal, nombre_targeta, num_targeta, fecha_vencimiento)
            VALUES('$nombreCompleto', '$correo', '$direccion', '$ciudad', '$codigoPostal','$nombreTarjeta', '$numeroTarjeta', '$fechaVencimiento')";
    
    $sql_2 = "UPDATE carrito SET pagado = 'si' WHERE id_usuario = '$id_usuario'";
    $ejecutar_2 = $conexion -> query($sql_2);
    
    $ejecutar = $conexion -> query($sql);

    if($ejecutar && $ejecutar_2){
        header("location: ../producto_indiv.php?id=" . $id_producto);
    }else{
        echo '
            <script>
                alert("No se pago correctamente");
            </script>
        ';
        header("location: ../producto_indiv.php?id=" . $id_producto);
    }

?>