
<?php

include("../Funciones.php");
// var_dump($_GET);exit;
?>

<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <?php
        $consulta = $pdo -> prepare("Select * from series where id=:id");
        $consulta-> bindvalue(':id',$_GET['id'], PDO::PARAM_INT); 
        $consulta->execute();
        $serie = $consulta->fetch(PDO::FETCH_ASSOC);
    ?>

        <div>
            <a href="series.php">Volver al listado</a>
            <br>
            <br>  
            Id Genero: <?=$serie['genre_id']?>
            <br>
            <br>
            <?php var_dump($serie);?>

        </div>
    </body>
</html>