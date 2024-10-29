<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        .nav{
            z-index: 999;
        }
        .box .box-2{
            right: 200%;
        }
        .box-administradores #cerrarRegistrarUsuario{
            transform: translateY(90px);
        }
        .po-img{
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;
            left: 15px;
            img{
                position: absolute;
                width: 100%;
                height: 100%;
                object-fit: cover; 
            }
        }
    </style>
    <link rel="stylesheet" href="admin-styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    
    <div class="menu">
        <button id="btnCloseList" onclick="closeList()">&times;</button>
        <div class="box-logo">
            <img src="../img/logo-sinfondo.png" alt="logo-sinfondo">
            <h3>HORIZON ADMIN</h3>
        </div>
        <div class="box-ul-btn-actions">
            <ul>
                <li><button onclick="btn_car_1()"><i class="bi bi-people-fill"></i>Admins</button></li>
                <li><button onclick="btn_car_2()"><i class="bi bi-bag-fill"></i>Productos</button></li>
                <li><button onclick="btn_car_3()"><i class="bi bi-filetype-pdf"></i>Reportes</button></li>
                <li><a href=""><i class="bi bi-box-arrow-in-left"></i>Salir</a></li>
            </ul>
        </div>
        <a href="#" class="box-admin">
            <div class="box-user-picture">
                <img src="../img/logo-sinfondo.png" alt="">
            </div>
            <h3>Jim</h3>
        </a>
    </div>
    <nav class="nav">
        <button onclick="openList()"><i class="bi bi-list"></i></button>
    </nav>

    <div class="box">
        <div class="box-2">
            <div class="box-administradores boxes">
                <div class="box-title">
                    <h2>ADMINISTRADORES</h2>
                </div>
                <div class="box-tablas">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#id</th>
                            <th scope="col">FOTO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">CORREO</th>
                            <th scope="col">EDAD</th>
                            <th scope="col">FECHA_INGRESO</th>
                            <th scope="col">EDITAR</th>
                            <th scope="col">ELIMINAR</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                            include '../php/conexion.php';

                            $sql = "SELECT * FROM admin";
                            $ejecutar = $conexion -> query($sql);

                            while($datos = $ejecutar -> fetch_object()){ ?>
                                <tr>
                                    <th><?= $datos -> id ?></th>
                                    <td><?php echo '
                                    
                                        <div class="po-img">
                                            <img class="po-user" src="./apartado_admin/mostrar_foto.php?id=' . htmlspecialchars($datos -> id, ENT_QUOTES) . ' " >
                                        </div>
                                    
                                    '; ?></td>
                                    <td><?= $datos -> nombre ?></td>
                                    <td><?= $datos -> correo ?></td>
                                    <td><?= $datos -> edad ?></td>
                                    <td><?= $datos -> fecha_ingreso ?></td>
                                    <td><a class="btn-edit" href=""><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="btn-delete" href=""><i class="bi bi-trash-fill"></i></a></td>
                                </tr>
                            <?php }


                          ?>
                        </tbody>
                      </table>
                      <div class="box-registrar">
                        <button onclick="abrirRegistrarUsuario()" id="btnRegistrarUsuario">Registrar Usuario</button>
                      </div>
                </div>
                <div class="media-form">
                    <button onclick="cerrarRegistrarUsuario()" id="cerrarRegistrarUsuario">&times;</button>
                    <form method="POST" enctype="multipart/form-data" action="./apartado_admin/registrar_admin.php">
                        <h2>REGISTRAR ADMIN</h2>
                        <div class="container">
                            <div class="content">
                                <div class="box-input">
                                    <div class="box-img-usuario-regis"></div>
                                </div>
                                <div class="box-input-file">
                                    <label for="int-file-user">Seleccionar Foto</label>
                                    <input type="file" name="txtAdminFoto" id="int-file-user">
                                </div>
                            </div>
                            <div class="content">
                                <div class="box-input">
                                    <input type="text" name="txtAdminNombre" id="in-1" required>
                                    <label for="in-1">Nombre</label>
                                </div>
                                <div class="box-input">
                                    <input type="text" name="txtAdminCorreo" id="in-2" required>
                                    <label for="in-2">Correo</label>
                                </div>
                                <div class="box-input">
                                    <input type="text" name="txtAdminEdad" id="in-3" required>
                                    <label for="in-3">Edad</label>
                                </div>
                                <div class="box-input">
                                    <input type="password" name="txtAdminPsw" id="in-4" required>
                                    <label for="in-4">Contraseña</label>
                                </div>
                                <?php
                                    date_default_timezone_set('America/Mexico_City');
                                    $fecha_actual = date("d-m-y");
                                ?>
                                <input type="hidden" value="<?= $fecha_actual ?>" name="txtDiaHoy" required>
                            </div>
                        </div>
                        <button>Registrar <span></span></button>
                    </form>
                </div>
            </div>
            <!-- FIN DE PRIMERA CAJA-->
            <!--SEGUNDA CAJA-->
            <div class="box-productos boxes">
                <div class="title-2">
                    <h1>REGISTRAR PRODUCTOS</h1>
                </div>

                <div class="box-carosel-forms">
                    <div class="box-labels-car">
                        <input type="radio" name="radios-carosel" id="radios-carosel-1" checked>
                        <input type="radio" name="radios-carosel" id="radios-carosel-2">
                        <input type="radio" name="radios-carosel" id="radios-carosel-3">
                        <input type="radio" name="radios-carosel" id="radios-carosel-4">
                        <input type="radio" name="radios-carosel" id="radios-carosel-5">
                        <input type="radio" name="radios-carosel" id="radios-carosel-6">
                        <input type="radio" name="radios-carosel" id="radios-carosel-7">
                        <input type="radio" name="radios-carosel" id="radios-carosel-8">
                        <div class="box-carosel-1">
                            <div class="box-carosel-2">
                                <!-- FORMUARIO HOGAR-->
                                <div class="box-formularios">
                                    <form method="POST" enctype="multipart/form-data" action="./apartado_product/registrar_producto.php">
                                        <h2>HOGAR</h2>
                                        <div class="container">
                                            <div class="content">
                                                <div class="box-img-product">
                                                    <img id="img-hogar" src="../img/sinImagen.png" alt="">
                                                </div>
                                                <div class="box-input-file-product">
                                                    <label for="file-hogar">Selecionar foto</label>
                                                    <input type="file" name="foto" id="file-hogar">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtNombreArticulo" maxlength="50" id="int-name-hogar" required>
                                                    <label for="int-name-articulo">Nombre del Articulo</label>
                                                    <p id="box-count-name-hogar" >0 / 50</p>
                                                </div>
                                                <div class="box-textarea">
                                                    <textarea maxlength="230" name="txtDesArticulo" id="int-des-hogar" placeholder="Descripcion" required></textarea>
                                                    <p id="box-count-des-hogar">0 / 230</p>
                                                </div>
                                                <div class="box-input">
                                                    <input type="text" name="txtPrecioArticulo" id="int-precio-hogar" required>
                                                    <label for="int-precio-articulo">Precio</label>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtDescuentoArticulo" id="int-des-hogar" required>
                                                    <label for="int-des-articulo">Descuento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="txtCategoria" value="hogar">
                                        <button>
                                            Registrar
                                            <span></span>
                                        </button>
                                    </form>
                                </div>
                                <!-- FIN FORMUARIO HOGAR-->
                                <!-- FORMULARIO ELECTRODOMESTICOS-->
                                <div class="box-formularios">
                                    <form method="POST" enctype="multipart/form-data" action="./apartado_product/registrar_producto.php">
                                        <h2>ELECTRODOMESTICOS</h2>
                                        <div class="container">
                                            <div class="content">
                                                <div class="box-img-product">
                                                    <img id="img-electrodomestico" src="../img/sinImagen.png" alt="">
                                                </div>
                                                <div class="box-input-file-product">
                                                    <label for="file-electrodomestico">Selecionar foto</label>
                                                    <input type="file" name="foto" id="file-electrodomestico">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtNombreArticulo" maxlength="50" id="int-name-electrodomestico" required>
                                                    <label for="int-name-articulo">Nombre del Articulo</label>
                                                    <p id="box-count-name-electrodomestico" >0 / 50</p>
                                                </div>
                                                <div class="box-textarea">
                                                    <textarea maxlength="230" name="txtDesArticulo" id="int-des-electrodomestico" placeholder="Descripcion" required></textarea>
                                                    <p id="box-count-des-electrodomestico">0 / 230</p>
                                                </div>
                                                <div class="box-input">
                                                    <input type="text" name="txtPrecioArticulo" id="int-precio-electrodomestico" required>
                                                    <label for="int-precio-electrodomestico">Precio</label>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtDescuentoArticulo" id="int-des-hogar" required>
                                                    <label for="int-des-articulo">Descuento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="txtCategoria" value="electrodomesticos">
                                        <button>
                                            Registrar
                                            <span></span>
                                        </button>
                                    </form>
                                </div>
                                <!-- FIN FORMULARIO ELECTRODOMESTICOS-->
                                <!-- FORMULARIO DE ELECTRONICO-->
                                <div class="box-formularios">
                                    <form method="POST" enctype="multipart/form-data" action="./apartado_product/registrar_producto.php">
                                        <h2>ELECTROICO</h2>
                                        <div class="container">
                                            <div class="content">
                                                <div class="box-img-product">
                                                    <img id="img-electronico" src="../img/sinImagen.png" alt="">
                                                </div>
                                                <div class="box-input-file-product">
                                                    <label for="file-electronico">Selecionar foto</label>
                                                    <input type="file" name="foto" id="file-electronico">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtNombreArticulo" maxlength="50" id="int-name-electronico" required>
                                                    <label for="int-name-articulo">Nombre del Articulo</label>
                                                    <p id="box-count-name-electronico" >0 / 50</p>
                                                </div>
                                                <div class="box-textarea">
                                                    <textarea maxlength="230" name="txtDesArticulo" id="int-des-electronico" placeholder="Descripcion" required></textarea>
                                                    <p id="box-count-des-electronico">0 / 230</p>
                                                </div>
                                                <div class="box-input">
                                                    <input type="text" name="txtPrecioArticulo" id="int-precio-electronico" required>
                                                    <label for="int-precio-electronico">Precio</label>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtDescuentoArticulo" id="int-des-hogar" required>
                                                    <label for="int-des-articulo">Descuento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="txtCategoria" value="electronico">
                                        <button>
                                            Registrar
                                            <span></span>
                                        </button>
                                    </form>
                                </div>
                                <!--FIN FORMULARIO DE ELECTRONICO-->
                                <!-- FORMULARIO DE ROPA-->
                                <div class="box-formularios">
                                    <form method="POST" enctype="multipart/form-data" action="./apartado_product/registrar_producto.php">
                                        <h2>ROPA</h2>
                                        <div class="container">
                                            <div class="content">
                                                <div class="box-img-product">
                                                    <img id="img-ropa" src="../img/sinImagen.png" alt="">
                                                </div>
                                                <div class="box-input-file-product">
                                                    <label for="file-ropa">Selecionar foto</label>
                                                    <input type="file" name="foto" id="file-ropa">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtNombreArticulo" maxlength="50" id="int-name-ropa" required>
                                                    <label for="int-name-ropa">Nombre del Articulo</label>
                                                    <p id="box-count-name-ropa" >0 / 50</p>
                                                </div>
                                                <div class="box-textarea">
                                                    <textarea maxlength="230" name="txtDesArticulo" id="int-des-ropa" placeholder="Descripcion" required></textarea>
                                                    <p id="box-count-des-ropa">0 / 230</p>
                                                </div>
                                                <div class="box-input">
                                                    <input type="text" name="txtPrecioArticulo" id="int-precio-ropa" required>
                                                    <label for="int-precio-ropa">Precio</label>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtDescuentoArticulo" id="int-des-ropa" required>
                                                    <label for="int-des-ropa">Descuento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="txtCategoria" value="ropa">
                                        <button>
                                            Registrar
                                            <span></span>
                                        </button>
                                    </form>
                                </div>
                                <!--FIN FORMULARIO DE ROPA-->
                                <!-- FORMULARIO DE BAÑO-->
                                <div class="box-formularios">
                                    <form method="POST" enctype="multipart/form-data" action="./apartado_product/registrar_producto.php">
                                        <h2>BAÑO</h2>
                                        <div class="container">
                                            <div class="content">
                                                <div class="box-img-product">
                                                    <img id="img-bano" src="../img/sinImagen.png" alt="">
                                                </div>
                                                <div class="box-input-file-product">
                                                    <label for="file-bano">Selecionar foto</label>
                                                    <input type="file" name="foto" id="file-bano">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtNombreArticulo" maxlength="50" id="int-name-bano" required>
                                                    <label for="int-name-bano">Nombre del Articulo</label>
                                                    <p id="box-count-name-bano" >0 / 50</p>
                                                </div>
                                                <div class="box-textarea">
                                                    <textarea maxlength="230" name="txtDesArticulo" id="int-des-bano" placeholder="Descripcion" required></textarea>
                                                    <p id="box-count-des-bano">0 / 230</p>
                                                </div>
                                                <div class="box-input">
                                                    <input type="text" name="txtPrecioArticulo" id="int-precio-hogar" required>
                                                    <label for="int-precio-articulo">Precio</label>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtDescuentoArticulo" id="int-des-hogar" required>
                                                    <label for="int-des-articulo">Descuento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="txtCategoria" value="baño">
                                        <button>
                                            Registrar
                                            <span></span>
                                        </button>
                                    </form>
                                </div>
                                <!--FIN FORMULARIO DE BAÑO-->
                                <!-- FORMULARIO DE MAQUILLAJE-->
                                <div class="box-formularios">
                                    <form method="POST" enctype="multipart/form-data" action="./apartado_product/registrar_producto.php">
                                        <h2>MAQUILLAJE</h2>
                                        <div class="container">
                                            <div class="content">
                                                <div class="box-img-product">
                                                    <img id="img-maquillaje" src="../img/sinImagen.png" alt="">
                                                </div>
                                                <div class="box-input-file-product">
                                                    <label for="file-maquillaje">Selecionar foto</label>
                                                    <input type="file" name="foto" id="file-maquillaje">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtNombreArticulo" maxlength="50" id="int-name-maquillaje" required>
                                                    <label for="int-name-maquillaje">Nombre del Articulo</label>
                                                    <p id="box-count-name-maquillaje" >0 / 50</p>
                                                </div>
                                                <div class="box-textarea">
                                                    <textarea maxlength="230" name="txtDesArticulo" id="int-des-maquillaje" placeholder="Descripcion" required></textarea>
                                                    <p id="box-count-des-maquillaje">0 / 230</p>
                                                </div>
                                                <div class="box-input">
                                                    <input type="text" name="txtPrecioArticulo" id="int-precio-maquillaje" required>
                                                    <label for="int-precio-maquillaje">Precio</label>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtDescuentoArticulo" id="int-des-maquillaje" required>
                                                    <label for="int-des-maquillaje">Descuento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" value="maquillaje" name="txtCategoria">
                                        <button>
                                            Registrar
                                            <span></span>
                                        </button>
                                    </form>
                                </div>
                                <!--FIN FORMULARIO DE MAQUILLAJE-->
                                <!-- FORMULARIO DE JUGUETES-->
                                <div class="box-formularios">
                                    <form method="POST" enctype="multipart/form-data" action="./apartado_product/registrar_producto.php">
                                        <h2>JUGUETES</h2>
                                        <div class="container">
                                            <div class="content">
                                                <div class="box-img-product">
                                                    <img id="img-juguetes" src="../img/sinImagen.png" alt="">
                                                </div>
                                                <div class="box-input-file-product">
                                                    <label for="file-juguetes">Selecionar foto</label>
                                                    <input type="file" name="foto" id="file-juguetes">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtNombreArticulo" maxlength="50" id="int-name-juguetes" required>
                                                    <label for="int-name-juguetes">Nombre del Articulo</label>
                                                    <p id="box-count-name-juguetes" >0 / 50</p>
                                                </div>
                                                <div class="box-textarea">
                                                    <textarea maxlength="230" name="txtDesArticulo" id="int-des-juguetes" placeholder="Descripcion" required></textarea>
                                                    <p id="box-count-des-juguetes">0 / 230</p>
                                                </div>
                                                <div class="box-input">
                                                    <input type="text" name="txtPrecioArticulo" id="int-precio-juguetes" required>
                                                    <label for="int-precio-juguetes">Precio</label>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtDescuentoArticulo" id="int-des-juguetes" required>
                                                    <label for="int-des-juguetes">Descuento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="txtCategoria" value="juguete">
                                        <button>
                                            Registrar
                                            <span></span>
                                        </button>
                                    </form>
                                </div>
                                <!--FIN FORMULARIO DE JUGUETES-->
                                <!-- FORMULARIO DE MUEBLES-->
                                <div class="box-formularios">
                                    <form method="POST" enctype="multipart/form-data" action="./apartado_product/registrar_producto.php">
                                        <h2>MUEBLES</h2>
                                        <div class="container">
                                            <div class="content">
                                                <div class="box-img-product">
                                                    <img id="img-muebles" src="../img/sinImagen.png" alt="">
                                                </div>
                                                <div class="box-input-file-product">
                                                    <label for="file-muebles">Selecionar foto</label>
                                                    <input type="file" name="foto" id="file-muebles">
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtNombreArticulo" maxlength="50" id="int-name-muebles" required>
                                                    <label for="int-name-muebles">Nombre del Articulo</label>
                                                    <p id="box-count-name-muebles" >0 / 50</p>
                                                </div>
                                                <div class="box-textarea">
                                                    <textarea maxlength="230" name="txtDesArticulo" id="int-des-muebles" placeholder="Descripcion" required></textarea>
                                                    <p id="box-count-des-muebles">0 / 230</p>
                                                </div>
                                                <div class="box-input">
                                                    <input type="text" name="txtPrecioArticulo" id="int-precio-muebles" required>
                                                    <label for="int-precio-muebles">Precio</label>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="box-input">
                                                    <input type="text" name="txtDescuentoArticulo" id="int-des-muebles" required>
                                                    <label for="int-des-muebles">Descuento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="txtCategoria" value="mueble">
                                        <button>
                                            Registrar
                                            <span></span>
                                        </button>
                                    </form>
                                </div>
                                <!--FIN FORMULARIO DE MUEBLES-->
                            </div>
                        </div>
                        <div class="box-labels">
                            <label for="radios-carosel-1">Hogar</label>
                        <label for="radios-carosel-2">Electrodomesticos</label>
                        <label for="radios-carosel-3">Electronico</label>
                        <label for="radios-carosel-4">Ropa</label>
                        <label for="radios-carosel-5">Baño</label>
                        <label for="radios-carosel-6">Maquillaje</label>
                        <label for="radios-carosel-7">Juguetes</label>
                        <label for="radios-carosel-8">Muebles</label>
                        </div>
                    </div>
                </div>
                <!--FIN DE SEGUNDA CAJA-->
        </div>
        <div class="box-reportes boxes">
            <h1 class="title-2">REPORTES</h1>
            <div class="box-reportes-1">
                <ul>
                    <li><a href="./apartado_reportes/reporte_admin.php"><i class="bi bi-filetype-pdf"></i>Reporte de Usuarios</a></li>
                    <li><a href="./apartado_reportes/reporte_hogar.php"><i class="bi bi-filetype-pdf"></i>Reporte de Productos(Hogar)</a></li>
                    <li><a href="#"><i class="bi bi-filetype-pdf"></i>Reporte de Productos(Electrodomesticos)</a></li>
                    <li><a href="#"><i class="bi bi-filetype-pdf"></i>Reporte de Productos(Electronico)</a></li>
                    <li><a href="#"><i class="bi bi-filetype-pdf"></i>Reporte de Productos(Ropa)</a></li>
                    <li><a href="#"><i class="bi bi-filetype-pdf"></i>Reporte de Productos(Baño)</a></li>
                    <li><a href="#"><i class="bi bi-filetype-pdf"></i>Reporte de Productos(Maquillaje)</a></li>
                    <li><a href="#"><i class="bi bi-filetype-pdf"></i>Reporte de Productos(Juguetes)</a></li>
                    <li><a href="#"><i class="bi bi-filetype-pdf"></i>Reporte de Productos(Muebles)</a></li>
                </ul>
            </div>
        </div>
    </div>


    <script src="admin-script.js"></script>
</body>
</html>