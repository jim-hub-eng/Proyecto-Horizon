const menu = document.querySelector('.menu');

function openList(){
    menu.classList.add("openMenu");
}
function closeList(){
    menu.classList.remove("openMenu");
}
const carrusel = document.querySelector('.box-2');

function btn_car_1(){
    carrusel.style.right = '0%';
}
function btn_car_2(){
    carrusel.style.right = '100%';
}
function btn_car_3(){
    carrusel.style.right = '200%';
}

//  FUNCIONES PARA APARECER FORMULARIO PARA REGISTRAR USUARIO
const media_form = document.querySelector('.media-form'); // CAJA DE FORMULARIO

function abrirRegistrarUsuario(){ // Cuando le de click al boton "Registrar Usuario"

    media_form.style.opacity = '1'; // VA APARECER EL FORMULARIO
    media_form.style.pointerEvents = 'auto'; // SE LE INDICA QUE LO PODEMOS TOCAR
    media_form.style.transition = '.3s'; // SE LE AGREGA UNA TRANSICION PARA QUE NO APARESCA BRUTAMENTE

}
function cerrarRegistrarUsuario(){ // Cuando le de click a la " x " de formulario

    media_form.style.opacity = '0'; // VA A DESAPARECER EL FORMULARIO
    media_form.style.pointerEvents = 'none'; // SE LE INDICA QUE NO LO PODEMOS TOCAR
    //media_form.style.transition = '.3s'; // SE LE AGREGA UNA TRANSICION PARA QUE NO DESAPARESCA BRUTAMENTE

}

// FUNCIONES DE INPUTS DE PRODUCTOS DE HOGAR

const img_hogar = document.getElementById('img-hogar'); // ETIQUETA IMG DONDE SE VA A INSERTAR LA IMAGEN SELECIONADA
const file_hogar = document.getElementById('file-hogar'); // INPUT FILE DONDE SE VA A ELEGIR LA IMAGEN

file_hogar.addEventListener('change', function(event){ //  CUANDO LE DE ABRIR A LA IMAGEN 

    const file = event.target.files[0]; // VERIFICA SI HAY ALGO , DEVUELVE UN BOOLEANO

    if(file){ // VERIFICA SI LA VARIABLE "FILE" CONTIENE ALGO

        const reader = new FileReader(); // SE LE ASIGNA A LA VARIABLE "READER" UNA CLASE

        reader.onload = function(e){ // HACE UNA FUNCION DE LA CLASE FILEREADER PARA PODER VER LA IMAGEN

            img_hogar.src = e.target.result; //INSERTA LA IMAGEN EN LA ETIQUETA IMG

        }
        reader.readAsDataURL(file);
    }

});

const nombre_hogar = document.getElementById('int-name-hogar'); // INPUT DONDE SE INGRESA EL NOMBRE DEL PRODUCTO
const contador_nombre_hogar = document.getElementById('box-count-name-hogar'); //CAJA DONDE SE VA A ENSEÑAR EL CONTEO DE PALABRAS

nombre_hogar.addEventListener('input', count_nombre_hogar); //CUANDO SE ESCRIBA EN EL INPUT VA A HACER LA FUNCION "count_nombre_hogar"

function count_nombre_hogar(){

    let num_letras_nombre_hogar = nombre_hogar.value.length; //LENGHT SIRVE PARA CONTAR LAS LETRAS Y SE VA ALMACENANDO EL NUMERO EN LA VARIABLE "num_letras_nombre_hogar"

    contador_nombre_hogar.innerHTML = `${num_letras_nombre_hogar} / 50`; //SE MUESTRA LA CANTIDAD DE LETRAS QUE LLEVA

}

const des_hogar = document.getElementById('int-des-hogar'); // INPUT DONDE SE INGRESA EL NOMBRE DEL PRODUCTO
const contador_des_hogar = document.getElementById('box-count-des-hogar'); //CAJA DONDE SE VA A ENSEÑAR EL CONTEO DE PALABRAS

des_hogar.addEventListener('input', count_des_hogar); //CUANDO SE ESCRIBA EN EL INPUT VA A HACER LA FUNCION "count_nombre_hogar"

