const BOTON_DERECHO = document.getElementById('derecha');


BOTON_DERECHO.addEventListener('click', () =>{
    const BARRAS = document.querySelector('.grafica');
    BARRAS.classList.toggle('mover-derecha');
});












/**
 * 1_5-Animaciones_CANVAS.js
 * * Este script gestiona la lógica de dibujo y animación de un diagrama de barras
 * utilizando la API de Canvas de HTML5.
 */

// --- 1. CONFIGURACIÓN INICIAL Y VARIABLES GLOBALES ---
const lienzo = document.getElementById("miCanvas");
const ctx = lienzo.getContext("2d");
const botonIniciar = document.getElementById("iniciar");

// Datos del diagrama (Idisoma: Español)
const datosGrafica = [
    { nombre: "DWEC", porcentaje: 60, color: "#FF5733" }, // Naranja
    { nombre: "DWES", porcentaje: 45, color: "#33FF57" }, // Verde
    { nombre: "DIW",  porcentaje: 75, color: "#3357FF" }, // Azul
    { nombre: "PROY", porcentaje: 90, color: "#F333FF" }  // Barra más alta (Violeta)
];

// Estado de la animación
let pasoAnimacion = 0; // Controla el crecimiento de 0 a 100
let animacionActiva = false;

// Carga del icono (Estrella)
const iconoEstrella = new Image();
iconoEstrella.src = "./src/img/estrella.svg";

/**
 * Dibuja el título del diagrama.
 * Debe estar centrado horizontalmente en la parte superior.
 */
function dibujarTitulo() {
    ctx.font = "bold 22px sans-serif";
    ctx.fillStyle = "#333";
    ctx.textAlign = "center";
    ctx.fillText("Diagrama de barras", lienzo.width / 2, 40);
}

/**
 * Dibuja las barras y sus porcentajes basándose en el progreso de la animación.
 */
function dibujarBarras() {
    const anchoBarra = 60;
    const espacioEntreBarras = 30;
    const margenInferior = 50;
    const factorEscala = 2.5; // Multiplicador para la altura visual

    // Calculamos el inicio para centrar el grupo de barras
    const anchoTotal = (anchoBarra * datosGrafica.length) + (espacioEntreBarras * (datosGrafica.length - 1));
    const inicioX = (lienzo.width - anchoTotal) / 2;
    const baseLineY = lienzo.height - margenInferior;

    datosGrafica.forEach((dato, indice) => {
        const x = inicioX + indice * (anchoBarra + espacioEntreBarras);
        
        // Calculamos la altura actual según el progreso del paso de animación
        const alturaFinal = dato.porcentaje * factorEscala;
        const alturaActual = (pasoAnimacion / 100) * alturaFinal;

        // 1. Dibujar el rectángulo de la barra
        ctx.fillStyle = dato.color;
        ctx.fillRect(x, baseLineY - alturaActual, anchoBarra, alturaActual);
        
        // Borde opcional para definición
        ctx.strokeStyle = "#000";
        ctx.lineWidth = 1;
        ctx.strokeRect(x, baseLineY - alturaActual, anchoBarra, alturaActual);

        // 2. Dibujar el texto del porcentaje encima de la barra
        ctx.fillStyle = "#000";
        ctx.font = "14px Arial";
        ctx.textAlign = "center";
        ctx.fillText(`${dato.porcentaje}%`, x + anchoBarra / 2, baseLineY - alturaActual - 10);
        
        // 3. Dibujar nombre de la asignatura debajo
        ctx.fillText(dato.nombre, x + anchoBarra / 2, baseLineY + 20);
    });
}

/**
 * Dibuja el icono en la parte superior de la barra con mayor porcentaje.
 * Solo se llama cuando la animación llega al 100%.
 */
function dibujarIconoFinal() {
    // Buscamos la barra con mayor porcentaje (PROY en este caso)
    const mayor = datosGrafica[3]; 
    const factorEscala = 2.5;
    const anchoBarra = 60;
    const espacioEntreBarras = 30;
    const margenInferior = 50;
    const anchoTotal = (anchoBarra * datosGrafica.length) + (espacioEntreBarras * (datosGrafica.length - 1));
    const inicioX = (lienzo.width - anchoTotal) / 2;

    const xIcono = inicioX + 3 * (anchoBarra + espacioEntreBarras);
    const yIcono = (lienzo.height - margenInferior) - (mayor.porcentaje * factorEscala);

    // Dibujamos la estrella dentro de la barra (un poco por debajo del tope)
    ctx.drawImage(iconoEstrella, xIcono + 15, yIcono + 5, 30, 30);
}

/**
 * Bucle principal de la animación.
 */
function animar() {
    // Limpiar lienzo pero mantener el título
    ctx.clearRect(0, 0, lienzo.width, lienzo.height);
    dibujarTitulo();
    
    // Dibujar el estado actual de las barras
    dibujarBarras();

    if (pasoAnimacion < 100) {
        pasoAnimacion += 2; // Velocidad del crecimiento
        requestAnimationFrame(animar);
    } else {
        // Al terminar, colocamos el icono
        dibujarIconoFinal();
        animacionActiva = false;
    }
}

// --- 2. GESTIÓN DE EVENTOS ---

/**
 * Al cargar la página, dibujamos el título inmediatamente antes de iniciar nada.
 */
window.onload = () => {
    dibujarTitulo();
};

/**
 * Evento para el botón Iniciar.
 */
botonIniciar.addEventListener("click", () => {
    if (!animacionActiva && pasoAnimacion === 0) {
        animacionActiva = true;
        animar();
    }
});