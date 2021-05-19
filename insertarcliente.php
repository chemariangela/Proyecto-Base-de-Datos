<?php

//print_r($_POST);
$nit = $_POST['nit'];
$nombre = $_POST['nombre'];  
$dpi = $_POST['dpi'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
mt_srand(time());
$cuenta = mt_rand(1,999999999999);

require_once('conexion.php');

$oraclePDO = new Conexion();
$conexion = $oraclePDO->Conectar();
try {
    if($nombre !=null and $dpi!=null and $email!=null and $telefono!=null){
        $conexion->beginTransaction();
        $query= "insert into cliente (id,id_cuenta,nombre,cuenta,dpi,telefono,email) values (".$nit.",".$cuenta.",'".$nombre."','ahorro','".$dpi."',".$telefono.",'".$email."')";
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $conexion->commit();
        header("location:Clientes.php");
        //echo "los datos se almacenaro correctamente";
    }
} catch (Exception $ex) {
    echo "Error: ".$ex->getMessage();
}
