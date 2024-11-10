// script.js
const menu = document.querySelector('.menu');
var anchoMenu = menu.clientWidth;

function abrirMenu(){
    menu.style.left = "0px";
    menu.style.transition = '.3s';
}
function cerrarMenu(){
    menu.style.left = "-" + anchoMenu + "px";
    menu.style.transition = '.3s';
}
const categorias_form_menu = document.querySelector('.categorias-form-menu');
var anchoCategorias = categorias_form_menu.clientWidth;

function abrirCategoriasDeMenu(){
    categorias_form_menu.style.left = "0px";
    categorias_form_menu.style.transition = '.3s';

    menu.style.left = "-" + anchoMenu + "px";
    menu.style.transition = '.3s';
}
function cerrarCategoriasDeMenu(){
    categorias_form_menu.style.left = "-" + anchoCategorias + "px";
    categorias_form_menu.style.transition = '.3s';
}

const busquedaFlotante = document.querySelector('.busqueda-from-menu');

function apaBusquedaFlotante(){
    busquedaFlotante.style.opacity = '1';
    busquedaFlotante.style.pointerEvents = 'all';
    busquedaFlotante.style.transform = 'translateY(0)';
    busquedaFlotante.style.transition = '.3s';

    menu.style.left = "-" + anchoMenu + "px";
    menu.style.transition = '.3s';
}
function desBusquedaFlotante(){
    busquedaFlotante.style.opacity = '0';
    busquedaFlotante.style.pointerEvents = 'none';
    busquedaFlotante.style.transform = 'translateY(10px)';
    busquedaFlotante.style.transition = '.3s';
}

function showSolutions() {
    const problemSelect = document.getElementById("problemSelect");
    const selectedProblem = problemSelect.value;
    const solutionContainer = document.getElementById("solutionContainer");

    let solutions = "";

    switch (selectedProblem) {
        case "pago":
            solutions = `
                <p><strong>Problemas de pago:</strong></p>
                <ul>
                    <li>Verifica que la tarjeta esté activada y cuente con saldo.</li>
                    <li>Prueba otro método de pago disponible en nuestro sitio.</li>
                </ul>
                <p>Si persiste el problema, contáctanos a: <a href="mailto:pagos@horizon.com">pagos@horizon.com</a></p>
            `;
            break;
        case "envio":
            solutions = `
                <p><strong>Problemas con el envío:</strong></p>
                <ul>
                    <li>Consulta el estado de tu pedido en "Mis pedidos".</li>
                    <li>Revisa que tu dirección de entrega esté correcta.</li>
                    <li>Confirma que el código postal sea el correcto.</li>
                </ul>
                <p>Para ayuda, escribe a: <a href="mailto:envios@horizon.com">envios@horizon.com</a></p>
            `;
            break;
        case "devoluciones":
            solutions = `
                <p><strong>Problemas con devoluciones:</strong></p>
                <ul>
                    <li>Verifica los artículos en la sección de "Devoluciones".</li>
                    <li>Asegúrate de cumplir con el plazo de devolución de 30 días.</li>
                    <li>Consulta las políticas de devolución en nuestro sitio.</li>
                </ul>
                <p>Escríbenos a: <a href="mailto:devoluciones@horizon.com">devoluciones@horizon.com</a></p>
            `;
            break;
        case "cuenta":
            solutions = `
                <p><strong>Problemas con mi cuenta:</strong></p>
                <ul>
                    <li>Revisa que tu correo electrónico esté verificado.</li>
                    <li>Restablece tu contraseña desde la página de inicio de sesión.</li>
                    <li>Verifica tus datos de perfil en "Mi cuenta".</li>
                </ul>
                <p>Para asistencia, contacta: <a href="mailto:cuentas@horizon.com">cuentas@horizon.com</a></p>
            `;
            break;
        case "pagina":
            solutions = `
                <p><strong>Problemas con la página web:</strong></p>
                <ul>
                    <li>Recarga la página o limpia la caché del navegador.</li>
                    <li>Usa otro navegador si el problema persiste.</li>
                    <li>Revisa tu conexión de internet.</li>
                </ul>
                <p>Si aún tienes problemas, escribe a: <a href="mailto:soporte@horizon.com">soporte@horizon.com</a></p>
            `;
            break;
        case "otro":
            solutions = `
                <p>Para otros problemas, contáctanos a:</p>
                <p><a href="mailto:soporte@horizon.com">soporte@horizon.com</a></p>
            `;
            break;
        default:
            solutions = "<p>Por favor selecciona un problema para ver las soluciones.</p>";
            break;
    }

    solutionContainer.innerHTML = solutions;
    document.getElementById("solutionModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("solutionModal").style.display = "none";
}

