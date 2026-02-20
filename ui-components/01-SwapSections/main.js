
/**
 * 
 *  Ocultar todas las secciones y mostrar la seleccionada
 * 
 */

//Seleccionar botones y constantes
const navBtns = document.querySelectorAll('.nav__btn');
const sections = document.querySelectorAll('.section');


//Cada botón ocultará todas las secciones y mostrará la correspondiente
navBtns.forEach(btn => {
    //Evento click
    btn.addEventListener('click', () =>{        
        
        //Oculta cada sección
        sections.forEach(section => section.classList.add('section--hide'));
        
        //Elimina la clase active
        navBtns.forEach(btn => btn.classList.remove('active'));

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



