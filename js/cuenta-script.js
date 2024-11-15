const carosel = document.querySelector('.box');

const buttonComentarios = document.getElementById('btnComentarios');
const buttonCompras = document.getElementById('btnCompras');

function btnComentarios(){

    carosel.style.right = '0%';
    buttonComentarios.className = 'activo';
    buttonCompras.classList.remove('activo');

}
function btnCompras(){
    carosel.style.right = '100%';
    buttonCompras.className = 'activo';
    buttonComentarios.classList.remove('activo');
}
const fondo = document.querySelector('.fondo');
function openSeleccion(){
    fondo.classList.add("activo");
}
function closeSeleccion(){
    fondo.classList.remove("activo");
}