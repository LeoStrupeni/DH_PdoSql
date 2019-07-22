<?php

require_once "../GLOBAL/config.php";
require_once "../GLOBAL/conexion.php";
require_once "../GLOBAL/funciones.php";

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Series</title>
    </head>
    <body>
        <div class="container">
            <a href="agregarPelicula.php">Agregar Peliculas</a>
            <h1 class="text-center">Consultas SQL</h1><br>
                <div class="row">
                    <div class="col h3">
                        1 - Listado series
                    </div>
                </div>    
                <div class="row">
                    <?php $series=consultaTablasSQL($pdo, 'series') ?>
                    <ul class="list-group list-group-horizontal m-auto">
                        <?php foreach ($series as $serie) :?>
                            <li class="list-group-item list-group-item-dark">
                                <a class="text-white" href="<?='serie.php?id='.$serie['id']?>"><?= $serie['title']?></a>
                            </li>
                        <?php endforeach; ?>        
                    </ul>
                </div>
            <hr>

            
        </div>
    </body>
</html>