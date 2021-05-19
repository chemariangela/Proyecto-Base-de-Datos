<?php

//print_r($_POST);

$id = $_POST['txtid'];
$nombre = $_POST['nombre'];
$dpi = $_POST['dpi'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

require_once('conexion.php');

$oraclePDO = new Conexion();
$conexion = $oraclePDO->Conectar();
try {
    if($nombre !=null and $dpi!=null and $email!=null and $telefono!=null){
        $conexion->beginTransaction();
        $query= "update cliente set nombre='".$nombre."',dpi='".$dpi."'
        ,telefono=".$telefono.",email='".$email."' where id=".$id;
        //echo $query;
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $conexion->commit();
        header("location:Clientes.php");
        //echo "los datos se almacenaro correctamente";
    }
} catch (Exception $ex) {
    echo "Error: ".$ex->getMessage();
}