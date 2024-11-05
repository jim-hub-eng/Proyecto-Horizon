const btn1 = document.getElementById('btn-car-1');
const btn2 = document.getElementById('btn-car-2');
const box_3 = document.querySelector('.box-3');

btn1.addEventListener('click', () => {
    btn1.style.backgroundColor = 'rgb(148, 194, 255)';
    btn1.style.color = 'white';

    btn2.style.backgroundColor = 'transparent';
    btn2.style.color = 'rgb(148, 194, 255)';

    box_3.style.right = '0%';

});

btn2.addEventListener('click', () => {
    btn2.style.backgroundColor = 'rgb(148, 194, 255)';
    btn2.style.color = 'white';

    btn1.style.backgroundColor = 'transparent';
    btn1.style.color = 'rgb(148, 194, 255)';

    box_3.style.right = '100%';
});
//Validacion de contraseñas
const contrasena = document.getElementById('inp-psw-admin');
const contrasena_r = document.getElementById('inp-rpsw-admin');
const error_txtRPSW = document.getElementById('caja-password');

contrasena_r.addEventListener('input', validar_psw);

function validar_psw(){
    
    let psw = contrasena.value;
    let psw_r = contrasena_r.value;

    if(psw_r === ""){
        error_txtRPSW.textContent = "";
    }else if(psw === psw_r){
        error_txtRPSW.textContent = 'Las contraseñas coinciden';
        error_txtRPSW.style.color = 'green';
    }else{
        error_txtRPSW.textContent = 'Las contraseñas no coinciden';
        error_txtRPSW.style.color = 'red';
    }

}
//Verficar que el correo tenga un @
const correo = document.getElementById('inp-correo');
const error_correo = document.getElementById('caja-correo');

correo.addEventListener('input', correoValid);

function correoValid(){

    let new_correo = correo.value;
    let arroba = "@";
    let centinela = 0;
    let i=0;

    for(i=0; i<new_correo.length; i++){
        if(new_correo[i] == arroba){
            centinela = 1;
            break;
        }else{
            centinela = 0;
        }
    }

    if(new_correo === ""){
        error_correo.innerText = ' ';
    }else if(centinela == 1){
        error_correo.innerText = 'Correcto';
        error_correo.style.color = 'green';
    }else{
        error_correo.innerText = 'Incluye "@" en tu correo';
        error_correo.style.color = 'red';
    }
    
}
const nombre_producto = document.getElementById('inp-nombre-producto');
const error_producto = document.getElementById('caja-nombre-producto');

nombre_producto.addEventListener('input', cantLetras_producto);

function cantLetras_producto(){

    let num_letras = nombre_producto.value.length;

    error_producto.innerHTML = `${num_letras} / 50`;

}

const des_producto = document.getElementById('inp-des-producto');
const caja_des_producto = document.getElementById('caja-des-producto');

des_producto.addEventListener('input',cantLetrasDes_producto);

function cantLetrasDes_producto(){

    let num_letras = des_producto.value.length;

    caja_des_producto.innerHTML = `${num_letras} / 230`;

}

const img = document.getElementById('caja-foto');
const file = document.getElementById('input-file-foto');
const boxFile = document.getElementById('caja-file');

file.addEventListener('change', function(event){

    const file = event.target.files[0];

    if(file){   

        boxFile.textContent = file.name;
        boxFile.style.backgroundColor = 'royalblue';
        boxFile.style.color = 'white';

        const reader = new FileReader();

        reader.onload = function(e){

            img.src = e.target.result;
            
        }

        reader.readAsDataURL(file);
    }

});