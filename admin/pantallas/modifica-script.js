//Validacion de contraseñas
const contrasena = document.getElementById('inp-psw');
const contrasena_r = document.getElementById('inp-rpsw');
const error_txtRPSW = document.getElementById('caja-psw');

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
const correo = document.getElementById('inp-email');
const error_correo = document.getElementById('caja-email');

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