<?php

    $conexion = new mysqli("localhost", "root", "", "horizon");

    $id = $_GET['id'];

    $sql = "DELETE FROM admin WHERE id = '$id'";
    $ejecutar = $conexion -> query($sql);

    if($ejecutar){
        echo '
            <script>
                alert("Se elimino correctamente.");
                window.location = "../admin.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("No se elimino correctamente.");
                window.location = "../admin.php;
            </script>
        ';
    }

?>