<?php 

namespace App;

use PDO;
use PDOException;
class Dao {
    private $pdo;


    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
function getMovies(): array | bool{
    $sql = "
        SELECT titulo
        FROM peliculas;
    ";

    try{
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        error_log("Error en Dao::getMovies: " . $e->getMessage());
        return false;
        
    }
}
}
?>