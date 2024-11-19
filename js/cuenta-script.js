const btns = document.querySelectorAll('.eleccion');
const fondo = document.querySelector('.fondo');

function cerrarSeleccion(){
    fondo.classList.remove("activo");
}

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

const lbButton = document.querySelectorAll('.ls-btn');

lbButton.forEach((element , i) => {
    element.addEventListener('click', clickLb);

    function clickLb(){
        if(i == 0){
            box_picture.classList.remove("activo");
        }else if(i == 1){
            box_nombre.classList.remove("activo");
        }else if(i == 2){
            box_usuario.classList.remove("activo");
        }else if(i == 3){
            box_contrasena.classList.remove("activo");
        }else if(i == 4){
            box_ubicacion.classList.remove("activo");
        }
    }

});

const menu = document.querySelector('.menu');

function abrirMenu(){
    menu.classList.add("activo");
}
function cerrarMenu(){
    menu.classList.remove("activo");
}

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

inputFile.addEventListener('change', function(event){
    const file = event.target.files[0];

            if(file){

                lb.textContent = file.name;
                btnGuardarImg.classList.add("activo");

                const reader = new FileReader();

                reader.onload = function(e){

                    img.src = e.target.result;

                }
                reader.readAsDataURL(file);
            }

});



const nombreUsuario = document.getElementById('nombreUsuario');
const caja_conteo_nombre = document.getElementById('caja-conteo-nombre');

nombreUsuario.addEventListener('keyup', contarLetras);

function contarLetras(){

    let cantidad = nombreUsuario.value.length;

    caja_conteo_nombre.innerHTML = `${cantidad} / 10`;

}

const newpsw = document.getElementById('newpsw');
const newrpsw = document.getElementById('newrpsw');
const cajaRpsw = document.getElementById('caja-verificacion-rpsw');

newrpsw.addEventListener('input', validar_psw);

function validar_psw(){
    
    let psw = newpsw.value;
    let psw_r = newrpsw.value;

    if(psw_r === ""){
        cajaRpsw.textContent = "";
    }else if(psw === psw_r){
        cajaRpsw.textContent = 'Las contraseñas coinciden';
        cajaRpsw.style.color = '#54ff62';
    }else{
        cajaRpsw.textContent = 'Las contraseñas no coinciden';
        cajaRpsw.style.color = 'red';
    }

}
const psw = document.getElementById('psw');
const psw_actual = document.getElementById('psw-actual');

psw.addEventListener('input', validacion);

function validacion(){
    
    let password_actual = psw_actual.value;
    let password = psw.value;

    if(password == ''){
        newpsw.classList.remove("activo");
        newrpsw.classList.remove("activo");
    }else if(password === password_actual){
        newpsw.classList.add("activo");
        newrpsw.classList.add("activo");
    }else{
        newpsw.classList.remove("activo");
        newrpsw.classList.remove("activo");
    }

}