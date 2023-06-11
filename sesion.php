<?php

//Siempre usar al tener una pagina con inicio de sesion
session_start();

$login = "Ignacio";  //Este tiene el permiso de administrador

//Asociamos con un administrador
$_SESSION["admin"] = $login; //Esto es un array con administradores, invitados, etc

if( isset($_SESSION["admin"])){
    //Muestra si el usuario tiene iniciado sesion
}


?>