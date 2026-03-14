<?php
namespace App\modelo;

use PDO;
use PDOException;
use App\servicios\DBResult;

class Pelicula extends EntidadIdentificableJSS implements IGuardableJSS {
    private ?string $titulo = null;
    private ?int $genero = null;
    private ?string $direccion = null;
    private ?int $duracion = null;
    private ?string $argumento = null;
    private ?int $anio = null;

    // Getters y Setters públicos (Ejemplo con titulo)
    public function getTitulo(): ?string { return $this->titulo; }
    public function setTitulo(?string $titulo): void { $this->titulo = $titulo; }
    // ... repetir para el resto de atributos ...

    public function guardar(PDO $db): DBResult|int {
        try {
            if ($this->id === null) {
                // INSERT
                $sql = "INSERT INTO peliculas (titulo, genero, direccion, duracion, argumento, anio) 
                        VALUES (:titulo, :genero, :direccion, :duracion, :argumento, :anio)";
                $stmt = $db->prepare($sql);
                $stmt->execute([
                    ':titulo' => $this->titulo, ':genero' => $this->genero,
                    ':direccion' => $this->direccion, ':duracion' => $this->duracion,
                    ':argumento' => $this->argumento, ':anio' => $this->anio
                ]);
                $this->setId((int)$db->lastInsertId());
                return $stmt->rowCount();
            } else {
                // UPDATE
                $sql = "UPDATE peliculas SET titulo=:titulo, genero=:genero, direccion=:direccion, 
                        duracion=:duracion, argumento=:argumento, anio=:anio WHERE id=:id";
                $stmt = $db->prepare($sql);
                $stmt->execute([
                    ':titulo' => $this->titulo, ':genero' => $this->genero,
                    ':direccion' => $this->direccion, ':duracion' => $this->duracion,
                    ':argumento' => $this->argumento, ':anio' => $this->anio, ':id' => $this->id
                ]);
                return $stmt->rowCount();
            }
        } catch (PDOException $e) {
            //Identificador de errores (desconexión)
            return DBResult::JSS_DB_EXCEPTION;
        }
    }

    public static function rescatar(PDO $db, int $id): DBResult|EntidadIdentificableJSS {
        try {
            $stmt = $db->prepare("SELECT * FROM peliculas WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $datos = $stmt->fetch(PDO::FETCH_ASSOC);

            //Identificador de errores (Vacío)
            if (!$datos) return DBResult::JSS_DB_EMPTYRESULT;

            $p = new Pelicula();
            $p->setId($datos['id']);
            $p->setTitulo($datos['titulo']);
            // ... rellenar resto de datos ...
            return $p;
        } catch (PDOException $e) {
            //Identificador de errores (desconexión)
            return DBResult::JSS_DB_EXCEPTION;
        }
    }

    public static function borrar(PDO $db, int $id): DBResult|int {
        try {
            $stmt = $db->prepare("DELETE FROM peliculas WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            return DBResult::JSS_DB_EXCEPTION;
        }
    }
}
?>