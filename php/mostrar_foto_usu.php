<?php 

    include '../php/conexion.php';    

    if(isset($_GET['id'])){ #verifica si hay algo en la varible "id"

        $id = (int)$_GET['id']; #verifica si es numero con el (int)

        $sql = "SELECT foto FROM usuarios WHERE id = '$id'"; #se obtiene la foto de un usuario dependiendo del id
        $resultado = $conexion -> query($sql); #se ejecuta la consulta
 
        if($resultado && $resultado -> num_rows > 0){ #verifica si hay foto en su fila
            $imagen = $resultado -> fetch_object();  #se le dice que a la variable imagen que entre a la tabla
            echo $imagen -> foto; #Bntener la foto de la tabla
        }else{
            echo 'imagen no encontrada'; #si no hay ninguna foto muestra el mensaje
        }

        $conexion -> close(); #se cierra la conexion
        
    }

?>