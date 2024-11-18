import * as jm from '../libreria/libreria.js';

const carosel = document.querySelector('.box');

const buttonComentarios = document.getElementById('btnComentarios');
const buttonCompras = document.getElementById('btnCompras');

jm.btnStyle(buttonComentarios, "activo", buttonCompras, "activo");
jm.btnStyle(buttonCompras, "activo", buttonComentarios, "activo");


jm.verskynItemClass(buttonComentarios , carosel, "comentarios", "compras");
jm.verskynItemClass(buttonCompras , carosel, "compras", "comentarios");


const fondo = document.querySelector('.fondo');
const closeSeleccion = document.getElementById('closeSeleccion');

jm.verskynItemClass(closeSeleccion, fondo, null ,"activo");

const btns = document.querySelectorAll('.eleccion');

const box_picture = document.querySelector('.box-foto-perfil');
const box_nombre = document.querySelector('.box-nombre');
const box_usuario = document.querySelector('.box-usuario');
const box_contrasena = document.querySelector('.box-contrasena');
const box_ubicacion = document.querySelector('.box-ubicacion');

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
        }else if(i == 3){
            box_contrasena.classList.add("activo");
            fondo.classList.remove("activo");
        }else if(i == 4){
            box_ubicacion.classList.add("activo");
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

const btn4 = document.getElementById('ls-btn-4');
jm.verskynItemClass(btn4 , box_contrasena, null, "activo");

const btn5 = document.getElementById('ls-btn-5');
jm.verskynItemClass(btn5 , box_ubicacion, null, "activo");

const menu = document.querySelector('.menu');
const btnMenu = document.getElementById('btnMenu');
const cerrarMenu = document.getElementById('cerrarMenu');

jm.verskynItemClass(btnMenu , menu, "activo", null);
jm.verskynItemClass(cerrarMenu , menu, null,"activo");


const btnSeleccion = document.querySelectorAll('.openSeleccion');

btnSeleccion.forEach((element, i) => {
    element.addEventListener('click', funcion);

    function funcion(){
        if(i == 0){
            fondo.classList.add("activo");
            menu.classList.remove("activo");
        }else if(i == 1){
            fondo.classList.add("activo");
            menu.classList.remove("activo");
        }
    }
});

const inputFile = document.getElementById('inputFile');
const img = document.getElementById('img');
const lb = document.querySelector('.lb-name');
const btnGuardarImg = document.getElementById('btnGuardarImg');

jm.insertImage(inputFile , img, lb, btnGuardarImg, "activo");

const nombreUsuario = document.getElementById('nombreUsuario');
const caja_conteo_nombre = document.getElementById('caja-conteo-nombre');

jm.countUp(nombreUsuario , caja_conteo_nombre , "10");

const newpsw = document.getElementById('newpsw');
const newrpsw = document.getElementById('newrpsw');
const cajaRpsw = document.getElementById('caja-verificacion-rpsw');

jm.validatePsw(newpsw,newrpsw,cajaRpsw);