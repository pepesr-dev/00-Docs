<?php

namespace App;

use PDO;
use PDOException;

class Dbconn
{

    public static function connectDB(): PDO
    {


        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $pdo = new PDO(DB_DSN, DB_USER, DB_PASS, $options);
            // echo "Conexión realizada con exito <br>";
            return $pdo;
        } catch (\PDOException $e) {
            echo "<h3>❌ Error de Conexión</h3>";
            echo "<strong>Mensaje:</strong> " . $e->getMessage();
            exit;
        }
    }
}
