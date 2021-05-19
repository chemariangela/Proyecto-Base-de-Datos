<?php

//print_r($_POST);

$idcliente = $_POST['idcliente'];
$idtipo = $_POST['idtipo'];


require_once('../conexion.php');

$oraclePDO = new Conexion();
$conexion = $oraclePDO->Conectar();
try {
    if($idcliente !=null and $idtipo!=null){
        $conexion->beginTransaction();
        $query= "insert into cuentas(idcliente,idtipocuenta,saldo) values (".$idcliente.",".$idtipo.",0)";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $conexion->commit();
        header("location:../clientes/Clientes.php");
        //echo "los datos se almacenaro correctamente";
    }
} catch (Exception $ex) {
    echo "Error: ".$ex->getMessage();
}