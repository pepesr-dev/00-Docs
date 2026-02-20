
/**
 * 
 *  Ocultar todas las secciones y mostrar la seleccionada
 * 
 */

//Seleccionar botones y constantes
const NAV_BTNS = document.querySelectorAll('.nav__btn');
const SECTIONS = document.querySelectorAll('.section');


//Cada botón ocultará todas las secciones y mostrará la correspondiente
NAV_BTNS.forEach(btn => {
    //Evento click
    btn.addEventListener('click', () =>{        
        
        //Oculta cada sección
        SECTIONS.forEach(section => section.classList.add('section--hide'));
        
        //Elimina la clase active
        NAV_BTNS.forEach(btn => btn.classList.remove('active'));

        //Selecciona el boton pulsado mediante
        // * dataset
        const targetBtn = btn.dataset.target;

        //Selecciona la sección mediante        
        const targetSection = document.querySelector(targetBtn);

        //Elimina la clase que oculta la seccion seleccionada
        targetSection.classList.remove('section--hide');
        
        //Agrega la clase active al boton pulsado
        btn.classList.add('active');
        
    });
    
});



