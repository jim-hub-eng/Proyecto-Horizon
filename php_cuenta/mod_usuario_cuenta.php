<?php

    include '../php/conexion.php';

    $id = $_POST['txtid'];
    $usuario = $_POST['usuario'];

    $sql = "UPDATE usuarios SET usuario = '$usuario' WHERE id = '$id'";
    $ejecutar = $conexion -> query($sql);

    if($ejecutar){
        header("location: ../cuenta/cuenta.php");
    }

?>