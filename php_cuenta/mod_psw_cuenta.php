<?php

    include '../php/conexion.php';

    $id = $_POST['txtid'];
    $psw = $_POST['password'];

    $sql = "UPDATE usuarios SET contrasena = '$psw' WHERE id = '$id'";
    $ejecutar = $conexion -> query($sql);

    if($ejecutar){
        header("location: ../cuenta/cuenta.php");
    }

?>