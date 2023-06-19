<?php

 //Conectamos a la base de datos
 include_once "../yt_color_practice/conexion.php";


//Ciframos la contraseña
//echo password_hash("Carlos69", PASSWORD_DEFAULT)."\n";


//Guardamos la informacion en unas variables
$usuario_nuevo = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];
$contrasena2 = $_POST['contrasena2'];

//Verificamso que el usuario existe
$sql = "SELECT * FROM usuarios WHERE nombre = ?";
//Preparamos la base de datos
$sentencia = $pdo->prepare($sql);
//Ejecutamos
$sentencia->execute(array($usuario_nuevo));
$resultado = $sentencia->fetch();

//Comprobamos que se ejecute correctamente
var_dump($resultado);

//Hacemos la comprobacion del usuario este repetido o no
if($resultado){
    //Se detiene si existe un usuario, podemos redireccionar a otro lado
    echo "Existe este usuario";
    die();
} //Sino existe sigue con el codigo

//guardamos en la variable contrasena, la contrasena cifrada
$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);


// comprobamos que la contrasena2 sea igual a la contrasena

if (password_verify($contrasena2, $contrasena)) {
    echo 'La contraseña es válida!';


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