const nombre_usuario = document.getElementById('txtNU');
const error_txtUN = document.getElementById('error-txtNU');

nombre_usuario.addEventListener('input', cantLetras_usuario);

function cantLetras_usuario(){

    let num_letras = nombre_usuario.value.length;

    error_txtUN.innerHTML = `${num_letras} / 10`;

}

const contrasena = document.getElementById('txtPSW');
const contrasena_r = document.getElementById('txtRPSW');
const error_txtRPSW = document.getElementById('error_txtRPSW');

contrasena_r.addEventListener('input', validar_psw);

function validar_psw(){
    
    let psw = contrasena.value;
    let psw_r = contrasena_r.value;

    if(psw_r === ""){
        error_txtRPSW.textContent = "";
    }else if(psw === psw_r){
        error_txtRPSW.textContent = 'Las contraseñas coinciden';
        error_txtRPSW.style.color = '#54ff62';
    }else{
        error_txtRPSW.textContent = 'Las contraseñas no coinciden';
        error_txtRPSW.style.color = 'red';
    }

}

const correo = document.getElementById('txtCE');
const error_correo = document.getElementById('error_correo');

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
        error_correo.style.color = '#54ff62';
    }else{
        error_correo.innerText = 'Incluye "@" en tu correo';
        error_correo.style.color = 'red';
    }
    
}