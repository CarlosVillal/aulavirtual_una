<?php
include_once 'data.php';
include '../domain/matricula.php';

class MatriculaData extends Data {

    public function insertMatricula($matricula){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
    
        $cur_est_Id = $matricula->getcur_est_Id();
        $cur_Sigla = $matricula->getcur_Sigla();
        $est_Cedula = $matricula->getest_Cedula();
    
        $sql = $conexion->prepare("EXEC sp_insertar_matricula ?, ?, ?");

        $sql->bindParam(1,$cur_est_Id , PDO::PARAM_INT);
        $sql->bindParam(2,$cur_Sigla , PDO::PARAM_STR);
        $sql->bindParam(3,$est_Cedula , PDO::PARAM_STR);
        $resultado= $sql->execute();

        return $resultado;
        }


    public function deleteMatricula($idMatricula){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_eliminar_matricula ?");
        $sql->bindParam(1, $idMatricula , PDO::PARAM_INT);
        $resultado= $sql->execute();
        
        return $resultado;
    }

    // public function updateMatricula($carrera){
    //     $serverName = gethostname();
    //     $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

    //     $car_Id = $carrera->getcar_Id();
    //     $car_Nombre = $carrera->getcar_Nombre();
    
    //     $sql = $conexion->prepare("EXEC sp_actualizar_carrera ?, ?");

    //     $sql->bindParam(1,$car_Id , PDO::PARAM_INT);
    //     $sql->bindParam(2,$car_Nombre , PDO::PARAM_STR);
    //     $resultado= $sql->execute();

    //     return $resultado;
    // }

    public function getMatriculas(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_estudiantes_matriculados");
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


   

}