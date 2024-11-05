<?php

    include '../php/conexion.php';

    $cod_producto = $_GET['cod_producto'];
    $id_usuario = $_GET['id_usuario'];

    $sql = "DELETE FROM carrito WHERE codigo = '$cod_producto'";
    $ejecutar = $conexion -> query($sql);

    if($ejecutar){
        header('location: ../carrito.php?id=' . $id_usuario);
    }else{
        echo '
            <script>
                alert("No se pudo borrar);
            </script>
        ';
        header('location: ../carrito.php?id=' . $id_usuario);
    }

?>