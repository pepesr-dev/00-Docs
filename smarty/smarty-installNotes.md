# SMARTY
Motor de plantillas, separa los datos de la apariencia.

# Instalación
1. Composer require smarty...
2. Crea vendor/smarty.
3. Actualiza autoload.

# Configuración
.tpl Creo el html y agrego las "{$saludar}" para traer funcionalidades.
/tmp **Motor** que almacena archivos necesarios para el rendimiento de smarty.
- compiled, es un **traductor** php/html.
- cache, memoria rápida.

# IMPORTANTE
$smarty->setTemplateDir(__DIR__ . '/plantillasjss/');
$smarty->setCompileDir(__DIR__ . '/tmp/compiled_templates/');
$smarty->setCacheDir(__DIR__ . '/tmp/smarty_cache/');
