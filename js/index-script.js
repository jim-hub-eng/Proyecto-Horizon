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