function count_des_hogar(){

    let num_letras_des_hogar = des_hogar.value.length; //LENGHT SIRVE PARA CONTAR LAS LETRAS Y SE VA ALMACENANDO EL NUMERO EN LA VARIABLE "num_letras_nombre_hogar"

    contador_des_hogar.innerHTML = `${num_letras_des_hogar} / 230`; //SE MUESTRA LA CANTIDAD DE LETRAS QUE LLEVA

}
// FUNCIONES DE INPUTS DE PRODUCTOS DE ELECTRODOMESTICOS
const img_electrodomestico = document.getElementById('img-electrodomestico');
const file_electrodomestico = document.getElementById('file-electrodomestico');

file_electrodomestico.addEventListener('change', function(event){ //  CUANDO LE DE ABRIR A LA IMAGEN 

    const file = event.target.files[0]; // VERIFICA SI HAY ALGO , DEVUELVE UN BOOLEANO

    if(file){ // VERIFICA SI LA VARIABLE "FILE" CONTIENE ALGO

        const reader = new FileReader(); // SE LE ASIGNA A LA VARIABLE "READER" UNA CLASE

        reader.onload = function(e){ // HACE UNA FUNCION DE LA CLASE FILEREADER PARA PODER VER LA IMAGEN

            img_electrodomestico.src = e.target.result; //INSERTA LA IMAGEN EN LA ETIQUETA IMG

        }
        reader.readAsDataURL(file);
    }

});
const nombre_electrodomestico = document.getElementById('int-name-electrodomestico'); 
const contador_nombre_electrodomestico = document.getElementById('box-count-name-electrodomestico'); 

nombre_electrodomestico.addEventListener('input', count_nombre_electrodomestico); 

function count_nombre_electrodomestico(){

    let num_letras_nombre_electrodomestico = nombre_electrodomestico.value.length; 

    contador_nombre_electrodomestico.innerHTML = `${num_letras_nombre_electrodomestico} / 50`;

}

const des_electrodomestico = document.getElementById('int-des-electrodomestico'); 
const contador_des_electrodomestico = document.getElementById('box-count-des-electrodomestico'); 

des_electrodomestico.addEventListener('input', count_des_electrodomestico); 

function count_des_electrodomestico(){

    let num_letras_des_electrodomestico = des_electrodomestico.value.length; 

    contador_des_electrodomestico.innerHTML = `${num_letras_des_electrodomestico} / 230`;

}
// FUNCIONES DE INPUTS DE PRODUCTOS DE ELECTRONICO
const img_electronico = document.getElementById('img-electronico');
const file_electronico = document.getElementById('file-electronico');

file_electronico.addEventListener('change', function(event){ //  CUANDO LE DE ABRIR A LA IMAGEN 

    const file = event.target.files[0]; // VERIFICA SI HAY ALGO , DEVUELVE UN BOOLEANO

    if(file){ // VERIFICA SI LA VARIABLE "FILE" CONTIENE ALGO

        const reader = new FileReader(); // SE LE ASIGNA A LA VARIABLE "READER" UNA CLASE

        reader.onload = function(e){ // HACE UNA FUNCION DE LA CLASE FILEREADER PARA PODER VER LA IMAGEN

            img_electronico.src = e.target.result; //INSERTA LA IMAGEN EN LA ETIQUETA IMG

        }
        reader.readAsDataURL(file);
    }

});
const nombre_electronico = document.getElementById('int-name-electronico'); 
const contador_nombre_electronico = document.getElementById('box-count-name-electronico'); 

nombre_electronico.addEventListener('input', count_nombre_electronico); 

function count_nombre_electronico(){

    let num_letras_nombre_electronico = nombre_electronico.value.length; 

    contador_nombre_electronico.innerHTML = `${num_letras_nombre_electronico} / 50`;

}

const des_electronico = document.getElementById('int-des-electronico'); 
const contador_des_electronico = document.getElementById('box-count-des-electronico'); 

des_electronico.addEventListener('input', count_des_electronico); 

function count_des_electronico(){

    let num_letras_des_electronico = des_electronico.value.length; 

    contador_des_electronico.innerHTML = `${num_letras_des_electronico} / 230`;

}
// FUNCIONES DE INPUTS DE PRODUCTOS DE ROPA
const img_ropa = document.getElementById('img-ropa');
const file_ropa = document.getElementById('file-ropa');

