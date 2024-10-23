const btnAbrirMenu = document.getElementById('btnAbrirMenu');
const btnCerrarMenu = document.getElementById('btnCerrarMenu');
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