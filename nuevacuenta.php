<?php

require_once('../menu.php');
require_once('../conexion.php');

$conn = new Conexion();
$conexion = $conn->Conectar();

/*Obtener clientes*/
$query = 'select id,nombre from clientes order by nombre asc';
$comando = $conexion->prepare($query);
$comando->execute();
$cursorClientes = $comando->fetchAll();

/*Obtener tipo de cuenta*/
$query = 'select id, nombre from tipocuenta order by nombre asc';
$comando = $conexion->prepare($query);
$comando->execute();
$cursorTipoCuenta = $comando->fetchAll();

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Nuevo Cliente</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>

<body>
    <div class="container mt-5">
        <h1>Registrar Nueva Cuenta</h1>
        <div class="ror">


            <form action="../cuentas/insertarcuenta.php" method="POST">
                <table>
                    <tr>
                        <td>Cliente: </td>
                        <td><select name="idcliente" class="form-select" aria-label="Default select example">
                                <option selected>Seleccione el cliente</option>
                                <?php foreach ($cursorClientes as $cliente) :  ?>
                                    <option value="<?php echo $cliente['ID'] ?>"><?php echo $cliente['NOMBRE'] ?></option>
                                <?php endforeach  ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Tipo de Cuenta: </td>
                        <td><select name="idtipo" class="form-select" aria-label="Default select example">
                                <option selected>Seleccione el tipo de cuenta</option>
                                <?php foreach ($cursorTipoCuenta as $tipo) :  ?>
                                    <option value="<?php echo $tipo['ID'] ?>"><?php echo $tipo['NOMBRE'] ?></option>
                                <?php endforeach  ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="btn btn-primary btn-block" value="Guardar">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>

<?php
require_once('../piepagina.php');

?>