file_ropa.addEventListener('change', function(event){ //  CUANDO LE DE ABRIR A LA IMAGEN 

    const file = event.target.files[0]; // VERIFICA SI HAY ALGO , DEVUELVE UN BOOLEANO

    if(file){ // VERIFICA SI LA VARIABLE "FILE" CONTIENE ALGO

        const reader = new FileReader(); // SE LE ASIGNA A LA VARIABLE "READER" UNA CLASE

        reader.onload = function(e){ // HACE UNA FUNCION DE LA CLASE FILEREADER PARA PODER VER LA IMAGEN

            img_ropa.src = e.target.result; //INSERTA LA IMAGEN EN LA ETIQUETA IMG

        }
        reader.readAsDataURL(file);
    }

});
const nombre_ropa = document.getElementById('int-name-ropa'); 
const contador_nombre_ropa = document.getElementById('box-count-name-ropa'); 

nombre_ropa.addEventListener('input', count_nombre_ropa); 

function count_nombre_ropa(){

    let num_letras_nombre_ropa = nombre_ropa.value.length; 

    contador_nombre_ropa.innerHTML = `${num_letras_nombre_ropa} / 50`;

}

const des_ropa = document.getElementById('int-des-ropa'); 
const contador_des_ropa = document.getElementById('box-count-des-ropa'); 

des_ropa.addEventListener('input', count_des_ropa); 

function count_des_ropa(){

    let num_letras_des_ropa = des_ropa.value.length; 

    contador_des_ropa.innerHTML = `${num_letras_des_ropa} / 230`;

}
// FUNCIONES DE INPUTS DE PRODUCTOS DE BAÑO
const img_bano = document.getElementById('img-bano');
const file_bano = document.getElementById('file-bano');

file_bano.addEventListener('change', function(event){ //  CUANDO LE DE ABRIR A LA IMAGEN 

    const file = event.target.files[0]; // VERIFICA SI HAY ALGO , DEVUELVE UN BOOLEANO

    if(file){ // VERIFICA SI LA VARIABLE "FILE" CONTIENE ALGO

        const reader = new FileReader(); // SE LE ASIGNA A LA VARIABLE "READER" UNA CLASE

        reader.onload = function(e){ // HACE UNA FUNCION DE LA CLASE FILEREADER PARA PODER VER LA IMAGEN

            img_bano.src = e.target.result; //INSERTA LA IMAGEN EN LA ETIQUETA IMG

        }
        reader.readAsDataURL(file);
    }

});
const nombre_bano = document.getElementById('int-name-bano'); 
const contador_nombre_bano = document.getElementById('box-count-name-bano'); 

nombre_bano.addEventListener('input', count_nombre_bano); 

function count_nombre_bano(){

    let num_letras_nombre_bano = nombre_bano.value.length; 

    contador_nombre_bano.innerHTML = `${num_letras_nombre_bano} / 50`;

}

const des_bano = document.getElementById('int-des-bano'); 
const contador_des_bano = document.getElementById('box-count-des-bano'); 

des_bano.addEventListener('input', count_des_bano); 

function count_des_bano(){

    let num_letras_des_bano = des_bano.value.length; 

    contador_des_bano.innerHTML = `${num_letras_des_bano} / 230`;

}
// FUNCIONES DE INPUTS DE PRODUCTOS DE MAQUILLAJE
const img_maquillaje = document.getElementById('img-maquillaje');
const file_maquillaje = document.getElementById('file-maquillaje');

file_maquillaje.addEventListener('change', function(event){ //  CUANDO LE DE ABRIR A LA IMAGEN 

    const file = event.target.files[0]; // VERIFICA SI HAY ALGO , DEVUELVE UN BOOLEANO

    if(file){ // VERIFICA SI LA VARIABLE "FILE" CONTIENE ALGO

        const reader = new FileReader(); // SE LE ASIGNA A LA VARIABLE "READER" UNA CLASE

        reader.onload = function(e){ // HACE UNA FUNCION DE LA CLASE FILEREADER PARA PODER VER LA IMAGEN

            img_maquillaje.src = e.target.result; //INSERTA LA IMAGEN EN LA ETIQUETA IMG

        }
        reader.readAsDataURL(file);
    }

});
const nombre_maquillaje = document.getElementById('int-name-maquillaje'); 
const contador_nombre_maquillaje = document.getElementById('box-count-name-maquillaje'); 

