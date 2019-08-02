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
    <title>Actores</title>
</head>
<body>

    <?php $param=consultaTablasSQL($pdo, 'actors') ;?>
    
        <div class="col-8 m-auto">
            <h5>Listado de Actores</h5>
            <ul class="list-group">
                <?php foreach ($param as $datos):?>
                    <li class="list-group-item">
                        <?=$datos['last_name']." ".$datos['first_name']?>
                    </li>
                    
                <?php endforeach;?>
            </ul>    
        </div>

</body>
</html>