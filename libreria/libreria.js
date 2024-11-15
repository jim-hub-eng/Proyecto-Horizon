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
export default{
    verskynItemClass ,
    btnStyle ,
}