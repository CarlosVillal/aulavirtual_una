<?php
include_once 'data.php';

class LoginData extends Data {

    public function ingresar($cedula, $contrasenia){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
    
        $sql = $conexion->prepare("EXEC sp_verificar_login ?, ?");

        $sql->bindParam(1,$cedula , PDO::PARAM_STR);
        $sql->bindParam(2,$contrasenia , PDO::PARAM_STR);
        $resultado= $sql->execute();

        return $resultado;
        }



    public function getMatriculas(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_estudiantes_matriculados");
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


   

}