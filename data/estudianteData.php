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
        $est_FechaNacimiento = $Estudiante->getest_FechaNacimiento();
        $est_Carrera = $Estudiante->getest_Carrera();
       
        $sql = $conexion->prepare("EXEC sp_insertar_estudiante ?, ?, ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$est_Cedula , PDO::PARAM_STR);
        $sql->bindParam(2,$est_Nombre , PDO::PARAM_STR);
        $sql->bindParam(3,$est_Apellido1 , PDO::PARAM_STR);
        $sql->bindParam(4,$est_Apellido2 , PDO::PARAM_STR);
        $sql->bindParam(5,$est_direccion , PDO::PARAM_STR);
        $sql->bindParam(6,$est_TipoBeca , PDO::PARAM_STR);
        $sql->bindParam(7,$est_FechaNacimiento , PDO::PARAM_STR);
        $sql->bindParam(8,$est_Carrera , PDO::PARAM_STR);
        $resultado= $sql->execute();

   $contrasenia = "$est_Cedula$est_Nombre";
    $dat = "Estudiante";

    $sql2 = $conexion->prepare("EXEC sp_insertar_login ?, ?, ?");
    $sql2->bindParam(1,$est_Cedula , PDO::PARAM_STR);
    $sql2->bindParam(2,$contrasenia , PDO::PARAM_STR);
    $sql2->bindParam(3,$dat , PDO::PARAM_STR);
    $resultado= $sql2->execute();

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
        $est_FechaNacimiento = $Estudiante->getest_FechaNacimiento();
        $est_Carrera = $Estudiante->getest_Carrera();
       
        $sql = $conexion->prepare("EXEC sp_actualizar_estudiante ?, ?, ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$est_Cedula , PDO::PARAM_STR);
        $sql->bindParam(2,$est_Nombre , PDO::PARAM_STR);
        $sql->bindParam(3,$est_Apellido1 , PDO::PARAM_STR);
        $sql->bindParam(4,$est_Apellido2 , PDO::PARAM_STR);
        $sql->bindParam(5,$est_direccion , PDO::PARAM_STR);
        $sql->bindParam(6,$est_TipoBeca , PDO::PARAM_STR);
        $sql->bindParam(7,$est_FechaNacimiento , PDO::PARAM_STR);
        $sql->bindParam(8,$est_Carrera , PDO::PARAM_STR);

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

     public function getEstudianteEspecifico($est_Cedula){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_estudiante_especifico ?");
        $sql->bindParam(1, $est_Cedula , PDO::PARAM_STR);
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
     }


     public function reporteEstudiantePorCurso(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_reporte_estudiantes_por_curso");
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
     }

     public function getCursosMatriculados($est_Cedula){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_curso_inscrito ?");
        $sql->bindParam(1, $est_Cedula , PDO::PARAM_STR);
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
     }

     public function getHistoricoCursosMatriculados($est_Cedula){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_curso_inscrito_est ?");
        $sql->bindParam(1, $est_Cedula , PDO::PARAM_STR);
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
     }
   

}