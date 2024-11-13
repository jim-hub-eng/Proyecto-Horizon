<?php

    include './conexion.php';

    session_start(); #se inicia una sesion

    include "conexion.php";

    $correo = $_POST['txtemail']; # se obtine el correo
    $password = $_POST['txtpsw']; # se obtiene la contraseña

    #se verifica que el correo y la contraseña esten en la tabla de admin
    $validar_login = mysqli_query($conexion , "SELECT * FROM admin WHERE correo = '$correo' and contrasena = '$password'");

    #si esta los manda a archivo de admin
    if(mysqli_num_rows($validar_login) > 0){
        header("location: ../admin/admin.php");
        exit; #hace que se no se siga ejecutando el codigo
    }

    #se verifica que el correo este en la tabla de usuario
    $validar_login = mysqli_query($conexion , "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$password'");

    #si esta los manda al index
    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['correo'] = $correo;  #el session sirve para que se pueda usar la variable correo en cualquier lugar del codigo
        header("location: ../index.php");
        exit;
    }else{ #si no esta los manda al login
        echo '
            <script>
                alert("Usuario no existe.");
                window.location = "../login.php";
            </script>
        ';
    }


        
    
    exit;


?>