<?php
namespace App\modelo;

// Importamos la clase padre
use App\modelo\EntidadIdentificableJSS;

class Genero extends EntidadIdentificableJSS {
    private ?string $nombre = null;

    // El atributo 'id' ya existe gracias a 'extends EntidadIdentificableXYZ'

    public function getNombre(): ?string {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): void {
        $this->nombre = $nombre;
    }
}
?>