const containerPaga = document.querySelector('.container');
function btnPagar() {
    containerPaga.style.opacity = "1";
    containerPaga.style.pointerEvents = "auto";
    containerPaga.style.transition = '.2s';
}
function btnCerrarPaga(){
    containerPaga.style.opacity = "0";
    containerPaga.style.pointerEvents = "none";
    containerPaga.style.transition = '.2s';
}