<?php 

    session_start(); 
    include './php/conexion.php';
    $id_producto = $_GET['id']; 
    $cuenta = 0;

    if(isset($_SESSION['correo'])){
        $correo = $_SESSION['correo'];
        $sql = "SELECT id FROM usuarios WHERE correo = '$correo';";
        $ejecutar = $conexion -> query($sql);
        $datos = $ejecutar -> fetch_object();
        $id_usuario = $datos -> id;
        $cuenta = 1;
    }else{
        $cuenta = 0;
    }

    $sql = "SELECT * FROM productos WHERE id = '$id_producto'"; #selecciona todos los campos de la tabla productos cuando el id sea el "el id que se obtuvo con GET"
    $ejecutar = $conexion -> query($sql);#se ejecuta la consulta

    while($datos = $ejecutar -> fetch_object()){
            $sub_categoria = $datos -> sub_categoria;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HORIZON MARCKETING</title>
    <style>
        .box{
            position: relative;
            width: 50%;
           
            img{
                width: 100%;
            }

        }
        /* CSS DE BOTON */
        .navegacion .btn-regresar{
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 30px;
    background-color: black;
    border: 1px solid black;
    color: white;
    border-radius: 5px 0 0 5px;
    left: 10px;
    top: 200%;
    left: 96%;
}

@media(max-width: 980px){
    .navegacion .btn-regresar{
        left: 95%;
    }
}
@media(max-width: 760px){
    .navegacion .btn-regresar{
        left: 94%;
    }
}
@media(max-width: 720px){
    .navegacion .btn-regresar{
        top: 120%;
    }
}
@media(max-width: 550px){
    .navegacion .btn-regresar{
        left: 91%;
    }
}
/* CSS DE BOTON */
        #estrella{
            color: yellow;
            filter: drop-shadow(0 0 10px yellow);
        }
        .box-producto-img{
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
        }
        #btnAnadirCarrito{
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 35px;
            border: 1px solid;
            border-radius: 5px;
            cursor: pointer;
            background-color: royalblue;
            color: white;
        }
        #btnLabel{
            position: relative;
            width: 90%;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            border-radius: 5px;
            text-decoration: none;
            color: black;
            background-color: transparent;
            z-index: 50;
            overflow: hidden;
            transition: .3s;
            cursor: pointer;
        }
        #btnLabel:hover{
            background-color: black;
            color: white;
        }
        /* CSS DE PAGO */
        .container{
            position: fixed;
            top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background-color: rgba(0,0,0,.5);
            padding-top: 0px;
            opacity: 0;
            pointer-events: none;
            z-index: 999;
            transition: .3s;
        }
        .container.activo{
            opacity: 1;
            pointer-events: all
        }
        .container form{
          position: relative;
          padding:20px;/*para el espacioi que sobra en todos los bordes*/
          width: 720px; /*el ancho de los furmlarios*/ 
          background: #fff;
          height: 570px;
          overflow-y: auto;
          overflow-x: hidden;
          scrollbar-color: #aaa white;
          box-shadow: 0 5px 10px rgba(0,0,0,.1);
        }
        .container #btnCerrarPaga{
          position: absolute;
          display: flex;
          align-items: center;
          justify-content: center;
          left: 93%;
          top: 2%;
          width: 30px;
          height: 30px;
          background-color: white;
          border-radius: 50%;
          color: red;
          border: none;
          font-size: 22px;
          cursor: pointer;
          z-index: 999;
        }
        .container form .row{
          display: flex;/*para que se divida en 2 columnas*/
          flex-wrap: wrap;/*para que al recortar la pantalla se baje toda la columna*/
          gap:15px; /*espacio entre las columnas*/
        }

.container form .row .col{
  flex:1 1 200px;/*Es como para poner el ancho en el que se va a bajar la columna*/
}

.container form .row .col .title{
  font-size: 20px;
  color:#333;
  padding-bottom: 5px;
  text-transform: uppercase;/*hace que sean mayusuculas las letras*/
}

.container form .row .col .inputBox{
  margin:15px 0;
}

.container form .row .col .inputBox span{
  margin-bottom: 10px;
  display: block;
}

.container form .row .col .inputBox input{/*CAJA DE TEXTO*/
  width: 90%;
  border:1px solid #ccc;
  padding:10px 15px;
  font-size: 15px;
  text-transform: none;/*SE PUEDE USAR PARA PONER TODO EN MAYUSCULAS O MINUSCULAS*/
}

.container form .row .col .inputBox input:focus{/*para el borde si lepico a un campo*/
  border:1px solid #000;
}

.container form .row .col .flex{/*todos los que estan juntos clase cvv, año zip,estado*/
  display: flex;/*para que este al lado de el cvv*/
  gap:15px;/*espacio entre el año de expiracion y el cvv*/
}

.container form .row .col .flex .inputBox{
  margin-top: 5px;
}

