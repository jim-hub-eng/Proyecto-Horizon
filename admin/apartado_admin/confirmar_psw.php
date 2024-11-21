<?php
    
    $conexion = new mysqli("localhost", "root", "", "horizon");

    $id = $_POST['txtid'];
    $psw = $_POST['txtpsw'];

    $sql = "SELECT contrasena FROM admin WHERE id = '$id'";
    $ejecutar = $conexion -> query($sql);
    $datos = $ejecutar -> fetch_object();
    $contrasena = $datos -> contrasena;

    if($contrasena == $psw){
        echo '
            <script>
                alert("Contraseña correcta");
            </script>   
        ';
        header("location: ../pantallas/modificar_admin.php?id=" . $id);
    }else{
        echo '
            <script>
                alert("Contraseña incorrecta");
            </script>   
        ';
        header("location: ../admin.php");
        
    }


?>