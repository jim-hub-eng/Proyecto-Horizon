<?php

    include './conexion.php';

    // SE ALMACENAN LOS VALORES DE LOS INPUTS EN VARIABLES PARA USARLAS DESPUES
    $id_usuario = $_POST['txtid'];
    $nombreCompleto = $_POST['nombreCompleto'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $codigoPostal = $_POST['codigoPostal'];
    $nombreTarjeta = $_POST['nombreTarjeta'];
    $numeroTarjeta = $_POST['numeroTarjeta'];
    $fechaVencimiento = $_POST['fechaVencimiento'];

    //CONSULTA
    $sql = "INSERT INTO compras(nombre_completo, correo, direccion, ciudad, cod_postal, nombre_targeta, num_targeta, fecha_vencimiento)
            VALUES('$nombreCompleto', '$correo', '$direccion', '$ciudad', '$codigoPostal','$nombreTarjeta', '$numeroTarjeta', '$fechaVencimiento')";
    
    //A TODOS LOS PRODUCTOS DEL USUARIO SE LES CAMBIA EL "NO" A "SI" ESTO DE QUE SI PAGO
    $sql_2 = "UPDATE carrito SET pagado = 'si' WHERE id_usuario = '$id_usuario'";
    $ejecutar_2 = $conexion -> query($sql_2); //SE EJECUTA LA CONSULTA
    
    $ejecutar = $conexion -> query($sql);

    if($ejecutar && $ejecutar_2){ //SI SE EJECUTO CORRECTAMENTE
        header("location: ../carrito.php"); // LO DEVUELVE AL CARRITO
    }else{
        //MANDA UNA ALERTA DE QUE NO SE PAGO
        echo '
            <script>
                alert("No se pago correctamente");
            </script>
        ';
        header("location: ../carrito.php"); // LO DEVUELVE AL CARRITO
    }

?>