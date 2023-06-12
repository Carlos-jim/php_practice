<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>


    <!-- Enviamos las inf al archivo agregar_usuario.php-->
    <form action="agregar_usuario.php" method="POST">
        <input type="text" name="nombre_usuario" placeholder="Ingresa el nombre">
        <input type="text" name="contrasena" placeholder="Ingresa la contraseña">
        <input type="text" name="contrasena2" placeholder="Ingresa nuevamente la contraseña">

        <button type="submit">Guardar</button>
    </form>
</body>
</html>