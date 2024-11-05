<?php

    $conexion = new mysqli("localhost", "root", "", "horizon");

    //$imagen = $conexion -> real_escape_string(file_get_contents($_FILES["txtAdminFoto"]["tmp_name"]));
    $nombre = $_POST['txtAdminNombre'];
    $correo = $_POST['txtAdminCorreo'];
    $edad = $_POST['txtAdminEdad'];
    $fecha = $_POST['txtDiaHoy'];
    $psw = $_POST['txtAdminPsw'];

    $consulta = "INSERT INTO admin(nombre, contrasena, correo, edad, fecha_ingreso)
                VALUES('$nombre', '$psw', '$correo', '$edad', '$fecha')";
    
    $verificar_correo = mysqli_query($conexion , "SELECT * FROM admin WHERE correo = '$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado. Intenta otro diferente");
                window.location = "./admin.php";
            </script>  
        ';
        exit();
    }

    $ejecutar = $conexion -> query($consulta);
    if($ejecutar){
        echo "
            <script>
                alert('Se registro correctamente');
                window.location = '../admin.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('No se registro correctamente');
            </script>
        ";
    }

?>