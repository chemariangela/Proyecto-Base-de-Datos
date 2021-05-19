<?php

//print_r($_POST);

$nombre = $_POST['txtUsuario'];
$contrasena = $_POST['txtContrasena'];


require_once('conexion.php');

$oraclePDO = new Conexion();
$conexion = $oraclePDO->Conectar();
try {
    if($nombre !=null and $contrasena!=null){
        $conexion->beginTransaction();
        $stmt = $conexion->prepare("select * from usuario where Nombre = ? and Contra = ?");
        $stmt->bindParam(1,$nombre);
        $stmt->bindParam(2,$contrasena);
        $stmt->execute();
        $cursor = $stmt->fetch();   
        $conexion->commit();    
        if($cursor !=null){
            header("location:menu.php");
        }
        else{
            //echo "Usuario o Contrasena incorrectos";
            header("location:login.php");
        }
    }
} catch (Exception $ex) {
    echo "Error: ".$ex->getMessage();
}