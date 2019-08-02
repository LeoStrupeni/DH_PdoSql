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
    <title>Generos</title>
</head>
<body>

<h5>Listado de Generos</h5>
<div class="row">  
    
    <?php $param=consultaTablasSQL($pdo, 'genres') ;?>
    
        <div class="col-3">
            
            <ul>
                <?php foreach ($param as $datos):?>
                    <li><?=$datos['name']?></li>
                <?php endforeach;?>
            </ul>    
        </div>

        <?php $param=consultaInnerTablasSQL($pdo, 'genres','movies', 'id', 'genre_id') ; ?>

        <div class="col-6">
            <ul>
                <?php foreach ($param as $datos):?>
                    <li>
                        <a href="peliculas.php?id=<?= $datos['id']?>">
                            <?=$datos['title']." - ".$datos['name']?></li>
                        </a>
                <?php endforeach;?>
            </ul>    
        </div>

        

        
</div>
</body>
</html>