nombre_maquillaje.addEventListener('input', count_nombre_maquillaje); 

function count_nombre_maquillaje(){

    let num_letras_nombre_maquillaje = nombre_maquillaje.value.length; 

    contador_nombre_maquillaje.innerHTML = `${num_letras_nombre_maquillaje} / 50`;

}

const des_maquillaje = document.getElementById('int-des-maquillaje'); 
const contador_des_maquillaje = document.getElementById('box-count-des-maquillaje'); 

des_maquillaje.addEventListener('input', count_des_maquillaje); 

function count_des_maquillaje(){

    let num_letras_des_maquillaje = des_maquillaje.value.length; 

    contador_des_maquillaje.innerHTML = `${num_letras_des_maquillaje} / 230`;

}
// FUNCIONES DE INPUTS DE PRODUCTOS DE JUGUETES
const img_juguetes = document.getElementById('img-juguetes');
const file_juguetes = document.getElementById('file-juguetes');

file_juguetes.addEventListener('change', function(event){ //  CUANDO LE DE ABRIR A LA IMAGEN 

    const file = event.target.files[0]; // VERIFICA SI HAY ALGO , DEVUELVE UN BOOLEANO

    if(file){ // VERIFICA SI LA VARIABLE "FILE" CONTIENE ALGO

        const reader = new FileReader(); // SE LE ASIGNA A LA VARIABLE "READER" UNA CLASE

        reader.onload = function(e){ // HACE UNA FUNCION DE LA CLASE FILEREADER PARA PODER VER LA IMAGEN

            img_juguetes.src = e.target.result; //INSERTA LA IMAGEN EN LA ETIQUETA IMG

        }
        reader.readAsDataURL(file);
    }

});
const nombre_juguetes = document.getElementById('int-name-juguetes'); 
const contador_nombre_juguetes = document.getElementById('box-count-name-juguetes'); 

nombre_juguetes.addEventListener('input', count_nombre_juguetes); 

function count_nombre_juguetes(){

    let num_letras_nombre_juguetes = nombre_juguetes.value.length; 

    contador_nombre_juguetes.innerHTML = `${num_letras_nombre_juguetes} / 50`;

}

const des_juguetes = document.getElementById('int-des-juguetes'); 
const contador_des_juguetes = document.getElementById('box-count-des-juguetes'); 

des_juguetes.addEventListener('input', count_des_juguetes); 

function count_des_juguetes(){

    let num_letras_des_juguetes = des_juguetes.value.length; 

    contador_des_juguetes.innerHTML = `${num_letras_des_juguetes} / 230`;

}
// FUNCIONES DE INPUTS DE PRODUCTOS DE MUEBLES
const img_muebles = document.getElementById('img-muebles');
const file_muebles = document.getElementById('file-muebles');

file_muebles.addEventListener('change', function(event){ //  CUANDO LE DE ABRIR A LA IMAGEN 

    const file = event.target.files[0]; // VERIFICA SI HAY ALGO , DEVUELVE UN BOOLEANO

    if(file){ // VERIFICA SI LA VARIABLE "FILE" CONTIENE ALGO

        const reader = new FileReader(); // SE LE ASIGNA A LA VARIABLE "READER" UNA CLASE

        reader.onload = function(e){ // HACE UNA FUNCION DE LA CLASE FILEREADER PARA PODER VER LA IMAGEN

            img_muebles.src = e.target.result; //INSERTA LA IMAGEN EN LA ETIQUETA IMG

        }
        reader.readAsDataURL(file);
    }

});
const nombre_muebles = document.getElementById('int-name-muebles'); 
const contador_nombre_muebles = document.getElementById('box-count-name-muebles'); 

nombre_muebles.addEventListener('input', count_nombre_muebles); 

function count_nombre_muebles(){

    let num_letras_nombre_muebles = nombre_muebles.value.length; 

    contador_nombre_muebles.innerHTML = `${num_letras_nombre_muebles} / 50`;

}

const des_muebles = document.getElementById('int-des-muebles'); 
const contador_des_muebles = document.getElementById('box-count-des-muebles'); 

des_muebles.addEventListener('input', count_des_muebles); 

function count_des_muebles(){

    let num_letras_des_muebles = des_muebles.value.length; 

    contador_des_muebles.innerHTML = `${num_letras_des_muebles} / 230`;

}