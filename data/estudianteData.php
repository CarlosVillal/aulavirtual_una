<?php

include_once 'data.php';
include '../domain/estudiante.php';

class EstudianteData extends Data {

    public function insertEstudiante($Estudiante){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
    
        $est_Cedula = $Estudiante->getest_Cedula();
        $est_Nombre = $Estudiante->getest_Nombre();
        $est_Apellido1 = $Estudiante->getest_Apellido1();
        $est_Apellido2 = $Estudiante->getest_Apellido2();
        $est_direccion = $Estudiante->getest_direccion();
        $est_TipoBeca = $Estudiante->getest_TipoBeca();
       
        $sql = $conexion->prepare("EXEC sp_insertar_estudiante ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$est_Cedula , PDO::PARAM_STR);
        $sql->bindParam(2,$est_Nombre , PDO::PARAM_STR);
        $sql->bindParam(3,$est_Apellido1 , PDO::PARAM_STR);
        $sql->bindParam(4,$est_Apellido2 , PDO::PARAM_STR);
        $sql->bindParam(5,$est_direccion , PDO::PARAM_STR);
        $sql->bindParam(6,$est_TipoBeca , PDO::PARAM_STR);

        $resultado= $sql->execute();

        return $resultado;
        }


     public function deleteEstudiante($est_Cedula){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_eliminar_estudiante ?");
        $sql->bindParam(1, $est_Cedula , PDO::PARAM_STR);
        $resultado= $sql->execute();
        
        return $resultado;
    }

    public function updateEstudiante($Estudiante){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $est_Cedula = $Estudiante->getest_Cedula();
        $est_Nombre = $Estudiante->getest_Nombre();
        $est_Apellido1 = $Estudiante->getest_Apellido1();
        $est_Apellido2 = $Estudiante->getest_Apellido2();
        $est_direccion = $Estudiante->getest_direccion();
        $est_TipoBeca = $Estudiante->getest_TipoBeca();
       
        $sql = $conexion->prepare("EXEC sp_actualizar_estudiante ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$est_Cedula , PDO::PARAM_STR);
        $sql->bindParam(2,$est_Nombre , PDO::PARAM_STR);
        $sql->bindParam(3,$est_Apellido1 , PDO::PARAM_STR);
        $sql->bindParam(4,$est_Apellido2 , PDO::PARAM_STR);
        $sql->bindParam(5,$est_direccion , PDO::PARAM_STR);
        $sql->bindParam(6,$est_TipoBeca , PDO::PARAM_STR);

        $resultado= $sql->execute();

        return $resultado;
    }

    public function getEstudiantes(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_estudiantes");
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
     }


   

}