const BOTON_DERECHO = document.getElementById('derecha');


BOTON_DERECHO.addEventListener('click', () =>{
    const BARRAS = document.querySelector('.grafica');
    BARRAS.classList.toggle('mover-derecha');
});