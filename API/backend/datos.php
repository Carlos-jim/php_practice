<?php

//Entrega una informacion
$datos = ["dolar" =>500, "euro" =>700] ;

$peticion = $_GET["variable"];


//Lo convertimos en json
echo json_encode($peticion);