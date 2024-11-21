<?php

    include '../php/conexion.php';

    $id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="confirm_pass.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    
    <nav class="navegacion" >
        <a href="admin.php"><i class="bi bi-arrow-left"></i></a>
    </nav>
    <div class="media">
        <form action="./apartado_admin/confirmar_psw.php" method="POST" class="alerta">
            <h2>Confirmar contraseña</h2>
            <div class="box-input">
                <input type="password" name="txtpsw" id="" required>
                <label for="">Contraseña</label>
            </div>
            <input type="hidden" name="txtid" value="<?= $id ?>">
            <button>Entrar</button>
        </form>
    </div>

</body>
</html>