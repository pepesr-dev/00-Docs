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
## Carpetas
tmp
templates

## config.php
```
require_once __DIR__ . '/vendor/autoload.php';
$smarty = new \Smarty\Smarty();
$smarty->setTemplateDir(__DIR__ . '/templates');
$smarty->setCompileDir(__DIR__ . '/tmp/compiled_templates');
// Ya tienes Smarty listo para cualquier archivo;
```


# Dar permisos:
mkdir -p tmp/cache
chmod -R 777 tmp/cache

## otros
Puedo añadir la gestión de caché
```
// 1. Decimos dónde guardar los archivos de caché
$smarty->setCacheDir(__DIR__ . '/tmp/cache');

// 2. Activamos la caché (1 = Activa)
$smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);

// 3. (Opcional) Cuánto tiempo vive la caché en segundos (ej: 1 hora)
$smarty->setCacheLifetime(3600);
```


