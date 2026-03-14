<?php
namespace App\modelo;
use PDO;
use App\servicios\DBResult;

interface IGuardableJSS {
    public function guardar(PDO $db): DBResult|int;
    public static function rescatar(PDO $db, int $id): DBResult|EntidadIdentificableJSS;
    public static function borrar(PDO $db, int $id): DBResult|int;
}


?>