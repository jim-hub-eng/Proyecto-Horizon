<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="css/registrar-styles.css">
</head>
<body>
    <div class="container">
        <h2>Registrarse</h2>
        <form action="./php/registrar_usuario.php" method="POST" id="registerForm">
            <div class="box-container">
                <div class="content">
                    <div class="box-input">
                        <input type="text" name="txtNombre" id="txtN" required>
                        <label for="">Nombre</label>
                    </div>
                    <div class="box-input">
                        <input type="text" name="txtApellidoP" id="txtAP" required>
                        <label for="">Apellido Paterno</label>
                    </div>
                    <div class="box-input">
                        <input type="text" name="txtApellidoM" id="txtAM" required>
                        <label for="">Apellido Materno</label>
                    </div>
                    <div class="box-input">
                        <input type="text" name="txtUsuario" maxlength="10" id="txtNU" required>
                        <label for="">Nombre de Usuario</label>
                        <p id="error-txtNU" >0 / 10</p>
                    </div>
                    <div class="box-input">
                        <input type="email" name="txtCorreo" id="txtCE" required>
                        <label for="">Correo Electronico</label>
                        <p id="error_correo"></p>
                    </div>
                </div>
                <div class="content">
                    <div class="box-input">
                        <input type="password" name="txtPsw" id="txtPSW" required>
                        <label for="">Contraseña</label>
                    </div>
                    <div class="box-input">
                        <input type="password" name="txtRPsw" id="txtRPSW" required>
                        <label for="">Repetir Contraseña</label>
                        <p id="error_txtRPSW"></p>
                    </div>
                    <div class="box-input">
                        <input type="text" name="txtDireccion" id="txtD" required>
                        <label for="">Direccion</label>
                    </div>
                    <div class="box-input">
                        <input type="text" name="txtRegion" id="txtR" required>
                        <label for="">Region</label>
                    </div>
                </div>
            </div>
            <button name="btnRegistrarUsuario" type="submit">Registrarse</button>
        </form>
        <p id="errorMessage" class="error"></p>
    </div>
    <script src="js/registrar-script.js"></script>
</body>
</html>