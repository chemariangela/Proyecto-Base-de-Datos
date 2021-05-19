<?php

require_once('menu.php');
require_once('conexion.php');



$query = 'select * from Cliente';
$conn = new Conexion();
$conexion = $conn->Conectar();



$comando = $conexion->prepare($query);
$comando->execute();

$cursor = $comando->fetchAll();

//var_dump($cursor);

?>


<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Catalogo de Clientes</title>
</head>

<body>
    <h1>Catalogo de Clientes</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <container>
        <a class="btn btn-success btn-sm" href="Crear.html" role="button">Nuevo Cliente</a>
    </container>
    <td>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">DPI</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($cursor as $cliente) :  ?>

                    <tr>
                        <th scope="row"><?php echo $cliente['ID_CUENTA'] ?></th>
                        <td><?php echo $cliente['NOMBRE'] ?></td>
                        <td><?php echo $cliente['DPI'] ?></td>
                        <td><?php echo $cliente['TELEFONO'] ?></td>
                        <td><?php echo $cliente['EMAIL'] ?></td>
                        <td> <a class="btn btn-warning btn-sm" href="Editar.php?id=<?php echo $cliente['ID'] ?>" role="button">Editar</a></td>
                        <td><a class="btn btn-danger btn-sm" href="eliminarcliente.php?id=<?php echo $cliente['ID'] ?>" role="button">Eliminar</a></td>
                    </tr>

                <?php endforeach  ?>
            </tbody>
        </table>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>

<?php
require_once('piepagina.php');

?>