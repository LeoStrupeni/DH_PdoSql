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

function consultaTablasSQL(PDO $pdo, $nombreTabla)
{
    $query = $pdo->prepare("SELECT * FROM $nombreTabla");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function consultaInnerTablasSQL(PDO $pdo, $tabla1, $tabla2, $cruce1, $cruce2)
{
    $query = $pdo->prepare("SELECT t1.*,t2.* FROM $tabla1 t1 inner join $tabla2 t2 on t1.$cruce1 = t2.$cruce2");
    $query->execute();
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function listarDatos(PDO $pdo, $nombreTabla, $id)
{
    $query = $pdo->prepare("SELECT * FROM $nombreTabla WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}


?>  