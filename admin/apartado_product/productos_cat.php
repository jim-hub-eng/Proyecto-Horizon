<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "horizon");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if (isset($_GET['articulo'])) {
    $articulo = $conexion->real_escape_string($_GET['articulo']);

    // Consulta SQL para obtener opciones de acuerdo a la categoría seleccionada
    $sql = "SELECT DISTINCT sub_categoria FROM categorias WHERE categoria = '$articulo'";
    $resultado = $conexion->query($sql);

    // Genera opciones para el select2
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado-> fetch_assoc()) {
            echo "<option value='" . $fila['sub_categoria'] . "'>" . ucwords($fila['sub_categoria']) . "</option>";
        }
    } else {
        echo "<option value=''>No hay opciones disponibles</option>";
    }
} else {
    echo "<option value=''>Articulo no seleccionado</option>";
}

// Cierra la conexión
$conexion->close();
?>
