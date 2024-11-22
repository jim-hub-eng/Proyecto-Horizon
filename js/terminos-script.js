const menu = document.querySelector('.menu');
var anchoMenu = menu.clientWidth;

function abrirMenu(){
    menu.style.left = "0px";
    menu.style.transition = '.3s';
}
function cerrarMenu(){
    menu.style.left = "-" + anchoMenu + "px";
    menu.style.transition = '.3s';
}
const categorias_form_menu = document.querySelector('.categorias-form-menu');
var anchoCategorias = categorias_form_menu.clientWidth;

function abrirCategoriasDeMenu(){
    categorias_form_menu.style.left = "0px";
    categorias_form_menu.style.transition = '.3s';

    menu.style.left = "-" + anchoMenu + "px";
    menu.style.transition = '.3s';
}
function cerrarCategoriasDeMenu(){
    categorias_form_menu.style.left = "-" + anchoCategorias + "px";
    categorias_form_menu.style.transition = '.3s';
}

const busquedaFlotante = document.querySelector('.busqueda-from-menu');

function apaBusquedaFlotante(){
    busquedaFlotante.style.opacity = '1';
    busquedaFlotante.style.pointerEvents = 'all';
    busquedaFlotante.style.transform = 'translateY(0)';
    busquedaFlotante.style.transition = '.3s';

    menu.style.left = "-" + anchoMenu + "px";
    menu.style.transition = '.3s';
}
function desBusquedaFlotante(){
    busquedaFlotante.style.opacity = '0';
    busquedaFlotante.style.pointerEvents = 'none';
    busquedaFlotante.style.transform = 'translateY(10px)';
    busquedaFlotante.style.transition = '.3s';
}
