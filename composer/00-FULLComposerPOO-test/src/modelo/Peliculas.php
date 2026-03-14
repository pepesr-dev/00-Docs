<?php
namespace App\modelo;
use PDO;
use PDOException;
use App\servicios\DBResult;

class Peliculas implements IListableJSS {
    public static function listar(PDO $db): DBResult|array {
        try {
            $stmt = $db->query("SELECT * FROM peliculas");
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (!$resultados) return DBResult::JSS_DB_EMPTYRESULT;

            $lista = [];
            foreach ($resultados as $fila) {
                $p = new Pelicula();
                $p->setTitulo($fila['titulo']); // etc...
                $lista[] = $p;
            }
            return $lista;
        } catch (PDOException $e) {
            return DBResult::JSS_DB_EXCEPTION;
        }
    }

    public static function existe(PDO $db, int $id): DBResult|int {
        try {
            $stmt = $db->prepare("SELECT COUNT(*) FROM peliculas WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return (int) $stmt->fetchColumn() > 0 ? 1 : 0;
        } catch (PDOException $e) {
            return DBResult::JSS_DB_EXCEPTION;
        }
    }
}
?>