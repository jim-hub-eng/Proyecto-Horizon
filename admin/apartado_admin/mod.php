<?php

    $conexion = new mysqli("localhost", "root", "", "horizon");
    
    $id = $_POST['txtid'];
    $nombre = $_POST['txtNombre'];
    $contrasena = $_POST['txtPsw'];
    $edad = $_POST['txtEdad'];
    $correo = $_POST['txtEmail'];

    $sql = "UPDATE `admin` SET `nombre` = '$nombre' , `contrasena` = '$contrasena' , `correo` = '$correo' , `edad` = '$edad' WHERE `id` = '$id'";
    $ejecutar = $conexion -> query($sql);

    if($ejecutar){
        echo '
            <script>
                alert("Se modifico correctamente.");
                window.location = "../admin.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No modifico correctamente.");
                window.location = "../admin.php;
            </script>
        ';
    }

?>