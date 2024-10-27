const menu = document.querySelector('.menu');

function openList(){
    menu.classList.add("openMenu");
}
function closeList(){
    menu.classList.remove("openMenu");
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