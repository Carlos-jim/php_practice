<?php

#CONECTAR
include_once "conexion.php";

#Toma los valores de la tabla colores
$sql_leer = "SELECT * FROM colores";

#conecta con la base de datos
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();

#se crea una array con los valores de la base de datos
$resultado = $gsent->fetchAll();

////AGREGAR////

if ($_POST) {
    $color =  $_POST["Color"];
    $descripcion = $_POST["Descripcion"];
    $sql_agregar = "INSERT INTO colores (color, descripcion) values (?,?)";
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($color,$descripcion));

    header("location:index.php"); #Redirecciona al index.php 

}

#Detectar metodo get (editar)
if ($_GET){

    #Capturamos los datos
    $id = $_GET["id"];

    #Toma el valor solicitado
    $sql_unico = "SELECT * FROM colores WHERE id=?";

    #conecta con la base de datos
    $gsent_unico = $pdo->prepare($sql_unico);
    
    #Ejecuta solo al id que se solicito
    $gsent_unico->execute(array($id));

    #se crea una array con los valores de la base de datos
    $resultado_unico = $gsent_unico->fetch();
}


#Mostramos los valores del array
//var_dump($resultado_unico);
?> 

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://kit.fontawesome.com/714e9fea28.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>


    <div class="container mt-5">
        <div class="row">

        <!-- Consumir la base de datos -->
            <div class="col-md-6">

                <?php foreach($resultado as $dato):?>


                <div class="alert alert-<?php echo $dato["color"]?>" role="alert">
                    <?php echo $dato["color"]?>
                    <?php echo "- ".$dato["descripcion"]?>

                    <a href="eliminar.php?id=<?php echo $dato["id"]?>" class="float-right ml-6" ><i class="fa-solid fa-trash"></i></a>

                    <a href="index.php?id=<?php echo $dato["id"]?>" class="float-right"><i class="fa-regular fa-pen-to-square" ></i></a>
                </div>

                <?php endforeach?>

            </div>

            <!-- Agregar, editar contenido a la base de datos -->
            <div class="col-md-6">

            <?php if(!$_GET): ?> <!--#Detecta si no hay un elemento get y MOSTRARA ESTO, SI HAY METODO GET NO LO MOSTRARA-->
                <h2>Agregar elementos</h2>
                <form method="POST">
                    <input type="text" class="form-control" name="color">
                    <input type="text" class="form-control mt-3" name="descripcion">
                    <button class="btn btn-primary mt-3">Agregar</button>
                </form>
            <?php endif?>

                <?php if($_GET): ?> <!--#Detecta si hay un elemento get y MOSTRARA ESTO, SI  no HAY  METODO GET NO LO MOSTRARA-->
                    <h2>Editar elementos</h2>
                    <form method="GET" action="editar.php">
                        <input type="text" class="form-control" name="color" value="<?php echo $resultado_unico["color"] ?>">
                        <input type="text" class="form-control mt-3" name="descripcion" value="<?php echo $resultado_unico["descripcion"] ?>">
                        <input type="hidden" name="id" value="<?php echo $resultado_unico["id"] ?>">
                        <button class="btn btn-primary mt-3">Agregar</button>
                    </form>
                
                <?php endif?>
            </div>

            

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>