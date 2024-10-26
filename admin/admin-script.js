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