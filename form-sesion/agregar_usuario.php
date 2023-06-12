<?php

//Ciframos la contraseña
//echo password_hash("Carlos69", PASSWORD_DEFAULT)."\n";


//Guardamos la informacion en unas variables
$usuario_nuevo = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];


//guardamos en la variable contrasena, la contrasena cifrada
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);


// comprobamos que la contrasena2 sea igual a la contrasena

if (password_verify($contrasena2, $contrasena)) {
    echo 'La contraseña es válida!';

    //Conectamos a la base de datos
    include_once "../yt_color_practice/conexion.php";

    //Guardamos en la base de datos
    $sql_agregar = "INSERT INTO usuarios (nombre, contrasena) values (?,?)";
    $sentencia_agregar = $pdo->prepare($sql_agregar);


    //Verificamos que se ejecute correctamente
    if($sentencia_agregar->execute(array($usuario_nuevo, $contrasena))){
        echo "Agregado<br>";
    }else{
        echo "Error<br>";
    }


    //cerramos conexion base de datos y sentencia
    $sentencia_agregar = null;
    $pdo = null;

    //Redirecciona al index.php
    //header("location:index.php"); 


} else {
    echo 'La contraseña no es válida.';
}

//Verificamos que todo se guarde correctamente
echo "<pre>";

var_dump($usuario_nuevo);
var_dump($contrasena);
var_dump($contrasena2);

echo "</pre>";

?>