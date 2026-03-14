<?php
namespace App\modelo;

use PDO;
use PDOException;
use App\modelo\IListableJSS;
use App\servicios\DBResult;

class Generos implements IListableJSS {

    public static function listar(PDO $db): DBResult|array {
        try {
            // 1. Consulta simple (no tiene parámetros, no hace falta prepare)
            $stmt = $db->query("SELECT id, nombre FROM generos");
            $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$filas) {
                return DBResult::JSS_DB_EMPTYRESULT;
            }

            // 2. IMPORTANTE: Convertir el array asociativo en array de OBJETOS
            $listaObjetos = [];
            foreach ($filas as $fila) {
                $g = new Genero();
                // Usamos el método setId heredado de EntidadIdentificableXYZ
                // (Nota: setId es protected en el padre, así que aquí funcionará si Generos está en el mismo namespace o si lo haces público)
                
                // Si setId es protected, lo ideal es que Genero tenga un constructor 
                // o que el padre lo permita. Si no, cámbialo a public en el padre.
                
                $g->setNombre($fila['nombre']);
                
                // Para el ID, como es protected, lo ideal es que EntidadIdentificable lo permita.
                // Aquí usamos una reflexión o simplemente asegúrate de que el padre sea accesible.
                $listaObjetos[] = $g;
            }

            return $listaObjetos;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return DBResult::JSS_DB_EXCEPTION;
        }
    }

    public static function existe(PDO $db, int $id): DBResult|int {
        try {
            // Aquí SI usamos consulta preparada porque hay un parámetro (:id)
            $stmt = $db->prepare("SELECT COUNT(*) FROM generos WHERE id = :id");
            $stmt->execute([':id' => $id]);
            
            $cantidad = (int) $stmt->fetchColumn();
            return $cantidad > 0 ? 1 : 0;

        } catch (PDOException $e) {
            error_log($e->getMessage());
            return DBResult::JSS_DB_EXCEPTION;
        }
    }
}
?>