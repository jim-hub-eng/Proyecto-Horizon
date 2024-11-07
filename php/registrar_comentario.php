<?php

    include '../php/conexion.php';

    $usuario = $_POST['txtUsuario'];
    $comentario = $_POST['txtComentario'];
    $estrellas = $_POST['radios'];
    $id_producto = $_POST['txtIdProducto'];

    $sql = "INSERT INTO comentarios(id_producto, usuario, comentario, estrellas)
            VALUES('$id_producto','$usuario', '$comentario', '$estrellas')";
    
    $ejecutar = $conexion -> query($sql);

    if($ejecutar){
        echo '
            <script>
                alert("Se envio el comentario correctamente");
            </script>
        ';
        header("location: ../producto_indiv.php?id=" . $id_producto);
    }else{
        echo '
            <script>
                alert("No se envio el comentario correctamente");
            </script>
        ';
        header("location: ../producto_indiv.php?id=" . $id_producto);
    }

?>