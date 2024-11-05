<?php

    $conexion = new mysqli("localhost", "root", "", "horizon");

    $imagen = $conexion -> real_escape_string(file_get_contents($_FILES["foto"]["tmp_name"]));
    $nombre_articulo = $_POST['txtNombreArticulo'];
    $sub_categoria = $_POST['txtSubCateArticulo'];
    $des_articulo = $_POST['txtDesArticulo'];
    $precio_articulo = $_POST['txtPrecioArticulo'];
    $descuento_articulo = $_POST['txtDescuentoArticulo'];
    $categoria = $_POST['txtCategoria'];

    $consulta = "INSERT INTO productos(imagen, nombre, descripcion, precio, descuento, sub_categoria, categoria)
                VALUES('$imagen', '$nombre_articulo', '$des_articulo', '$precio_articulo', '$descuento_articulo','$sub_categoria','$categoria')";
    
    $ejecutar = $conexion -> query($consulta);

    if($ejecutar){
        echo '
            <script> 
                alert("Producto registrado correctamente"); 
                window.location = "../admin.php";
            </script>
        ';
    }else{
        echo '
            <script> 
                alert("No se registro el producto"); 
                window.location = "../admin.php";
            </script>

        ';
    }

?>