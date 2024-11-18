<?php

    include '../php/conexion.php';

    #se obtiene los datos y se guardan en variables
    $id_usuario = $_POST['txtidUsuario']; 
    $id_producto = $_POST['txtidProducto'];
    $subCategoria = $_POST['txtSubCategoria']; #se toma la subcategoria en la que esta para usarla mas adelante
    $cant_producto = 1;  #cuando se añada al carrito un producto, en la cantidad va aparecer " 1 "
    $pago = "no";

    #se genera la consulta
    $sql = "INSERT INTO carrito(id_usuario, id_producto, cant_producto, pagado)
            VALUES('$id_usuario', '$id_producto', '$cant_producto' , '$pago')";

    #verifica si el producto ya existe
    $verificacion_producto = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
    #se ejecuta la consulta 
    $ejecutar_verifcacion = $conexion -> query($verificacion_producto);

    if($ejecutar_verifcacion -> num_rows > 0){ #si existe

        $sql_pagado = "SELECT pagado FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
        $ejecutar_sql_pagado = $conexion -> query($sql_pagado);
        $datos = $ejecutar_sql_pagado -> fetch_object();
        if($pagado = $datos -> pagado == 'si'){
            #si el producto no existe , solo se registra, insertando el numero " 1 " en cantidad de producto
            $ejecutar = $conexion -> query($sql);
            header("location: ../productos/productos.php?subCategoria=" . $subCategoria);
        }else{
             #se genera la consulta , obtener la cantidad de producto
        $sql_tomar_cant_product = "SELECT cant_producto FROM carrito WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
        #se ejecuta la consulta
        $ejecutar_sql_tomar_cant_product = $conexion -> query($sql_tomar_cant_product);


        while($datos = $ejecutar_sql_tomar_cant_product -> fetch_assoc()){ 
            $cant_producto = $datos['cant_producto'] + 1; #Se le esta indicando que a la cantidad se le sume 1
        }

        #consulta para cambiar el dato de cantidad
        $sql_3 = "UPDATE carrito SET cant_producto = '$cant_producto' WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
        #se ejecuta la consulta
        $ejecutar_sql3 = $conexion -> query($sql_3);
        #regresa al archivo de donde se añadio al carrito, mandando la subcategoria en la variable  " subCategoria "
        header("location: ../productos/productos.php?subCategoria=" . $subCategoria);
        }
    }else{
         #si el producto no existe , solo se registra, insertando el numero " 1 " en cantidad de producto
         $ejecutar = $conexion -> query($sql);
         header("location: ../productos/productos.php?subCategoria=" . $subCategoria);
    }
?>