<?php

    include './conexion.php';

    $correo = $_POST['txtemail'];
    $psw = $_POST['txtpsw'];

    session_start();

    include "conexion.php";

    $correo = $_POST['txtemail'];
    $password = $_POST['txtpsw'];

    $validar_login = mysqli_query($conexion , "SELECT * FROM admin WHERE correo = '$correo' and contrasena = '$password'");

    if(mysqli_num_rows($validar_login) > 0){
        header("location: ../admin/admin.php");
        exit;
    }

    $validar_login = mysqli_query($conexion , "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$password'");

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['correo'] = $correo; 
        header("location: ../index.php");
        exit;
    }else{
        echo '
            <script>
                alert("Usuario no existe.");
                window.location = "../login.php";
            </script>
        ';
    }


        
    
    exit;


?>