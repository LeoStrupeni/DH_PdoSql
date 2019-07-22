<?php

include("../Funciones.php");

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
        $consulta = $pdo -> prepare("Select * from series");
        $consulta->execute();
        $series = $consulta->fetchall(PDO::FETCH_ASSOC);
    ?>
        <div>
            <ul>
                <?php foreach ($series as $serie) :?>
                    <li><a href="<?='serie.php?id='.$serie['id']?>"><?= $serie['title']?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </body>
</html>