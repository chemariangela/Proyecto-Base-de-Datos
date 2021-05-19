<?php

//print_r($_POST);
$salida = $_POST['salida'];
$entrada = $_POST['entrada'];  
$monto = $_POST['monto'];
mt_srand(time());
$cuenta = mt_rand(1,999999999999);

require_once('conexion.php');

$oraclePDO = new Conexion();
$conexion = $oraclePDO->Conectar();
try {
    
        $conexion->beginTransaction();
        $query= "insert into Transferencia (Id,Cuenta_salida,Cuenta_entrada,Cantidad) values (".$cuenta.",".$salida.",".$entrada.",".$monto.")";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $conexion->commit();
        header("location:cuentas.php");
        //echo "los datos se almacenaro correctamente";
    
} catch (Exception $ex) {
    echo "Error: ".$ex->getMessage();
}
