<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result.tpl</title>
</head>
<body>
    <h1>hola {$texto}</h1>

    <ul>
        {foreach $movies as $movie}
        <li>{$movie.titulo}</li>
        {/foreach}
    </ul>

<!--Listar generos-->
    <h3>Lista de Géneros Disponibles:</h3>
<ul>
    {foreach $generos as $genero}
        <li>{$genero->getNombre()}</li>
    {/foreach}
</ul>
</body>
</html>