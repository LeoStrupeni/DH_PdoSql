<?php

// Funcion Parte 1 y 2 Practica 02 de Julio

function consultaSQL(PDO $pdo,$sql)
{
    $query = $pdo->prepare("$sql");
    $query->execute();
    $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
    return $resultados;
}


// Funciones que no se si estoy usando

function consultaTabla(PDO $pdo, $nombreTabla)
{
    $query = $pdo->prepare("SELECT * FROM $nombreTabla");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function listarDatos(PDO $pdo, $nombreTabla, $id)
{
    $query = $pdo->prepare("SELECT DATE_FORMAT(release_date, '%d de %M de %Y') 'Fecha de estreno', title Titulo FROM $nombreTabla WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}


?>