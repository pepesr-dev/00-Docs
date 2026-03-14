<?php

//Guarda herramientas de apoyo
namespace App\servicios;

//Identificar errores
//Retornar tipos de excepciones
enum DBResult: int {
    //Errores relacionados con el acceso a la BD
    case JSS_DB_EXCEPTION = -1;
    //Avisa de una operación incorrecta por datos duplicados
    //o intento de borrado de datos necesarios para otras 
    //operaciones
    case JSS_DB_OPNOTFULFILLED = -2;
    //Avisa de una operación como UPDATE o DELETE
    //llevada a cabo pero sin efectos
    case JSS_DB_NOCOLS_AFFECTED = -3;
    //Error al usar SELECT "No hay nada que mostrar"
    case JSS_DB_EMPTYRESULT = -4;
}
?>