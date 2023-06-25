<?php

header('Content-type: application/json; ');
header("Access-Control-Allow-Origin: *");

if ($_GET["moneda"] == "euro" || $_GET["moneda"] == "dolar")  {
    //conenctamos a la base de datos
    include_once "conexion.php";

    //Sentencia para traer los datos de la base de datos
    $sql = "SELECT * FROM " . $_GET["moneda"];
    //Preparamos la base de datos
    $sentencia = $pdo->prepare($sql);
    //Ejecutamos
    $sentencia->execute();
    //FetchAll saca varias cosas y Fetch solo una cosa
    $datos = $resultado = $sentencia->fetchAll();

}else{
    echo "Solicitud no encontrada";
}

//Lo convertimos en json
echo json_encode($datos);