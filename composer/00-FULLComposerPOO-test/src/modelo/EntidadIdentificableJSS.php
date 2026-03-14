<?php

//Clases que representan datos
namespace App\modelo;


//Obliga a que el resto de clases derivadas compartan
//estructura de identificación
//Su única función es ser heredada (DRY->Dont Repeat Yourself)
abstract class EntidadIdentificableJSS {
    //Atributo que solo la clase y sus hijas pueden ver
    protected ?int $id = null;

    //Cualquiera puede preguntar por el ID
    public function getId(): ?int {
        return $this->id;
    }
    //Solo la misma clase y sus hijas pueden cambiar el id
    protected function setId(?int $id): void {
        $this->id = $id;
    }
}

//Ejemplo: class movie extend Identificable
?>