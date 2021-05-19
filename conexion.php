<?php

class Conexion
{
    private $db ='oci:dbname=localhost/XEPDB1';
    private $user = 'BANCOS';
    private $pass = '123456';

    public function Conectar()
    {
        try {
            $conexion = new PDO($this->db, $this->user, $this->pass);
            $conexion->exec("SET CARACTER SET utf8");
            if($conexion){
                //echo 'Conexion establecida';
                return $conexion;
            }

        } catch (Exception $e) {
            echo "Error al intentar conectar: ".$e->getMessage();
        }
    }
}
