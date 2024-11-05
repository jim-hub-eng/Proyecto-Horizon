<?php

    include '../php/conexion.php';

    $id_usuario = $_POST['txtidUsuario'];
    $id_producto = $_POST['txtidProducto'];
    $subCategoria = $_POST['txtSubCategoria'];
    $cant_producto = 1;

    $sql = "INSERT INTO carrito(id_usuario, id_producto, cant_producto)
            VALUES('$id_usuario', '$id_producto', '$cant_producto')";
    
    $verificacion_producto = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
    $ejecutar_verifcacion = $conexion -> query($verificacion_producto);

    if($ejecutar_verifcacion -> num_rows > 0){

        $sql_tomar_cant_product = "SELECT cant_producto FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
        $ejecutar_sql_tomar_cant_product = $conexion -> query($sql_tomar_cant_product);

        while($datos = $ejecutar_sql_tomar_cant_product -> fetch_assoc()){
            $cant_producto = $datos['cant_producto'] + 1;
        }

        $sql_3 = "UPDATE carrito SET  cant_producto = '$cant_producto' WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
        $ejecutar_sql3 = $conexion -> query($sql_3);
        header("location: ../productos/productos.php?subCategoria=" . $subCategoria);

    }else{

        $ejecutar = $conexion -> query($sql);
        header("location: ../productos/productos.php?subCategoria=" . $subCategoria);

    }


?>