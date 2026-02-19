
// * IMPORTANTE
// ! Ojo con el punto de las clases
// TODO: Comentar
// ? Preguntas

/**
 * @param
 * @returns
 * 
 *  Ocultar todas las secciones y mostrar la seleccionada
 * 
 */

//Seleccionar botones y constantes
const navBtns = document.querySelectorAll('.nav__btn');
const sections = document.querySelectorAll('.section');


//Cada botón realizará lo siguiente al hacer click
navBtns.forEach(btn => {
    btn.addEventListener('click', () =>{        
        
        // 1.- Ocultar todas las secciones
        sections.forEach(section => section.classList.add('section--hide'));
        
        // 2.- Eliminar la clase active de cada boton
        navBtns.forEach(btn => btn.classList.remove('active'));

        //3.- Seleccionar el boton pulsado
        // * dataset
        const targetBtn = btn.dataset.target;
        //4.- Selecciono la sección que corresponde al boton pulsado
        const targetSection = document.querySelector(targetBtn);

        //5.- Eliminar la clase que oculta la seccion seleccionada
        targetSection.classList.remove('section--hide');
        
        //6.- Agregar la clase active al boton pulsado
        btn.classList.add('active');
        
    });
    
});