.container form .row .col .inputBox img{
  height: 40px;
  margin-top: 5px;
  filter: drop-shadow(0 0 1px #000);/*como una sombra a la imagen*/
}

.container form .submit-btn{
  width: 100%; /*este hace que ocupe todo el ancho*/
  padding:12px;/*este le da ancho al boton*/
  font-size: 17px;
  background: #27ae60;
  color:#fff;
  margin-top: 5px;
  cursor: pointer;
}

.container form .submit-btn:hover{
  background: #2ecc71;
}

select{
  width: 300px;
  border:1px solid #ccc;
    padding: 12px 15px;
    background-color: #fff;
    outline: none;
    color: #666;
}
.input-quantity::-webkit-inner-spin-button,
.input-quantity::-webkit-outer-spin-button{
        -webkit-appearance: none;
        appearance: none;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
  padding-top: 60px;
}
.modal-content {
  background-color: #fefefe;
  margin: 5% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 500px;
  text-align: center;
}
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.modal-icon {
  font-size: 50px;
  color: green;
}
@media(max-width: 900px){
    .container form .row{
        flex-direction: column;
    }
    .inputBox select{
        width: 95%;
    }
}
@media(max-width: 570px){
  .container form #btnCerrarPaga{
    left: 90%;
  }
}
#resultados,
        #result{
            position: absolute;
            display: none;
            flex-direction: column;
            justify-content: center;
            background-color: white;
            top: 200%;
            border-radius: 10px;
            z-index: 999;
            width: 200px;
            height: auto;
            padding: 10px;
            color: black;

            a{
                color: black;
                padding: 10px;
                text-decoration: none;
            }
        }
        #result{
            display: none;
            width: 100%;
        }
        #input-nombre-usuarioo{
            pointer-events: none;
            border-color: red;
        }
        .icon-is , 
        .icon-cuenta{
                display: flex;
                color: white;
                font-size: 16px;
                gap: 10px;
                text-decoration: none;
        }
        @media(max-width: 740px){
            .box-cerrarsesion{
                display: none;
            }
        }
        .media-aviso,
        .media-carrito{
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,.5);
            z-index: 999;
            opacity: 0;
            pointer-events: none;
            transition: .3s;
        }
        .media-aviso.activo{
            pointer-events: all;
            opacity: 1;
        }
        .media-carrito.activo{
            pointer-events: all;
            opacity: 1;
        }
        .aviso{
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: caja;
            width: 300px;
            height: 250px;
            background-color: white;
            border-radius: 10px;
            color: black;
            padding: 10px;

            a{
                color: royalblue;
            }

        }
        .aviso button{
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            border: 1px solid royalblue;
            border-radius: 10px;
            cursor: pointer;
            width: 90%;
            height: 30px;
            background-color: white;
            transition: .2s;
            top: 85%;
        }
        .aviso button:hover{
            background-color: royalblue;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="css/producto_indiv-styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <nav class="navegacion">
        <div class="logo">
            <img src="img/logo.jpg" alt="">
        </div>
        <div class="box-buscador">
            <input type="search" id="inp-buscador" placeholder="Buscar..." required>
            <label for="inp-buscador"><i class="bi bi-search"></i></label>
            <div id="resultados"></div>
        </div>
        <div class="navegacion-box">
            <div class="carrito">
                <a href="./carrito.php"><i class="bi bi-cart-fill"></i></a>
            </div>
            <div class="box-cerrarsesion">
                <?php
                    if($cuenta == 1){ ?>
                        <a class="icon-cuenta" href="./cuenta/cuenta.php"><i class="bi bi-person-fill"></i></a>
                    <?php }else{ ?>
                        <a class="icon-is" href="./login.php">Iniciar Sesion<i class="bi bi-person-fill"></i></a>
                    <?php  }
                ?>
            </div>
            <div class="btn-menu">
                <button onclick="abrirMenu()"><i class="bi bi-list"></i></button>
            </div>
        </div>
        <div class="nav-1">
            <a class="btn-verCategoria" href=""><i class="bi bi-list-ul"></i>Categorias</a>
            <a class="Ayuda" style="position: relative; left: -30px;" href="./Ayuda.php"><i class="bi bi-info-circle"></i>Ayuda</a>
            <div class="categorias">
                <div class="box-categoria">
                    <a href="./categorias/casa.php">
                        <img src="img/casa.png">
                        <h4>Hogar</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/electronico.php">
                        <img src="img/electronico.png">
                        <h4>Electronico</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/ropa.php">
                        <img src="img/ropa.png">
                        <h4>Ropa</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/Baño.php">
                        <img src="img/baño.png">
                        <h4>Baño</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/maquillaje.php">
                        <img src="img/maquillage.png">
                        <h4>Maquillaje</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/juguetes.php">
                        <img src="img/jugetes.png">
                        <h4>Juguetes</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/muebles.php">
                        <img src="img/muebles.png">
                        <h4>Muebles</h4>
                    </a>
                </div>
                <div class="box-categoria">
                    <a href="./categorias/electrodomesticos.php">
                        <img src="img/electrodomesticos.png">
                        <h4>Electrodomesticos</h4>
                    </a>
                </div>
            </div>
        </div>
        <a class="btn-regresar" href="./index.php"><i class="bi bi-arrow-left"></i></a>
    </nav>

    <div class="menu">
        <h2>Menu</h2>
        <button id="cerrarMenu" onclick="cerrarMenu()">&times;</button>
        <ul class="ul-1-from-menu">
            <li><button style="margin-left: -5px;" onclick="abrirCategoriasDeMenu()"><i class="bi bi-list-ul"></i>Categorias</button></li>
            <li><a href="./carrito.php"><i class="bi bi-cart-fill"></i>Carrito</a></li>
            <li><button style="margin-left: -5px;" onclick="apaBusquedaFlotante()"><i class="bi bi-search"></i>Buscar</button></li>
            <li>
                <?php
                    if($cuenta == 1){ ?>
                        <a class="cerrarS" href="./cuenta/cuenta.php"><i class="bi bi-person-fill"></i>Cuenta</a>
                    <?php }else{ ?>
                        <a class="cerrarS" href="./login.php"><i class="bi bi-person-fill"></i>Iniciar Sesion</a>
                    <?php }
                ?>
            </li>
        </ul>
        <ul class="ul-2-from-menu">
            <li><a href="./Ayuda.php"><i class="bi bi-info-circle"></i>Ayuda</a></li>
        </ul>
    </div>

    <div class="busqueda-from-menu">
        <div class="box-btn">
            <button id="desBusquedaFlotante" onclick="desBusquedaFlotante()"> &times;</button>
        </div>
        <h2>Buscador</h2>
        <p>Ingresa el articulo que quieres buscar.</p>
        <div class="box-inp-busqueda">
            <label for=""><i class="bi bi-search"></i></label>
            <input type="text" id="input-buscar-menu" placeholder="Buscar...">
            <div id="result"></div>
        </div>
    </div>

    <div class="categorias-form-menu">
        <h2>Categorias</h2>
        <button onclick="cerrarCategoriasDeMenu()">&times;</button>
        <ul>
            <li>
                <a href="./categorias/casa.php">
                    <img src="img/casa.png" alt="">
                    <h4>Hogar</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/electronico.php">
                    <img src="img/electronico.png" alt="">
                    <h4>Electronico</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/ropa.php">
                    <img src="img/ropa.png" alt="">
                    <h4>Ropa</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/Baño.php">
                    <img src="img/baño.png" alt="">
                    <h4>Baño</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/maquillaje.php">
                    <img src="img/maquillage.png" alt="">
                    <h4>Maquillaje</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/juguetes.php">
                    <img src="img/jugetes.png" alt="">
                    <h4>Juguetes</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/muebles.php">
                    <img src="img/muebles.png" alt="">
                    <h4>Muebles</h4>
                </a>
            </li>
            <li>
                <a href="./categorias/electrodomesticos.php">
                    <img src="img/electrodomesticos.png" alt="">
                    <h4>Electrodomesticos</h4>
                </a>
            </li>
        </ul>
    </div>

    <div class="media">
        <div class="media-2">
            <div class="box">
                <?php
                    
                    include './php/conexion.php';
                    #se genera la consulta para porder obtener la foto de la imagen 
                    $sql = "SELECT id FROM productos WHERE id = '$id_producto'"; #selecciona el id del producto
                    #se ejecuta la conexion
                    $ejecutar = $conexion -> query($sql);

                    while($datos = $ejecutar -> fetch_object()){
                        #muestra la imagen
                        echo ' 
                        <div class="box-img">
                            <img src="./productos/mos.php?id= ' . htmlspecialchars($datos -> id, ENT_QUOTES) . ' " alt="">
                        </div>
                    ';
                    }

                ?>
            </div>
            <div class="box">
                <div class="box-info">
                <?php
                    
                    include './php/conexion.php';
                    #genera la consulta para obtener la informacion de todas las entidades del producto
                    $sql = "SELECT * FROM productos WHERE id = '$id_producto'"; #selecciona todos los campos de la tabla productos cuando el id sea el "el id que se obtuvo con GET"
                    $ejecutar = $conexion -> query($sql);#se ejecuta la consulta

                    while($datos = $ejecutar -> fetch_object()){
                            $sub_categoria = $datos -> sub_categoria; #se obtiene la subcatgoria del producto para despues usarla
                        ?>
                        <h3><?php echo ucwords($datos -> nombre) ?></h3> <!-- Se pone en mayusculas la primera letra del nombre del producto -->
                        <p><?= $datos -> descripcion ?></p> <!-- Se obtine la descripcion del producto -->
                        <p><b>Color: </b><?php echo ucwords($datos -> color) ?></p> <!-- Se obtine el color del producto -->
                        <p><b>Marca: </b><?php echo ucwords($datos -> marca) ?></p> <!-- Se obtine la marca -->
                        <div class="box-puntuacion">
                            <?php
                                $sql_cant = "SELECT ROUND(SUM(estrellas) / COUNT(*)) AS promedio_cantidad FROM comentarios WHERE id_producto = '$id_producto';";
                                $ejecutar_cant = $conexion -> query($sql_cant);
                                $datos_cant = $ejecutar_cant -> fetch_object();
                               if($datos_cant -> promedio_cantidad > 0){
                                echo '<p id="num-pun"> ' . $datos_cant -> promedio_cantidad . ' </p> <!-- Puntuacion de las estrellas -->';
                                switch($datos_cant -> promedio_cantidad){
                                    case 1: ?>
                                        <div class="estrellas">
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                        </div>
                                        <?php break;
                                    case 2: ?>
                                        <div class="estrellas">
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                        </div>
                                        <?php break;
                                    case 3: ?>
                                        <div class="estrellas">
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                        </div>
                                        <?php break;
                                    case 4: ?>
                                        <div class="estrellas">
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star"></i></p>
                                        </div>
                                        <?php break;
                                    case 5: ?>
                                        <div class="estrellas">
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                            <p><i class="bi bi-star-fill"></i></p>
                                        </div>
                                        <?php break;
                                }
                               }else{
                                echo '<p id="num-pun">No hay puntuacion</p>';
                               }
                            ?>
                        </div>
                        <?php

                            if($datos -> intereses != "n / a"){ ?> <!-- Si lo que contiene intereses es diferente a "n / a" -->
                                <div class="box-meses">
                                    <p><?= $datos -> intereses ?></p> <!-- Se muestran los intereses --> 
                                </div>
                            <?php } #Si no tuviera intereses no se mostrarian
                            
                        ?>
                        <div class="box-precio-2">
                            <?php
                                if($datos -> descuento != "n / a"){ ?> <!-- Si lo que contiene intereses es diferente a "n / a" -->
                                    <label>Precio $<?= $datos -> precio - (($datos -> precio * $datos -> descuento) / 100) ?></label> <!-- Operacion para sar el precio con descuento -->
                                    <p class="p-precio-sin">$<?= $datos -> precio  ?></p> <!-- Se obtiene precio sin descuento -->
                                    <p class="p-descuento"><?= $datos -> descuento ?>% de descuento</p> <!-- Se obtiene el mumero de descuento -->
                                <?php } else { ?>
                                    <label>Precio $<?= $datos -> precio ?></label> <!-- Si no tuviera descuento solo se mustra el precio -->
                                <?php }
                            ?>  
                        </div>
                    </div>
                    <?php }

                ?>
            </div>
        </div>

        <div class="box-2">
            <div class="box-info-2">
                <span></span>
                <form style="margin-top: 50px;" class="bx" action="./php/anadirCarroProductoIndiv.php" method="POST">
                    <?php

                        include './php/conexion.php';
                                
                        #se genera la consulta para obtener el producto con el id
                        $sql = "SELECT * FROM productos WHERE id = '$id_producto'";
                        #se ejecuta la consulta
                        $ejecutar = $conexion -> query($sql);

                        while ($datos = $ejecutar -> fetch_object()){ ?>
                            <!-- Se le inserta los valores del producto desde que hay en bd -->
                            <input type="hidden" name="txtidUsuario" value="<?= $id_usuario ?>" required>
                            <input type="hidden" name="txtidProducto" value="<?= $datos -> id ?>" required>
                        <?php }
                    ?>  
                    <!-- Cuando da click se mandan los datos al carrito -->
                    <?php
                        if($cuenta == 1){ ?>
                            <button id="btnAnadirCarrito" type="submit">Añadir al carrito</button>
                        <?php } else { ?>
                            <label class="btnAnadirCarritoall" id="btnAnadirCarrito">Añadir al carrito</label>
                        <?php }
                    ?>
                </form>
                <div class="bx">
                    <button class="btnAnadirCarritoall" id="btnComprar">Comprar</button>
                </div>
                <div class="box-datos">
                    <p>Enviado desde <b>Horizon Marcketing</b></p>
                </div>
            </div>
            <div class="box-ofrecimientos">
                <div class="card">
                    <div class="box-ofrecimiento-img">
                        <img src="img/ofrecimientos/entrega.png" alt="">
                    </div>
                    <h3>Enviado por Horizon Marcketing</h3>
                    <p>Todos nuestros productos son enviados desde Horizon Marcketing</p>
                </div>
                <div class="card">
                    <div class="box-ofrecimiento-img">
                        <img src="img/ofrecimientos/seguridadDeEntrega.png" alt="">
                    </div>
                    <h3>Seguridad en el envio</h3>
                    <p>Un envío seguro es esencial para una experiencia de compra en línea satisfactoria.</p>
                </div>
            </div>
        </div>
        <div class="box-3">
            <h2>Productos Relacionados</h2>
            <div class="productos">
                <?php

                    #se genera la consulta para mostrar los producto de la misma subcategoria del producto inicial
                    $sql = "SELECT * FROM productos WHERE sub_categoria = '$sub_categoria'";
                    #se ejecuta la consulta
                    $ejecutar = $conexion -> query($sql);

                    while($datos = $ejecutar -> fetch_object()){
                        #Si el id del producto es igual al id del producto inicial, no se muestra
                        if($datos -> id != $id_producto ){ ?>
                            <form class="producto product">
                            <div class="box-producto-img">
                                <?php #se muestra la imagen del producto
                                    echo '
                                        <img src="./productos/mos.php?id='. htmlspecialchars($datos -> id , ENT_QUOTES) .'" alt="">
                                    ';
                                ?>
                            </div>
                            <!-- Se muestra el nombre del producto -->
                            <h3><marquee><?= $datos -> nombre ?></marquee></h3>
                            <div class="box-precio">
                            <!-- Se  muestra el precio del producto -->
                                <p>Precio: $<?= $datos -> precio ?></p>
                                <?php #si el descuento es diferente de n / a se muestra
                                    if($datos -> descuento != "n / a"){ ?>
                                        <p class="des"><?= $datos -> descuento ?>% de descuento</p>
                                    <?php }
                                ?>  
                            </div>
                            <div class="box-btn"> <!-- Se manda el id del producto al archivo producto_indiv.php por la url -->
                                <a href="./producto_indiv.php?id=<?= $datos -> id ?>">Ver mas <span></span></a>
                                <?php
                                    if($cuenta == 1){ ?>
                                        <button>Añadir al carrito</button>
                                    <?php } else { ?>
                                        <label class="btnsAnadir" id="btnLabel">Añadir al carrito</label>
                                    <?php }
                                ?>
                            </div>
                        </form>
                        <?php }
                        
                    }

                ?>
            </div>
        </div>
        <div class="box-4">
            <div class="box-coment-calif">
                <form method="POST" action="./php/registrar_comentario.php" class="box-img-user">
                    <h2>Escribe tu comentario</h2>
                    <div class="box-flex">
                        <?php

                            if($cuenta == 1){
                                #se muestra los datos del registro del usuario que esta en sesion
                            $sql = "SELECT id , foto , usuario FROM usuarios WHERE id = '$id_usuario'";
                            #se ejecuta la consulta
                            $ejecutar = $conexion -> query($sql);

                            while($datos = $ejecutar -> fetch_object()){
                                
                                #si la entidad esta vacia se muestra una imagen preterminada
                                if($datos -> foto == NULL){ ?>
                                    <div class="box-user">
                                        <img src="./img/usuarioSinFoto.png" alt="">
                                    </div>
                                <?php } else { #si no esta vacia muestra la foto del usuario
                                    echo '
                                        <div class="box-user">
                                            <img src="./php/mostrar_foto_usu.php?id=' . htmlspecialchars($datos -> id, ENT_QUOTES) . ' " alt="">
                                        </div>
                                    ';
                                }

                            ?>                            
                            <div class="box-inp">
                                <label>Usuario:</label>
                                <!-- Muestra el usuario del usuario -->
                                <input type="text" style="pointer-events: none;" id="input-nombre-usuarioo" name="txtUsuario" value="<?= $datos -> usuario ?>">
                            </div>

                            <?php }
                            }else { ?>
                                
                                <div class="box-user">
                                    <img src="./img/usuarioSinFoto.png" alt="">
                                </div>
                                

                                                       
                            <div class="box-inp">
                                <label>Usuario:</label>
                                <!-- Muestra el usuario del usuario -->
                                <input type="text" style="pointer-events: none;" name="txtUsuario" value="">
                            </div>

                            <?php }
                            

                        ?>
                    </div>
                    <div class="box-textarea">
                        <textarea name="txtComentario" id="text-coment" maxlength="230" placeholder="Escriba comentario..."></textarea>
                        <p id="box-letras">0 / 230</p> <!-- Caja de comentario -->
                    </div>
                    <div style="top: -70px;" class="box-calif-stars">
                        <h3>Calificar</h3>
                        <div class="box-stars">
                            <input type="radio" value="1" name="radios" id="star-1" required> <!-- Input radio para poder mandar el numero elegido de estrellas -->
                            <input type="radio" value="2" name="radios" id="star-2" required>
                            <input type="radio" value="3" name="radios" id="star-3" required>
                            <input type="radio" value="4" name="radios" id="star-4" required>
                            <input type="radio" value="5" name="radios" id="star-5" required>

                            <label class="lb-star-1" for="star-1"><i class="bi bi-star-fill"></i></i></label> <!-- Estrellas -->
                            <label class="lb-star-2" for="star-2"><i class="bi bi-star-fill"></i></label>
                            <label class="lb-star-3" for="star-3"><i class="bi bi-star-fill"></i></label>
                            <label class="lb-star-4" for="star-4"><i class="bi bi-star-fill"></i></label>
                            <label class="lb-star-5" for="star-5"><i class="bi bi-star-fill"></i></label>
                        </div>
                    </div>
                    <input type="hidden" name="txtIdProducto" value="<?= $id_producto ?>">
                    <!-- se manda el id del producto  -->
                    <?php
                        if($cuenta == 1){ ?>
                            <button style="top: -50px;" id="btnEnviarComen">Enviar 
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                         </button>
                        <?php }else { ?>
                            <label onclick="avisoComentario()" style="top: -50px; display: flex; align-items: center; justify-content: center;" id="btnEnviarComen">
                                Enviar
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </label>
                        <?php }
                    ?>
                </form>
                <div class="box-comentarios">
                    <?php
                        include './php/conexion.php';
                        #se genera la consulta para obtener la foto , el nombre de usuario, el comentario y las estrellas de los comentario
                        $sql = "SELECT T.id, T.foto, T.usuario, P.usuario, P.comentario, P.estrellas FROM `comentarios` P INNER JOIN `usuarios` T WHERE T.usuario = P.usuario AND P.id_producto = '$id_producto'";
                        $ejecutar = $conexion -> query($sql);

                        while($datos = $ejecutar -> fetch_object()){ ?>

                        <div class="comentario">
                            <div class="nombre-user">
                                <div class="img-user">
                                    <?php

                                        if($datos -> foto == NULL){ ?> <!-- Se verifica si no tiene nada la entidad de foto -->
                                            <img src="./img/usuarioSinFoto.png" alt=""> <!-- Se muestra una imagen por preterminada -->
                                        <?php } else { 
                                            #si no esta vacio se muetra la foto del usuario
                                            echo '
                                                <img src="./php/mostrar_foto_usu.php?id= ' . htmlspecialchars($datos -> id , ENT_QUOTES) . ' " alt="">
                                            ';
                                        }

                                    ?>
                                </div>
                                <h3><?= $datos -> usuario ?></h3> <!-- Se muestra el nombre de usuario -->
                            </div>
                            <p><?= $datos -> comentario ?></p> <!-- Se muestra el comentario -->
                            <div style="margin-left: 10px;" class="box-stars">
                                <?php

                                    switch($datos -> estrellas){ #se usa el switch dependiendo del numero de estrellas
                                        case 1:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                            <?php
                                        break;
                                        case 2:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                            <?php
                                        break;
                                        case 3:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                                <i class="bi bi-star"></i>
                                            <?php
                                        break;
                                        case 4:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i class="bi bi-star"></i>
                                            <?php
                                        break;
                                        case 5:
                                            ?>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                                <i id="estrella" class="bi bi-star-fill"></i>
                                            <?php
                                        break;
                                        }


                                ?>
                            </div>
                        </div>

                        <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="box-3 box-productos-2">
            <h2>Otros productos</h2>
            <div class="productos">
                <?php
                #se genera una consulta donde se eliga una subcategoria al azar
                $sql_1 = "SELECT sub_categoria FROM categorias ORDER BY RAND() LIMIT 1;";
                #se ejecuta la consulta
                $ejecutar_1 = $conexion -> query($sql_1);

                $datos_1 = $ejecutar_1 -> fetch_object();
                $subCategoriaSql = $datos_1 -> sub_categoria; #la subcategoria elegida se guarda en una variable

                #se seleciona todos las entidades de productos cuando la categoria sea la que se eligio al azar
                $sql = "SELECT * FROM productos WHERE sub_categoria = '$subCategoriaSql'";
                #se ejecuta la consulta
                $ejecutar = $conexion -> query($sql);
                                    
                while($datos = $ejecutar -> fetch_object()){
                    if($datos -> id != $id_producto ){ ?> <!-- Si el id del producto es diferente al del producto inicial -->
                        <div class="producto product">
                        <div class="box-producto-img">
                            <?php
                                #se muestra la imagen del producto
                                echo '
                                    <img src="./productos/mos.php?id='. htmlspecialchars($datos -> id , ENT_QUOTES) .'" alt="">
                                ';
                            ?>
                        </div>
                        <!-- Se muestra el nombre del producto -->
                        <marquee><h3><?= $datos -> nombre ?></h3></marquee>
                        <div class="box-precio">
                            <!-- Se muestra el precio -->
                            <p>Precio: $<?= $datos -> precio ?></p>
                            <?php
                                if($datos -> descuento != "n / a"){ ?> <!-- Si el descuento es diferente a n / a -->
                                    <p class="des"><?= $datos -> descuento ?>% de descuento</p> <!-- Se muestra el descuento -->
                                <?php }
                            ?>  
                        </div>
                        <div class="box-btn"> <!-- Se manda el id del producto por el link -->
                            <a href="./producto_indiv.php?id=<?= $datos -> id ?>">Ver mas <span></span></a>
                            <?php
                                    if($cuenta == 1){ ?>
                                        <button>Añadir al carrito</button>
                                    <?php } else { ?>
                                        <label class="btnsAnadir" id="btnLabel">Añadir al carrito</label>
                                    <?php }
                                ?>
                        </div>
                    </div>
                <?php }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="./php/pagar_producto.php" method="POST" id="orderForm">
            <span id="btnCerrarPaga" onclick="btnCerrarPaga()">&times;</span>
            <div class="row">
                <div class="col">
                    <h3 class="title">Dirección de envio</h3>
                    <input type="hidden" name="txtid" value="<?= $id_usuario ?>">
                    <div class="inputBox">
                        <span>Nombre Completo:</span>
                        <input required type="text" name="nombreCompleto" id="nombreCompleto" placeholder="Ingrese nombre completo">
                    </div>
                    <div class="inputBox">
                        <span>Correo:</span>
                        <input required type="email" name="correo" id="correo" placeholder="Ingrese correo">
                    </div>
                    <div class="inputBox">
                        <span>Dirección :</span>
                        <input required type="text" name="direccion" id="direccion" placeholder="Ingrese dirección">
                    </div>
                    <div class="inputBox">
                        <span>Ciudad :</span>
                        <select required name="ciudad" id="ciudad">
                            <option disabled selected value="">Seleccione una ciudad</option>
                            <option value="Estado de Mexico">Estado de Mexico</option>
                            <option value="Ciudad de Mexico">Ciudad de Mexico</option>
                            <option value="Cuautitlan Izcalli">Cuautitlan Izcalli</option>    
                            <option value="Monterrey">Monterrey</option>    
                        </select>
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>Codigo postal:</span>
                            <input required type="number" name="codigoPostal" min="1" id="codigoPostal" class="input-quantity" placeholder="Ingrese codigo postal">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h3 class="title">pago</h3>
                    <div class="inputBox">
                        <span>tarjetas validas :</span>
                        <img width="100px" src="./img/targetas/bbva.png" alt="">
                        <img width="100px" src="./img/targetas/bankName.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>nombre en tarjeta :</span>
                        <input required type="text" id="nombreTarjeta" name="nombreTarjeta" placeholder="Ingrese nombre en tarjeta">
                    </div>
                    <div class="inputBox">
                        <span>numeros de la tarjeta:</span>
                        <input required type="number" maxlength="16" id="numeroTarjeta" name="numeroTarjeta" class="input-quantity" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>Fecha de vencimiento</span>
                        <input required type="text" id="fechaVencimiento" name="fechaVencimiento" placeholder="MM/AA">
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>Codigo de seguridad:</span>
                            <input required type="number" id="cvv" class="input-quantity" placeholder="CVV">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="txtidproducto" value="<?= $id_producto ?>">
            <input type="submit" value="Aceptar" class="submit-btn">
        </form>
    </div>

    <div class="media-aviso">
        <div class="aviso">
            <h2>Tienes una cuenta?</h2>
            <p>Si quieres publicar un comentario debes de <a href="./login.php">iniciar sesion</a> y si no tienes una cuenta debes de <a href="./registrar.php">registrarte</a></p>
            <button onclick="closeAvisoComentario()">Ok</button>
        </div>
    </div>
    <div class="media-carrito">
        <div class="aviso">
            <h2>Tienes una cuenta?</h2>
            <p>Si quieres añadir al carrto o comprar un producto debes de <a href="./login.php">iniciar sesion</a> y si no tienes una cuenta debes de <a href="./registrar.php">registrarte</a></p>
            <button class="btnCerraAviso">Ok</button>
        </div>
    </div>

    <footer>
        <div class="redes">
            <h3>Redes Sociales</h3>
            <ul>
                <li>
                <a target="_blanck" class="btn-ins" href="https://www.instagram.com/programmers._.123?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                    
                        <i class="bi bi-instagram"></i>
                        <span>Instagram</span>
                    </a>
                </li>
                <li>
                    <a class="btn-face" href="#">
                        <i class="bi bi-facebook"></i>
                        <span>Facebook</span>
                    </a>
                </li>
                <li>
                    <a class="btn-x" href="#">
                        <i class="bi bi-twitter-x"></i>
                        <span>Twitter</span>
                    </a>
                </li>
                <li>
                    <a class="btn-tiktok" href="#">
                        <i class="bi bi-tiktok"></i>
                        <span>TikTok</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="atencionCliente">
            <h2>Atencion al Cliente</h2>
            <ul>
                <li><a href="./Ayuda.php">Ayuda</a></li>
                <li><a href="./terminos.php#servicios">Servicios</a></li>
            </ul>
        </div>
        <div class="politicas">
            <ul>
                <li><a href="./terminos.php#politicasDePrivacidad">Politicas de privacidad</a></li>
                <li><a href="./terminos.php#terminos">Terminos de uso</a></li>
            </ul>
        </div>
    </footer>

    <script src="./js/producto_indiv-script.js"></script>
    <script>

        const textarea =document.getElementById("text-coment"); 
        const box =document.getElementById('box-letras');

        textarea.addEventListener('keyup', contarLetras); //Mientras se escribe en la caja de comentario va hacer lo siguiente

        function contarLetras(){ //La funcion de cuando esta escribiedo

            let cantLetras = textarea.value.length; //Se van contando las letras
            box.innerHTML = `${cantLetras} / 230`; //Se muestra el total del letra

        }
        const container = document.querySelector('.container');
        function comprarAlert(){
            container.classList.add("activo");
        }
        function btnCerrarPaga(){
            container.classList.remove("activo");
        }

        const search = document.getElementById('inp-buscador');
        search.addEventListener('keyup', buscar);
        const resultados =document.getElementById('resultados');
        let lista = [
        <?php
            $sql = "SELECT id , nombre FROM productos";
            $ejecutar = $conexion -> query($sql);

            while($datos = $ejecutar -> fetch_object()){ ?>
                "<?= $datos -> nombre ?>",
            <?php }
        ?>
        ];
        let link = {
        <?php
            $sql = "SELECT id, nombre FROM productos";
            $ejecutar = $conexion -> query($sql);

            while($datos = $ejecutar -> fetch_object()){ ?>
                "<?= $datos -> nombre ?>" : "<?= $datos -> id ?>",
            <?php }
        ?>
        };
        function buscar(){
            let buscardor = search.value;
            let i = 0;
            let result = [];
            let resultLinks = [];
            resultados.innerHTML = '';

            for(i=0; i<lista.length; i++){
                if(lista[i].toLowerCase().includes(buscardor.toLowerCase())){
                    result.push(lista[i]);
                    resultLinks.push(i);
                }
            }
            if(result.length > 0){
                for(i=0; i<lista.length; i++){
                    const a = document.createElement('a');
                    a.textContent = result[i];
                    a.href = './producto_indiv.php?id=' + link[result[i]];

                    if(link[result[i]] != null){
                        resultados.appendChild(a);
                    }
                    
                }
            }else{
                resultados.textContent = 'Sin resultados';
            }
            if(buscardor == ''){
                resultados.style.display = 'none';
            }else{
                resultados.style.display = 'flex';
            }

        }
        //input-buscar-menu
        const search_menu = document.getElementById('input-buscar-menu');
        search_menu.addEventListener('keyup', buscar_menu);
        const resultados_menu =document.getElementById('result');
        let lista_menu = [
        <?php
            $sql = "SELECT id , nombre FROM productos";
            $ejecutar = $conexion -> query($sql);

            while($datos = $ejecutar -> fetch_object()){ ?>
                "<?= $datos -> nombre ?>",
            <?php }
        ?>
        ];
        let link_menu = {
        <?php
            $sql = "SELECT id, nombre FROM productos";
            $ejecutar = $conexion -> query($sql);

            while($datos = $ejecutar -> fetch_object()){ ?>
                "<?= $datos -> nombre ?>" : "<?= $datos -> id ?>",
            <?php }
        ?>
        };
        function buscar_menu(){
            let buscardor = search_menu.value;
            let i = 0;
            let result = [];
            let resultLinks = [];
            resultados_menu.innerHTML = '';

            for(i=0; i<lista_menu.length; i++){
                if(lista_menu[i].toLowerCase().includes(buscardor.toLowerCase())){
                    result.push(lista_menu[i]);
                    resultLinks.push(i);
                }
            }
            if(result.length > 0){
                for(i=0; i<lista.length; i++){
                    const a = document.createElement('a');
                    a.textContent = result[i];
                    a.href = './producto_indiv.php?id=' + link_menu[result[i]];

                    if(link_menu[result[i]] != null){
                        resultados_menu.appendChild(a);
                    }
                    
                }
            }else{
                resultados_menu.textContent = 'Sin resultados';
            }
            if(buscardor == ''){
                resultados_menu.style.display = 'none';
            }else{
                resultados_menu.style.display = 'flex';
            }

        }
        const media_aviso =document.querySelector('.media-aviso');
        function avisoComentario(){
            media_aviso.classList.add("activo");
        }
        function closeAvisoComentario(){
            media_aviso.classList.remove("activo");
        }

        const avisoCarrito = document.querySelector('.media-carrito');
        const btnAnadirCarritoall = document.querySelectorAll('.btnAnadirCarritoall');
        const btnCerraAviso = document.querySelectorAll('.btnCerraAviso');

        btnAnadirCarritoall.forEach( (element, i) => {
            element.addEventListener('click', () => {
                if(i == 0){
                    avisoCarrito.classList.add("activo");
                }else if(i == 1){
                    avisoCarrito.classList.add("activo");
                }
            });
        });

        btnCerraAviso.forEach((element , i) => {
            element.addEventListener('click', () => {
                if(i == 0){
                    avisoCarrito.classList.remove("activo");
                }else if(i == 1){
                    avisoCarrito.classList.remove("activo");
                }
            });
        });
        const btnsAnadir =document.querySelectorAll('.btnsAnadir');
        btnsAnadir.forEach((element) => {
            element.addEventListener('click', funcion);

        function funcion(){
            media_aviso.classList.add("activo");
        }
        });
    </script>
</body>
</html>