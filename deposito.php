<?php

//print_r($_POST);
$dep= $_POST['cuenta'];
$monto = $_POST['monto'];
mt_srand(time());
$cuenta = mt_rand(1,999999999999);

require_once('conexion.php');

$oraclePDO = new Conexion();
$conexion = $oraclePDO->Conectar();
try {
   
        $conexion->beginTransaction();
        $query= "insert into depositos_retiro (id,cuenta,monto,tipo) values (".$cuenta.",".$dep.",".$monto.",'deposito')";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $conexion->commit();
        header("location:cuentas.php");
        //echo "los datos se almacenaro correctamente";
    
} catch (Exception $ex) {
    echo "Error: ".$ex->getMessage();
}