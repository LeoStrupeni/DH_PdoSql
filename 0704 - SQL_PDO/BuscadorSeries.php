<?php

require_once "../GLOBAL/config.php";
require_once "../GLOBAL/conexion.php";
require_once "../GLOBAL/funciones.php";

$pagina='Debe seleccionar una opcion';

if($_POST){
    if( $_POST['pag'] =='s') {
        $pagina='series';
    } else {
        $pagina='movies';
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Buscador de Peliculas</title>
</head>
<body>
    <h4 class="text-center">Buscador de Series</h4>
    <div class="col-2 ml-5 border border-dark p-2">
        <form method="post" action="">
            <div class="form-check">
                <input type="radio" name="pag" value="s">Serie<br>
                <input type="radio" name="pag" value="m">Peliculas<br>
            </div>
            <button type="submit" class="btn btn-secondary">Enviar</button>
        </form>
    </div>
    <br>
    <br>
    <?php if ($pagina=='Debe seleccionar una opcion') :?>
        <div class="col-8 alert alert-primary m-auto" role="alert">
            <?=$pagina?>
        </div>
    <?php else :?>

        <?php $param=consultaTablasSQL($pdo, $pagina) ;?>
        <div class="col-8 m-auto">
            <h5>Listado de <?=$pagina?></h5>
            <ul class="list-group">
                <?php foreach ($param as $datos):?>
                    <li class="list-group-item"><?=$datos['title']?></li>
                <?php endforeach;?>
            </ul>    
        </div>
  
    <?php endif;?>

</body>
</html>