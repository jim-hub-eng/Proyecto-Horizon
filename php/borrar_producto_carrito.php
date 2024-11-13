<?php

    include '../php/conexion.php';

    $cod_producto = $_GET['cod_producto']; #se obtiene el id del producto
    $id_usuario = $_GET['id_usuario']; #se obtiene el id del usuario

    #se genera la consulta
    $sql = "DELETE FROM carrito WHERE codigo = '$cod_producto'"; #borra de la tabla carrito cuando codigo sea el que obtubo con GET
    #se ejecuta la consulta
    $ejecutar = $conexion -> query($sql);


    if($ejecutar){ 
        header('location: ../carrito.php?id=' . $id_usuario); #se regresa al carrito mandando el id del usuario por la url
    }else{
        echo '
            <script>
                alert("No se pudo borrar);
            </script>
        ';
        header('location: ../carrito.php?id=' . $id_usuario); #se regresa al carrito mandando el id del usuario por la url
    }

?>