<?php

    include '../php/conexion.php';

    $id = $_POST['txtid'];
    $direccion = $_POST['direccion'];
    $region = $_POST['region'];

    $sql = "UPDATE usuarios SET direccion = '$direccion' , region = '$region' WHERE id = '$id'";
    $ejecutar = $conexion -> query($sql);

    if($ejecutar){
        header("location: ../cuenta/cuenta.php");
    }

?>