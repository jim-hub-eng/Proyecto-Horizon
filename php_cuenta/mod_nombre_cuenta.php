<?php

    include '../php/conexion.php';

    $id = $_POST['txtid'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];

    $sql = "UPDATE usuarios SET nombre = '$nombre', apellido_p = '$apellido_p', apellido_m = '$apellido_p' WHERE id = '$id'";
    $ejecutar = $conexion -> query($sql);

    if($ejecutar){
        header("location: ../cuenta/cuenta.php");
    }

?>