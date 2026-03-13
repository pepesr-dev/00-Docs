<?php 

//NameSpace
namespace App;

//Clase a utilizar
class Saludar{

    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }
    function getSaludo(){
        return $this->name;
    }
}
?>