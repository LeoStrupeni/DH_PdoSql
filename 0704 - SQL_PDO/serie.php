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
        <title>Detalle Serie</title>
    </head>

    <body>

    <?php $serie=listarDatos($pdo,'series',$_GET['id']) ?>  

        <div>
            <a href="series.php">Volver al listado</a>
            <br>
            <br>  
            <div class="col">
                <h3>Nombre Serie:</h3>
                <p><?=$serie['Titulo']?></p>
            </div>
            <div class="col">
                <h3>Fecha de Estreno: </h3>
                <p><?=$serie['Fecha de estreno']?></p>
            </div>            
        </div>
    </body>
</html>