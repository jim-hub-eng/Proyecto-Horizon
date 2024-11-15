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

