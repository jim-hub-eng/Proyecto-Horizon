<?php

    $conexion = new mysqli("localhost", "root", "", "horizon");
    $id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modificar-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    
    <nav class="nav">
        <a href="../admin.php"><i class="bi bi-arrow-left"></i></a>
    </nav>

    <div class="media">
        <div class="form">
            <h2>Modificar Admin</h2>
            <form action="../apartado_admin/mod.php" method="POST">
                <input type="hidden" name="txtid" value="<?= $_GET['id'] ?>">
                <?php

                    $sql = "SELECT * FROM admin WHERE id = '$id'";
                    $ejecutar = $conexion -> query($sql);

                    while($datos = $ejecutar -> fetch_object()){ ?>
                        <div class="box-input">
                    <input type="text" name="txtNombre" value="<?= $datos -> nombre ?>" required>
                    <label for="">Nombre</label>
                </div>
                <div class="box-input">
                    <input type="password" name="txtPsw" value="<?= $datos -> contrasena ?>" id="inp-psw" required>
                    <label for="">Contraseña</label>
                </div>
                <div class="box-input">
                    <input type="password" value="<?= $datos -> contrasena ?>" id="inp-rpsw" required>
                    <label for="">Repetir contraseña</label>
                    <p id="caja-psw"></p>
                </div>
                <div class="box-input">
                    <input type="number" name="txtEdad" value="<?= $datos -> edad ?>" required>
                    <label for="">Edad</label>
                </div>
                <div class="box-input">
                    <input type="email" name="txtEmail" value="<?= $datos -> correo ?>" id="inp-email" required>
                    <label for="">Correo</label>
                    <p id="caja-email"></p>
                </div>
                    <?php }

                ?>
                <button>Guardar</button>
            </form>
        </div>
    </div>

    <script src="modifica-script.js"></script>
</body>
</html>