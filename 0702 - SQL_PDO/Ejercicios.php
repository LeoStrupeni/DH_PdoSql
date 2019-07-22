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
    <h1 class="text-center">Práctica I (Integradora)</h1><br>
        <div class="row">
            <div class="col h3">
                1.1 - Listado Peliculas y Genero
            </div>
        </div>    
        <div class="row">
        <?php
        $sql="SELECT name,title FROM `movies` m left join `genres` g on m.`genre_id` = g.id order by g.name desc";
        $param=consultaSQL($pdo,$sql);     
        ?>
            <div class="col-6 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Genero</th>
                            <th scope="col">Pelicula</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $peli) :?>
                        <tr>
                            <td><?=$peli['name']?></td>
                            <td><?=$peli['title']?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col h3">
                1.2 - Listado Peliculas, Genero y Actores
            </div>
        </div>    
        <div class="row">
        <?php
        $sql="SELECT title, name, concat(last_name,', ',first_name) as Nombre FROM `movies` m inner join actor_movie am on m.id = am.movie_id inner join actors a on a.id = am.actor_id LEFT join genres g on m.genre_id = g.id order by title";
        $param=consultaSQL($pdo,$sql);     
        ?>
            <div class="col-10 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Actores</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $peli) :?>
                        <tr>
                            <td><?=$peli['title']?></td>
                            <td><?=$peli['name']?></td>
                            <td><?=$peli['Nombre']?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col h3">
                1.3 - Listado Actores y sus peliculas
            </div>
        </div>    
        <div class="row">
        <?php
        $sql="SELECT first_name as Nombre, title FROM actors a left join actor_movie am on a.id = am.actor_id left join `movies` m on am.movie_id = m.id order by Nombre";
        $param=consultaSQL($pdo,$sql);     
        ?>
            <div class="col-7 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Actor</th>
                            <th scope="col">Pelicula</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $peli) :?>
                        <tr>
                            <td><?=$peli['Nombre']?></td>
                            <td><?=$peli['title']?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col h3">
                1.5 - Episodios
            </div>
        </div>    
        <div class="row">

        <?php
        $sql="SELECT  S.number as NumeroTemporada, 
        SE.title as NombreSerie,
        E.number as Episodio, 
        E.title as NombreEpisodio,  
        G.name as Genero, 
        count(A.id) as Cantidad_Actores 
        from episodes E 
        inner join seasons S on E.season_id = S.id 
        inner join series SE on S.serie_id = SE.id 
        inner join genres G on SE.genre_id = G.id 
        inner join actor_episode EP on E.id = EP.episode_id 
        inner join actors A on EP.actor_id = A.id 
        group by E.number,E.title,S.number,S.title,SE.title,G.name 
        order by NombreSerie,NumeroTemporada,Episodio";
        $param=consultaSQL($pdo,$sql);     
        ?>

            <div class="col-12 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Temp.</th>
                            <th scope="col">Temp. Name</th>
                            <th scope="col">Num. Epis.</th>
                            <th scope="col">Epis. name</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Actores</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $peli) :?>
                        <tr>
                            <td><?=$peli['NumeroTemporada']?></td>
                            <td><?=$peli['NombreSerie']?></td>
                            <td><?=$peli['Episodio']?></td>
                            <td><?=$peli['NombreEpisodio']?></td>
                            <td><?=$peli['Genero']?></td>
                            <td><?=$peli['Cantidad_Actores']?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col h3">
                1.6 - Rating por Genero
            </div>
        </div>    
        <div class="row">

        <?php
        $sql="SELECT name,ROUND(AVG(rating),2) AS Prom_Rating FROM `movies` m inner join `genres` g on m.`genre_id` = g.id GROUP BY name HAVING AVG(rating) > 5";
        $param=consultaSQL($pdo,$sql);     
        ?>
            <div class="col-4 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Genero</th>
                            <th scope="col">Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $peli) :?>
                        <tr>
                            <td><?=$peli['name']?></td>
                            <td><?=$peli['Prom_Rating']?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col h3">
                1.7 - Episodios 2016
            </div>
        </div>    
        <div class="row">

        <?php
        $var1="2016";
        $sql="SELECT SE.title as NombreSerie, e.release_date, COUNT(E.number) as Cant_Episodios from episodes E inner join seasons S on E.season_id = S.id inner join series SE on S.serie_id = SE.id group by NombreSerie,e.release_date having LEFT(e.release_date,4)='$var1'";
        $param=consultaSQL($pdo,$sql);     
        ?>
            <div class="col-6 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Serie</th>
                            <th scope="col">Año</th>
                            <th scope="col">Cant. 2016</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $peli) :?>
                        <tr>
                            <td><?=$peli['NombreSerie']?></td>
                            <td><?=$peli['release_date']?></td>
                            <td><?=$peli['Cant_Episodios']?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <?php $var1="2019"; ?>
        <div class="row">
            <div class="col h3">
                <?="1.8 - Episodios ". $var1. " (Actual)" ?>
            </div>
        </div>    
        <div class="row">
        <?php
        $sql="SELECT SE.title as NombreSerie, e.release_date, COUNT(E.number) as Cant_Episodios from episodes E inner join seasons S on E.season_id = S.id inner join series SE on S.serie_id = SE.id group by NombreSerie,e.release_date having LEFT(e.release_date,4)='$var1'";
        $param=consultaSQL($pdo,$sql);     
        ?>
            <div class="col-6 m-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Serie</th>
                            <th scope="col">Año</th>
                            <th scope="col"><?="Cant. ". $var1 ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($param as $peli) :?>
                        <tr>
                            <td><?=$peli['NombreSerie']?></td>
                            <td><?=$peli['release_date']?></td>
                            <td><?=$peli['Cant_Episodios']?></td>
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
