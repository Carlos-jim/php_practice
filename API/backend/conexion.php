<?php

$link = 'mysql:host=localhost;dbname=api';
$usuario = "root";
$pass = "Carlos69";

try{

    $pdo = new PDO($link,$usuario,$pass);
    echo "Conectado";

}catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>