

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/vendor/autoload.php";


if (!defined('DB_DSN')) {
    require_once __DIR__ . "/conf/db.php";
}

use App\Dbconn;
use App\Dao;
use App\Saludar;
use Smarty\Smarty;
use App\modelo\Generos;      // <--- ¡Esto es lo que falta!

use App\servicios\DBResult; // <--- Para que el "instanceof" funcione


//conexión
//$pdo = Dbconn::connectDB();


echo "Cargando clase...";
$pdo = Dbconn::connectDB();
echo "¡Conectado!";


//obtener datos
$dao = new Dao($pdo);
$movies = $dao->getMovies();

//saludo
$saludo = new Saludar("pepe");

$saludo_uno = $saludo->getSaludo();


//GENEROS
$resultadoGeneros = Generos::listar($pdo);
$listaGeneros = [];

if ($resultadoGeneros instanceof DBResult) {
    // Si hay un error, podemos pasar un mensaje o dejar la lista vacía
    $errorMsg = "No se pudieron cargar los géneros.";
} else {
    // Si todo va bien, $resultadoGeneros es el array de objetos Genero
    $listaGeneros = $resultadoGeneros;
}



$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/tmp/compiled_templates');

$smarty->assign('movies', $movies);
$smarty->assign('texto', $saludo_uno);
$smarty->assign('generos', $listaGeneros); // Pasamos los objetos a la plantilla


$smarty->display('resultado.tpl');

?>