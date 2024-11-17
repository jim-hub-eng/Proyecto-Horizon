import * as jm from '../libreria/libreria.js';

const carosel = document.querySelector('.box');

const buttonComentarios = document.getElementById('btnComentarios');
const buttonCompras = document.getElementById('btnCompras');

jm.btnStyle(buttonComentarios, "activo", buttonCompras, "activo");
jm.btnStyle(buttonCompras, "activo", buttonComentarios, "activo");


jm.verskynItemClass(buttonComentarios , carosel, "comentarios", "compras");
jm.verskynItemClass(buttonCompras , carosel, "compras", "comentarios");


const fondo = document.querySelector('.fondo');
const openSeleccion = document.getElementById('openSeleccion');
const closeSeleccion = document.getElementById('closeSeleccion');

jm.verskynItemClass(openSeleccion , fondo, "activo" , null);
jm.verskynItemClass(closeSeleccion, fondo, null ,"activo");

const btns = document.querySelectorAll('.eleccion');
const box_picture = document.querySelector('.box-foto-perfil');
const box_nombre = document.querySelector('.box-nombre');
const box_usuario = document.querySelector('.box-usuario');

btns.forEach((element , i) => {
    element.addEventListener('click', funcion);

    function funcion(){
        if(i == 0){
            box_picture.classList.add("activo");
            fondo.classList.remove("activo");
        }else if(i == 1){
            box_nombre.classList.add("activo");
            fondo.classList.remove("activo");
        }else if(i == 2){
            box_usuario.classList.add("activo");
            fondo.classList.remove("activo");
        }

    }
}); 
const btn1 = document.getElementById('ls-btn-1');
jm.verskynItemClass(btn1 , box_picture, null, "activo");

const btn2 = document.getElementById('ls-btn-2');
jm.verskynItemClass(btn2 , box_nombre, null, "activo");

const btn3 = document.getElementById('ls-btn-3');
jm.verskynItemClass(btn3 , box_usuario, null, "activo");