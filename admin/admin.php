<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn-pencil{
            padding: 5px;
            color: black;
            border-radius: 5px;
            text-decoration: none;
            background-color: yellow;
        }
        .btn-delete{
            padding: 5px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            background-color: red;
        }
        .content-2 .box-input p{
            left: 85%;
        }
        .salirBtn{
            position: absolute;
            top: 100%;
            color: black; 
            padding: 10px;
            background-color: black;
            color: white;
            left: 0;
            border-radius: 0 5px 5px 0;
        }
    </style>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <div class="nav">
        <button id="btn-car-1"><i class="bi bi-person-fill"></i></button>
        <button id="btn-car-2"><i class="bi bi-bag-fill"></i></button>
        <a class="salirBtn" href="../login.php"><i class="bi bi-box-arrow-in-right"></i></a>
    </div>

    <div class="box-1">
        <div class="box-2">
           <div class="box-3">
            <div class="boxes">
                <div class="title-1">
                    <h2>ADMINISTRADORES</h2>
                    <a href="./apartado_reportes/reporte_admin.php">Generar Pdf</a>
                </div>
                <div class="box-registrar">
                    <div class="title-2">
                        <h3>Registrar Admin</h3>
                    </div>
                    <form method="POST" action="./apartado_admin/registrar_admin.php" class="form-container-admin">
                        <div class="container">
                            <div class="content">
                                <div class="box-input">
                                    <input type="text" name="txtAdminNombre" id="" required>
                                    <label for="">Nombre</label>
                                </div>
                                <div class="box-input">
                                    <input type="password" name="txtAdminPsw" id="inp-psw-admin" required>
                                    <label for="">Contraseña</label>
                                </div>
                                <div class="box-input">
                                    <input type="password" name="" id="inp-rpsw-admin" required>
                                    <label for="">Repetir Contraseña</label>
                                    <p id="caja-password"></p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="box-input">
                                    <input type="text" name="txtAdminEdad" id="" required>
                                    <label for="">Edad</label>
                                </div>
                                <div class="box-input">
                                    <input type="email" name="txtAdminCorreo" id="inp-correo" required>
                                    <label for="">Correo</label>
                                    <p id="caja-correo"></p>
                                </div>
                                <?php
                                    date_default_timezone_set('America/Mexico_City');
                                    $fecha_actual = date("d-m-y");
                                ?>
                                <input type="hidden" name="txtDiaHoy" value="<?= $fecha_actual ?>">
                                <div class="box-btn-admin">
                                    <button>Registrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-tabla">
                        <table>
                            <tr>
                              <th>id</th>
                              <th>Nombre</th>
                              <th>Edad</th>
                              <th>Correo</th>
                              <th>Fecha Ingreso</th>
                              <th>Editar</th>
                              <th>Eliminar</th>
                            </tr>
                            <?php

                                $conexion = new mysqli("localhost", "root", "", "horizon");

                                $sql = "SELECT * FROM admin";
                                $ejecutar = $conexion -> query($sql);

                                while($datos = $ejecutar -> fetch_object()){ ?>
                                    <tr>
                                        <td><?= $datos -> id ?></td>
                                        <td><?= $datos -> nombre ?></td>
                                        <td><?= $datos -> edad ?></td>
                                        <td><?= $datos -> correo ?></td>
                                        <td><?= $datos -> fecha_ingreso ?></td>
                                        <td><a class="btn-pencil" href="./confirm_pass.php?id=<?= $datos -> id ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a class="btn-delete" href="./apartado_admin/eliminar.php?id=<?= $datos -> id ?>"><i class="bi bi-trash"></i></a></td>
                                    </tr>
                                <?php }

                            ?>  
                        </table>
                    </div>
                    <br><br><br>
            </div>
            <div class="boxes">
                <div class="title-3">
                    <h2>Registrar Productos</h2>
                </div>
                <form method="POST" enctype="multipart/form-data" action="./apartado_product/registrar_producto.php" class="form-container-producto">
                    <div class="container">
                        <div class="content">
                            <div class="box-file">
                                <img id="caja-foto" src="../img/sinImagen.png" alt="">
                                <input type="file" name="foto" id="input-file-foto" required>
                                <label id="caja-file" for="input-file-foto">Seleccionar archivo</label>
                            </div>
                            <div class="box-input">
                                <input type="text" maxlength="70" name="txtNombreArticulo" id="inp-nombre-producto" required>
                                <label for="">Nombre del producto</label>
                                <p id="caja-nombre-producto">0 / 70</p>
                            </div>
                            <div class="box-textarea">
                                <textarea name="txtDesArticulo" maxlength="230" id="inp-des-producto" placeholder="Escriba la descripcion" required></textarea>
                                <p id="caja-des-producto">0 / 230</p>
                            </div>
                        </div>
                        <div class="content content-2">
                            <div class="box-input">
                                <input type="text" name="txtPrecioArticulo" id="" required>
                                <label for="">Precio</label>
                            </div>
                            <div class="box-input">
                                <input type="text" name="txtDescuentoArticulo" id="" required>
                                <label for="">Descuento</label>
                            </div>
                            <div class="box-input">
                                <input type="text" maxlength="20" name="txtColorArticulo" id="input-color" required>
                                <label for="">Color</label>
                                <p id="box-color" >0 / 20</p>
                            </div>
                            <div class="box-input">
                                <input type="text" maxlength="20" name="txtMarcaArticulo" id="input-marca" required>
                                <label for="">Marca</label>
                                <p id="box-marca">0 / 20</p>
                            </div>
                            <div class="box-input">
                                <input type="text" maxlength="50" name="txtInteresesArticulo" id="input-intereses" required>
                                <label for="">Intereses</label>
                                <p id="box-intereses">0 / 50</p>
                            </div>
                            <div class="box-select">
                                <label for="">Categoria</label>
                                <select name="txtCategoria" onchange="selectCategoria()" id="selectorCategoria" required>
                                    <option value=""></option>
                                    <?php

                                        include '../php/conexion.php';
                                        $sql = "SELECT DISTINCT categoria FROM categorias";
                                        $ejecutar = $conexion -> query($sql);

                                        while($datos = $ejecutar -> fetch_object()){ ?>
                                            <option value="<?= $datos -> categoria ?>"><?= ucwords($datos -> categoria) ?></option>
                                        <?php }

                                    ?>
                                </select>
                            </div>
                            <div class="box-select">
                                <label for="txtSubCateArticulo">Sub-categoria</label>
                                <select name="txtSubCateArticulo" id="selecionarSubCategoria" required></select>
                            </div>
                            <div class="box-btn">
                                <button>Registrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="boxes">3</div>
           </div>
        </div>
    </div>
    <script src="./admin.js"></script>
    <script>
        function selectCategoria(){
            var articulo = document.getElementById("selectorCategoria").value;

            if (articulo !== "") {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "./apartado_product/productos_cat.php?articulo=" + articulo, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        document.getElementById("selecionarSubCategoria").innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            } else {
                document.getElementById("selecionarSubCategoria").innerHTML = '<option value="">Selecciona una opción</option>';
            }
        }

        const nombre_producto = document.getElementById('inp-nombre-producto');
const error_producto = document.getElementById('caja-nombre-producto');

nombre_producto.addEventListener('input', cantLetras_producto);

function cantLetras_producto(){

    let num_letras = nombre_producto.value.length;

    error_producto.innerHTML = `${num_letras} / 70`;

}

const color = document.getElementById('input-color');
const mos_color = document.getElementById('box-color');

color.addEventListener('keyup', cantLetras_color);

function cantLetras_color(){

    let num_letras = color.value.length;

    mos_color.innerHTML = `${num_letras} / 20`;

}

    const marca = document.getElementById('input-marca');
    const mos_marca = document.getElementById('box-marca');

    marca.addEventListener('keyup', cantLetras_marca);

    function cantLetras_marca(){

        let num_letras = marca.value.length;

        mos_marca.innerHTML = `${num_letras} / 20`;

    }

    const intereses = document.getElementById('input-intereses');
    const mos_intereses = document.getElementById('box-intereses');
    
    intereses.addEventListener('keyup', cantLetras_intereses);
    
    function cantLetras_intereses(){
    
        let num_letras = intereses.value.length;
    
        mos_intereses.innerHTML = `${num_letras} / 50`;
    
    }



    </script>
</body>
</html>