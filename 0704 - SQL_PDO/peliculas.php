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
    <title>Peliculas</title>
</head>
<body>
    
<h4 class="text-center">Informacion de la pelicula de ID: <?=$_GET['id']?> </h4>

    <?php $param=listarDatos($pdo, 'movies', $_GET['id']); 
    
    // var_dump($param);exit;
    ?>
    <?php foreach ($param as $pos => $datos):?>
    <div class="row">
        <div class="col ml-5">
            <ul class="list-group list-group-horizontal">
                <li class=""><?=$pos.": "?></li>
                <li class="list-unstyled ml-1"><?=$datos?></li>
            </ul>
        </div>
    </div>        
    <?php endforeach;?>

</body>
</html>