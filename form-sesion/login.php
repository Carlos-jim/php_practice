<?php

include_once "../yt_color_practice/conexion.php";

//Capturamos o guardamos los datos del login en una variable
$usuario_login = $_POST["nombre_usuario"];
$contrasena_login = $_POST["contrasena"];

//Comprobamos que se guarden los datos
echo "<pre>";
var_dump($usuario_login);
var_dump($contrasena_login);
echo "</pre>";

//VERIFICAMOS QUE EL USUARIO EXISTA EN LA BASE DE DATOS
$sql = "SELECT * FROM usuarios WHERE nombre = ?";
//Preparamos la base de datos
$sentencia = $pdo->prepare($sql);
//Ejecutamos
$sentencia->execute(array($usuario_login));
$resultado = $sentencia->fetch();

//Comprobamos que se ejecute correctamente
echo "<pre>";
var_dump($resultado);
echo "</pre>";

//si el resultado es positivo de cambia a negativo por el !
if (!$resultado) {
    //Matamos el codigo
    echo "NO EXISTE EL USUARIO";
    die();
}

echo "Usuario verificado";
