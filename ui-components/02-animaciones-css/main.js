//Grafica de barras
const BOTON_DERECHO = document.getElementById("derecha");

BOTON_DERECHO.addEventListener("click", () => {
  const BARRAS = document.querySelector(".grafica");
  BARRAS.classList.toggle("mover-derecha");
});

//Canvas
//Canvas dibuja desde el angulo superior izquierdo

//Selecciona los elementos
const LIENZO = document.getElementById("canvas");
const CONTEXTO = LIENZO.getContext("2d");

const BTN_INICIAR = document.getElementById("iniciar");

//Prepara el lienzo
LIENZO.width = 600;
LIENZO.height = 400;

//Crea objeto
CONTEXTO.fillStyle = "red";
CONTEXTO.fillRect(200, 200, 50, 50);

//Inicializa la altura
let altura = 0;

function animarBarraAzul() {
  //incrementa altura
  altura += 2;

  //Crea el objeto y varia la altura
  CONTEXTO.fillStyle = "blue";
  CONTEXTO.fillRect(100, 300, 50, -altura);

  //Limita altura
  if (altura < 200) {
    requestAnimationFrame(animarBarraAzul);
  }
}

BTN_INICIAR.addEventListener("click", () => {
  //reiniciar altura
  altura = 0;
  animarBarraAzul();
});
