<?php

    include './conexion.php'; #direccion del archivo de conexicon para usar la variable conexion

    if(isset($_POST['btnRegistrarUsuario'])){ #verfica que le dio click al boton
        if( #verifica que todos los input de ese formulario esten llenos
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
                #se guardan los datos ingresado en variables
                $nombre = $_POST['txtNombre'];
                $apellido_p = $_POST['txtApellidoP'];
                $apellido_m = $_POST['txtApellidoM'];
                $usuario = $_POST['txtUsuario'];
                $correo = $_POST['txtCorreo'];
                $psw = $_POST['txtPsw'];
                $direccion = $_POST['txtDireccion'];
                $region = $_POST['txtRegion'];

                #consulta para insertar los datos en base de datos
                $consulta = "INSERT INTO usuarios(nombre, apellido_p, apellido_m, usuario, correo, contrasena, direccion, region)
                                        VALUES('$nombre', '$apellido_p', '$apellido_m', '$usuario', '$correo', '$psw', '$direccion', '$region')";

                #verifica que el correo no se repita
                $verificar_correo = mysqli_query($conexion , "SELECT * FROM usuarios WHERE correo = '$correo'");

                
                if(mysqli_num_rows($verificar_correo) > 0){ #se va a ejecutar si ya exite
                    echo '
                        <script>
                            alert("Este correo ya esta registrado. Intenta otro diferente");
                            window.location = "../login.php";
                        </script>  
                    ';
                    exit(); #sirve para que se pare la ejecucion
                }
                //verificar el nombre de usuario no se repita en la base de datos
                $verificar_usuario = mysqli_query($conexion , "SELECT * FROM usuarios WHERE usuario = '$usuario'");
                
                if(mysqli_num_rows($verificar_usuario) > 0){ #se va a ejecutar si el usuario existe
                    echo '
                        <script>
                            alert("Este usuario ya esta registrado. Intenta otro diferente");
                            window.location = "../login.php";
                        </script>  
                    ';
                    exit();
                }

                #se ejecuta la consulta si no existe el correo y el usuario
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