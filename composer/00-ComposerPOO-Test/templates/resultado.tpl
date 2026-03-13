<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hola {$texto}</h1>

    <ul>
        {foreach $movies as $movie}
        <li>{$movie.titulo}</li>
        {/foreach}
    </ul>
</body>
</html>