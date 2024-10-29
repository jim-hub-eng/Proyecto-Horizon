<?php

    include './conexion.php';

    if(isset($_POST['btnRegistrarUsuario'])){
        if(
            strlen($_POST['txtNombre']) >= 1 &&
            strlen($_POST['txtApellidoP']) >= 1 &&
            strlen($_POST['txtApellidoM']) >= 1 &&
            strlen($_POST['txtUsuario']) >= 1 &&
            strlen($_POST['txtCorreo']) >= 1 &&
            strlen($_POST['txtPsw']) >= 1 &&
            strlen($_POST['txtRPsw']) >= 1 &&
            strlen($_POST['txtDireccion']) >= 1 &&
            strlen($_POST['txtRegion']) >= 1
            ){

                $nombre = $_POST['txtNombre'];
                $apellido_p = $_POST['txtApellidoP'];
                $apellido_m = $_POST['txtApellidoM'];
                $usuario = $_POST['txtUsuario'];
                $correo = $_POST['txtCorreo'];
                $psw = $_POST['txtPsw'];
                $direccion = $_POST['txtDireccion'];
                $region = $_POST['txtRegion'];

                $consulta = "INSERT INTO usuarios(nombre, apellido_p, apellido_m, usuario, correo, contrasena, direccion, region)
                                        VALUES('$nombre', '$apellido_p', '$apellido_m', '$usuario', '$correo', '$psw', '$direccion', '$region')";

                $verificar_correo = mysqli_query($conexion , "SELECT * FROM usuarios WHERE correo = '$correo'");

                if(mysqli_num_rows($verificar_correo) > 0){
                    echo '
                        <script>
                            alert("Este correo ya esta registrado. Intenta otro diferente");
                            window.location = "../login.php";
                        </script>  
                    ';
                    exit();
                }
                //verificar el nombre de usuario no se repita en la base de datos
                $verificar_usuario = mysqli_query($conexion , "SELECT * FROM usuarios WHERE usuario = '$usuario'");
                
                if(mysqli_num_rows($verificar_usuario) > 0){
                    echo '
                        <script>
                            alert("Este usuario ya esta registrado. Intenta otro diferente");
                            window.location = "../login.php";
                        </script>  
                    ';
                    exit();
                }

                $ejecutar = $conexion -> query($consulta);

                if($ejecutar){
                    echo "
                        <script>
                            alert('Se registro correctamente');
                            window.location = '../login.php';
                        </script>
                    ";
                }else{
                    echo "
                        <script>
                            alert('No se registro correctamente');
                        </script>
                    ";
                }

                

            }
    }

?>