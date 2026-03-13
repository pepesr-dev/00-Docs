

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



$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/tmp/compiled_templates');

$smarty->assign('movies', $movies);
$smarty->assign('texto', $saludo_uno);

$smarty->display('resultado.tpl');

?>