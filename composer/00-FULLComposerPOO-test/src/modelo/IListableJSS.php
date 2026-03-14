<?php
namespace App\modelo;
use PDO;
use App\servicios\DBResult;


interface IListableJSS {
    public static function listar(PDO $db): DBResult|array;
    public static function existe(PDO $db, int $id): DBResult|int;
}

?>