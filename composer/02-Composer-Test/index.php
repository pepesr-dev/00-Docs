

<?php
//Muestra errores de conexión
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Agrega el autoload del composer
require __DIR__ . "/vendor/autoload.php";


//Usa clases y la dependencia smarty
use App\Saludar;
use Smarty\Smarty;


//Creo y uso el objeto saludo
$saludo = new Saludar("pepe");
$saludo_uno = $saludo->getSaludo();

//Agrego el objeto smarty para que la 
//plantilla pueda usar variables
$smarty = new Smarty();

//Agrego los directorios de gestión de plantillas
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/tmp/compiled_templates');

//Asigna variables para usarlas en 
//la plantilla resultado.tpl
$smarty->assign('texto', $saludo_uno);

//Envía las variables a la plantilla
$smarty->display('resultado.tpl');

?>