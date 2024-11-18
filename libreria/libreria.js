export function verskynItemClass(btn , element, classe, classe2 ){
    btn.addEventListener('click', addClass);
    function addClass(){
        if(classe != null){
            element.classList.add(classe);
        }
       if(classe2 != null){
        element.classList.remove(classe2);
       }
    }
}
export function btnStyle(btn, classe, btn2, classe2){
    btn.addEventListener('click', addClass);
    function addClass(){
        btn.classList.add(classe);
        btn2.classList.remove(classe2);
    }
}
export function insertImage(inputFile , img, label, btn , clase){
    inputFile.addEventListener('change', function(event){
            const file = event.target.files[0];

            if(file){

                label.textContent = file.name;
                btn.classList.add(clase);

                const reader = new FileReader();

                reader.onload = function(e){

                    img.src = e.target.result;

                }
                reader.readAsDataURL(file);
            }
    });
}
export function countUp(input , lb , hasta){
    input.addEventListener('keyup', contar);

    function contar(){
        let cantidad = input.value.length;
        lb.innerHTML = `${cantidad} / ${hasta}`;
    }
}
export function validatePsw(contrasena , contrasena_r , error_txtRPSW){
    
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
}
export default{
    verskynItemClass ,
    btnStyle ,
    insertImage ,
    countUp ,
    validatePsw ,
}