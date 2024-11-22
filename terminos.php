<?php
    include './php/conexion.php';
    
    session_start();
    $cuenta = 0;

    if(isset($_SESSION['correo'])){
        $cuenta = 1;
    }else{
        $cuenta = 0;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon Marcketing</title>
    <link rel="stylesheet" href="css/terminos-styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
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
@media(max-width: 600px){
    .navegacion .btn-regresar{
        left: 93%;
    }
}
@media(max-width: 448px){
    .navegacion .btn-regresar{
        left: 90%;
    }
}
@media(max-width: 740px){
    .navegacion .btn-regresar{
        top: 120%;
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
    </style>
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
                <a href="./carrito.php"><i class="fas fa-shopping-cart"></i></a>
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
            <a class="Ayuda" href="./Ayuda.html"><i class="bi bi-info-circle"></i>Ayuda</a>
            <a class="Preguntas" href=""><i class="bi bi-question-lg"></i>Preguntas</a>
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
        <a class="btn-regresar" href="index.php"><i class="bi bi-arrow-left"></i></a>

    </nav>

    <div class="menu">
        <h2>Menu</h2>
        <button id="cerrarMenu" onclick="cerrarMenu()">&times;</button>
        <ul class="ul-1-from-menu">
            <li><button onclick="abrirCategoriasDeMenu()"><i class="bi bi-list-ul"></i>Categorias</button></li>
            <li><a href="./carrito.php"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
            <li><button style="margin-left: -10px;" onclick="apaBusquedaFlotante()"><i class="bi bi-search"></i>Buscar</button></li>
            <li>
                <!--
                <?php
                    if($cuenta == 1){ ?>
                        <a class="cerrarS" href="./cuenta/cuenta.php"><i class="bi bi-person-fill"></i>Cuenta</a>
                    <?php }else{ ?>
                        <a class="cerrarS" href="./login.php"><i class="bi bi-person-fill"></i>Iniciar Sesion</a>
                    <?php }
                ?>
            -->
            <a class="cerrarS" href="./login.php"><i class="bi bi-person-fill"></i>Iniciar Sesion</a>
            </li>
        </ul>
        <ul class="ul-2-from-menu">
            <li><a href="../Ayuda.html"><i class="bi bi-info-circle"></i>Ayuda</a></li>
            <li><a href="#"><i class="bi bi-question-lg"></i>Preguntas</a></li>
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

    
    <div class="container">
        <section id="politicasDePrivacidad" class="box">
            <h2>Politicas De Privacidad</h2>
            <p>En Horizon Marcketing respetamos y protegemos tu privacidad. Esta Política de Privacidad describe cómo recopilamos, usamos, protegemos y compartimos la información personal que nos proporcionas cuando accedes a nuestros servicios y productos, ya sea a través de nuestro sitio web, aplicaciones móviles o cualquier otra plataforma de contacto. Al utilizar nuestros servicios, aceptas las prácticas descritas en esta política.</p>
            <br>
            <div class="lista">
                <h3>Informacion que recopilamos</h3>
                <ul>
                    <li><b>Información personal identificable</b>: Como tu nombre, dirección de correo electrónico, dirección de envío, entre otros, cuando te registras.</li>
                    <li><b>Información de pago</b>: Detalles necesarios para procesar pagos, como tu información de tarjeta de crédito, que son gestionados a través de plataformas seguras de terceros.</li>
                </ul>
            </div>
            <br>
            <h3>Contacto</h3>
            <p>Si tienes alguna pregunta sobre nuestra política de privacidad o sobre cómo tratamos tus datos personales, no dudes en contactarnos a través de:</p>
            <a class="btnGmail" href="mailto:soporte@Horizon.com">soporte@Horizon.com</a>
        </section>
        <section id="terminos" class="box">
            <h2>Terminos de uso</h2>
            <p>Los siguientes términos y condiciones (en adelante, los "Términos") rigen el acceso y uso de los servicios, productos, sitio web o plataforma (en adelante, el "Servicio") de Horizon Marcketing, con domicilio en Cuautitlan Izcalli. Al acceder o utilizar el Servicio, aceptas estar sujeto a estos Términos y a nuestra Política de Privacidad.</p>
            <br>
            <div class="lista">
                <ul>
                    <li><b>Aceptación de los Términos</b>: Al acceder, navegar o utilizar el Servicio, aceptas de manera expresa estos Términos y cualquier cambio que se realice en el futuro. Si no estás de acuerdo con los Términos, no utilices el Servicio.</li>
                    <li><b>Uso del Servicio</b>: El Servicio está disponible solo para personas mayores de 18 años. Al acceder o utilizar el Servicio, confirmas que tienes la edad mínima requerida o la autorización correspondiente de un adulto responsable.</li>
                    <li><b>Registro y Cuenta</b>: Para acceder a ciertos servicios, es posible que debas registrarte y crear una cuenta. Al hacerlo, te comprometes a proporcionar información precisa, actualizada y completa. La información de tu cuenta es tu responsabilidad y deberás mantenerla confidencial. Horizon Marcketing se reserva el derecho de suspender o cancelar cuentas si se sospecha que la información proporcionada es falsa, incorrecta o fraudulenta.</li>
                </ul>
            </div>
            <br>
            <h3>Contacto</h3>
            <p>Si tienes alguna pregunta sobre nuestra política de privacidad o sobre cómo tratamos tus datos personales, no dudes en contactarnos a través de:</p>
            <a class="btnGmail" href="mailto:soporte@Horizon.com">soporte@Horizon.com</a>
        </section>

        <section id="servicios" class="box">
            <h2>Servicios</h2>
            <p>En Horizon Marcketing, nos enorgullece ofrecer una experiencia de compra excepcional, brindando productos de alta calidad y servicios diseñados para hacer tu vida más fácil y conveniente. Nos esforzamos por ser tu tienda departamental de confianza, donde encuentras todo lo que necesitas bajo un mismo techo.</p>
            <br>
            <div class="lista">
                <ul>
                    <li><b>Venta de Productos de Calidad</b>:Contamos con una amplia gama de productos en diversas categorías, pensados para satisfacer las necesidades de toda la familia. Desde moda hasta tecnología, hogar, juguetes y más, siempre encontrarás algo que te encantará.</li>
                    <li><b>Compras en Línea y Entrega a Domicilio</b>: Sabemos lo importante que es tu tiempo, por eso ofrecemos un servicio de compras en línea fácil de usar, donde puedes adquirir todos nuestros productos desde la comodidad de tu hogar. Además, contamos con opciones de entrega a domicilio para que tu compra llegue directamente hasta tu puerta.</li>
                    <li><b>Servicio de Asesoría Personalizada: </b>Nuestro equipo de ventas está siempre listo para ayudarte a elegir los productos que mejor se adapten a tus necesidades. Ya sea que necesites consejos de moda, orientación sobre electrodomésticos o asistencia con productos tecnológicos, estamos aquí para ofrecerte una experiencia de compra personalizada.</li>
                    <li><b>Tarjeta de Fidelidad y Programas de Recompensas: </b>Disfruta de descuentos exclusivos y recompensas al registrarte en nuestro programa de fidelidad. Con nuestra tarjeta de fidelidad, acumulas puntos por cada compra que realices, los cuales puedes canjear por descuentos en futuras compras.</li>
                </ul>
            </div>
            <br>
            <h3>Contacto</h3>
            <p>Si tienes alguna pregunta sobre nuestra política de privacidad o sobre cómo tratamos tus datos personales, no dudes en contactarnos a través de:</p>
            <a class="btnGmail" href="mailto:soporte@Horizon.com">soporte@Horizon.com</a>
        </section>
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
                <li><a href="./Ayuda.html">Ayuda</a></li>
                <li><a href="#">Servicios</a></li>
            </ul>
        </div>
        <div class="politicas">
            <ul>
                <li><a href="./terminos.php#politicasDePrivacidad">Politicas de privacidad</a></li>
                <li><a href="./terminos.php#terminos">Terminos de uso</a></li>
                <li><a href="">Preguntas frecuentes</a></li>
            </ul>
        </div>
    </footer>
    <script src="js/terminos-script.js"></script>
    <script>
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
    </script>
</body>
</html>