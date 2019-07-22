<?php

$servidor="mysql:host=".SERVIDOR.";dbname=".DB.";port=".PORT;

    try {
        $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        // echo "<Script>alert('Conectado ... ')</Script>";
    } catch(\Exception $e ) {   
        echo "<Script>alert('Error ... ')</Script>";exit;
    };

?>
