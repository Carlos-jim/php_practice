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


#Mostramos los valores del array
var_dump($resultado)
?> 

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <h1>Hello, world!</h1>

    <div class="container mt-5">
        <div class="row">

            <div class="col-md-6">

                <?php foreach($resultado as $dato):?>


                <div class="alert alert-<?php echo $dato["color"]?>" role="alert">
                    <?php echo $dato["color"]?>
                    <?php echo "- ".$dato["descripcion"]?>
                </div>

                <?php endforeach?>

            </div>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>