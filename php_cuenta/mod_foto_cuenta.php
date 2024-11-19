<?php

    include '../php/conexion.php';

    $id = $_POST['txtid'];
    $foto = $conexion -> real_escape_string(file_get_contents($_FILES["foto"]["tmp_name"]));

    $sql = "UPDATE usuarios SET foto = '$foto' WHERE id = '$id'";
    $ejecutar = $conexion -> query($sql);

    if($ejecutar){
        header("location: ../cuenta/cuenta.php");
    }


?>