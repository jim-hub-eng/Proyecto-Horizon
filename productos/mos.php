<?php 

    $conexion = new mysqli("localhost", "root", "", "horizon");

    if(isset($_GET['id'])){

        $id = (int)$_GET['id'];

        $sql = "SELECT imagen FROM productos WHERE id = '$id'";
        $resultado = $conexion -> query($sql);

        if($resultado && $resultado -> num_rows > 0){
            $imagen = $resultado -> fetch_object();
            echo $imagen -> imagen;
        }else{
            echo 'imagen no encontrada';
        }

        $conexion -> close();
        
    }

?>