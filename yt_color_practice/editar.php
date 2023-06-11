<?php

/*echo 'editar.php?id=1&color=success&descripcion=este es un color verde';
echo "<br>";*/

$id = $_GET["id"];  #obtenemos los datos y los almacenamos en una variable
$color = $_GET["color"];
$descripcion = $_GET["descripcion"];

/*echo $id;
echo "<br>";
echo $color;
echo "<br>";
echo $descripcion;*/


include_once "conexion.php"; #Llamamos a la conexion

#Hacemos nuestro SQL para modificar
$sql_editar = "UPDATE colores SET color=?, descripcion=? WHERE id=?";

#Preparamos la query
$sentencia_editar = $pdo->prepare($sql_editar);
#Ejecutamos
$sentencia_editar->execute(array($color, $descripcion, $id));

header("location:index.php"); 