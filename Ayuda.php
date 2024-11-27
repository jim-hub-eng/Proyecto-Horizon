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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOGAR</title>
    <link rel="stylesheet" href="css/Ayuda.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
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
            <li><?php
                    if($cuenta == 1){ ?>
                        <a class="cerrarS" href="./cuenta/cuenta.php"><i class="bi bi-person-fill"></i>Cuenta</a>
                    <?php }else{ ?>
                        <a class="cerrarS" href="./login.php"><i class="bi bi-person-fill"></i>Iniciar Sesion</a>
                    <?php }
                ?></li>
            <li><a href="../carrito.html"><i class="fas fa-shopping-cart"></i>Carrito</a></li>
            <li><button onclick="apaBusquedaFlotante()"><i class="bi bi-search"></i>Buscar</button></li>
        </ul>
        <ul class="ul-2-from-menu">
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
                <a href="../categorias/casa.html">
                    <img src="../img/casa.png" alt="">
                    <h4>Hogar</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/electrodomesticos.png" alt="">
                    <h4>Electrodomesticos</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/ropa.png" alt="">
                    <h4>Ropa</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/baño.png" alt="">
                    <h4>Baño</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/maquillage.png" alt="">
                    <h4>Maquillage</h4>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="../img/jugetes.png" alt="">
                    <h4>Juguetes</h4>
                </a>
            </li>
            <li>
                <a href="../categorias/muebles.html">
                    <img src="../img/muebles.png" alt="">
                    <h4>Muebles</h4>
                </a>
            </li>
            <li>
                <a href="../categorias/muebles.html">
                    <img src="./img/electrodomesticos.png" alt="">
                    <h4>Electrodomesticos</h4>
                </a>
            </li>
        </ul>
    </div>
</div>
</div>

   ------------AYUDA-------------
   <div class="media-ayuda">
    <div class="help-container">
        <img class="logo-img-somos" src="./img/logo-1_2.png" alt="">
        <p>¿En qué podemos ayudarte? Selecciona el problema que deseas resolver.</p>
    
        <div class="form-group">
            <select id="problemSelect">
                <option value="">-- Selecciona un problema --</option>
                <option value="pago">Problemas de pago</option>
                <option value="envio">Problemas con el envío</option>
                <option value="devoluciones">Problemas con devoluciones</option>
                <option value="cuenta">Problemas con mi cuenta</option>
                <option value="pagina">Problemas con la página web</option>
                <option value="otro">Otro problema</option>
            </select>
        </div>
        <a href="#" class="ov-btn-grow-skew-reverse" onclick="showSolutions()">Mostrar soluciones</a>
    </div>
    </div>
   </div>

<!-- Modal -->
<div id="solutionModal" class="modal">
    <div class="modal-content">
        <span class="close-button" onclick="closeModal()">×</span>
        <h2>Soluciones sugeridas</h2>
        <div id="solutionContainer"></div>
    </div>
</div>

<script src="../js/Ayuda.js"></script>
</div>
</div>
    <footer>
        <div class="redes">
            <h3>Redes Sociales</h3>
            <ul>
                <li>
                    <a class="btn-ins" href="#">
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

    <script src="js/Ayuda.js"></script>
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