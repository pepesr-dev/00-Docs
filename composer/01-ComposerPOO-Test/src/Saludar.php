<?php 
namespace App;
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