<?php

require_once "../GLOBAL/config.php";
require_once "../GLOBAL/conexion.php";
require_once "../GLOBAL/funciones.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Practica Movies</title>
</head>

<body>
    <div class="container">
    <h1 class="text-center">Práctica II (Integradora)</h1><br>
        <div class="row">
            <div class="col h3">
                2.1 - Peliculas Favoritas
            </div>
        </div>    
        <div class="row">

            <?php
            $sql="SELECT concat(`last_name`,', ', `first_name`) as Actor, m.title 
                    from actors A inner join movies M on a.favorite_movie_id = m.id where m.title like '%t%'";
            $param= consultaSQL($pdo,$sql);
            ?>

            <div class="col-8 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Actor</th>
                            <th scope="col">Pelicula</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $key => $value) :?>
                        <tr>
                            <td><?=$value['Actor']?></td>
                            <td><?=$value['title']?></td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col h3">
                2.2 - Actores y Peliculas (Fav con T)
            </div>
        </div>    
        <div class="row">

            <?php
            $sql="SELECT concat(`last_name`,', ', `first_name`) as Actor, title,t.FAV
                    FROM actors a 
                    inner join actor_movie am on a.id = am.actor_id 
                    inner join `movies` m on am.movie_id = m.id
                    inner join (SELECT concat(`last_name`,', ', `first_name`) as Actor, m.title as FAV
                                from actors A 
                                inner join movies M on a.favorite_movie_id = m.id where m.title like '%t%') T 
                                ON concat(`last_name`,', ', `first_name`) = T.ACTOR
                    order by actor";
            $param= consultaSQL($pdo,$sql);
            ?>

            <div class="col m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Actor</th>
                            <th scope="col">Pelicula</th>
                            <th scope="col">Pelicula Fav</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $key => $value) :?>
                        <tr>
                            <td><?=$value['Actor']?></td>
                            <td><?=$value['title']?></td>
                            <td><?=$value['FAV']?></td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
        <hr>
 
        <div class="row">
            <div class="col h3">
                2.3 - Generos de Series posteriores a 2013
            </div>
        </div>    
        <div class="row">

            <?php
            $sql="SELECT DISTINCT name 
                    FROM `genres` G inner join series S on G.id = S.genre_id
                    where YEAR(s.release_date) >= 2013";
            $param= consultaSQL($pdo,$sql);
            ?>

            <div class="col-4 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Genero</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $key => $value) :?>
                        <tr>
                            <td><?=$value['name']?></td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col h3">
                2.4 - Peliculas No Fav
            </div>
        </div>    
        <div class="row">

            <?php
            $sql="SELECT distinct m.title
                    from movies M 
                    left join actors A 
                    on m.id = a.favorite_movie_id
                    where a.favorite_movie_id is null";
            $param= consultaSQL($pdo,$sql);
            ?>

            <div class="col-4 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Pelicula</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $key => $value) :?>
                        <tr>
                            <td><?=$value['title']?></td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col h3">
                2.5 - Generos en Series y Peliculas
            </div>
        </div>    
        <div class="row">

            <?php
            $sql="SELECT DISTINCT name
                    FROM genres G
                    inner join movies m on g.id = m.genre_id
                    inner join series s on g.id = s.genre_id";
            $param= consultaSQL($pdo,$sql);
            ?>

            <div class="col-4 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Genero</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $key => $value) :?>
                        <tr>
                            <td><?=$value['name']?></td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col h3">
                2.6 - Generos Sin Series
            </div>
        </div>    
        <div class="row">

            <?php
            $sql="SELECT name
                    FROM genres G
                    left join series s on g.id = s.genre_id
                    where s.title is null";
            $param= consultaSQL($pdo,$sql);
            ?>

            <div class="col-4 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Genero</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $key => $value) :?>
                        <tr>
                            <td><?=$value['name']?></td>
                        </tr>
                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
        <hr>

    </div>

</body>

</html>
