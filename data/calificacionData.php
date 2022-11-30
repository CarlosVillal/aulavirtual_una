<?php

include_once 'data.php';
include '../domain/calificacion.php';

class CalificacionData extends Data {

    public function insertCalificacion($Calificacion){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
    

        $cal_Id = $Calificacion->getcal_Id();
        $cal_Examen1 = $Calificacion->getcal_Examen1();
        $cal_Examen2 = $Calificacion->getcal_Examen2();
        $cal_Quiz1 = $Calificacion->getcal_Quiz1();
        $cal_Quiz2 = $Calificacion->getcal_Quiz2();
        $cal_Proyecto1 = $Calificacion->getcal_Proyecto1();
        $cal_Proyecto2 = $Calificacion->getcal_Proyecto2();
        $cur_NotaFinal = $Calificacion->getcur_NotaFinal();
        $cur_est_Id = $Calificacion->getcur_est_Id();
       
        $sql = $conexion->prepare("EXEC sp_insertar_Calificacion ?, ?, ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$cal_Id , PDO::PARAM_INT);
        $sql->bindParam(2,$cal_Examen1 , PDO::PARAM_INT);
        $sql->bindParam(3,$cal_Examen2 , PDO::PARAM_INT);
        $sql->bindParam(4,$cal_Quiz1 , PDO::PARAM_INT);
        $sql->bindParam(5,$cal_Quiz2 , PDO::PARAM_INT);
        $sql->bindParam(6,$cal_Proyecto1 , PDO::PARAM_INT);
        $sql->bindParam(7,$cal_Proyecto2 , PDO::PARAM_INT);
        $sql->bindParam(8,$cur_NotaFinal , PDO::PARAM_INT);
        $sql->bindParam(8,$cur_est_Id , PDO::PARAM_INT);
        $resultado= $sql->execute();

        return $resultado;
        }


     public function deleteCalificacion($cal_Id){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_eliminar_Calificacion ?");
        $sql->bindParam(1, $cal_Id , PDO::PARAM_INT);
        $resultado= $sql->execute();
        
        return $resultado;
    }


    public function updateCalificacion($Calificacion){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        
        $cal_Id = $Calificacion->getcal_Id();
        $cal_Examen1 = $Calificacion->getcal_Examen1();
        $cal_Examen2 = $Calificacion->getcal_Examen2();
        $cal_Quiz1 = $Calificacion->getcal_Quiz1();
        $cal_Quiz2 = $Calificacion->getcal_Quiz2();
        $cal_Proyecto1 = $Calificacion->getcal_Proyecto1();
        $cal_Proyecto2 = $Calificacion->getcal_Proyecto2();
        $cur_NotaFinal = $Calificacion->getcur_NotaFinal();
        $cur_est_Id = $Calificacion->getcur_est_Id();


        $sql = $conexion->prepare("EXEC sp_actualizar_Calificacion ?, ?, ?, ?, ?, ?, ?, ?");
         $sql->bindParam(1,$cal_Id , PDO::PARAM_INT);
        $sql->bindParam(2,$cal_Examen1 , PDO::PARAM_INT);
        $sql->bindParam(3,$cal_Examen2 , PDO::PARAM_INT);
        $sql->bindParam(4,$cal_Quiz1 , PDO::PARAM_INT);
        $sql->bindParam(5,$cal_Quiz2 , PDO::PARAM_INT);
        $sql->bindParam(6,$cal_Proyecto1 , PDO::PARAM_INT);
        $sql->bindParam(7,$cal_Proyecto2 , PDO::PARAM_INT);
        $sql->bindParam(8,$cur_NotaFinal , PDO::PARAM_INT);
        $sql->bindParam(8,$cur_est_Id , PDO::PARAM_INT);

        $resultado= $sql->execute();

        return $resultado;
    }


     public function getCalificacionEspecifica(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_calificacion");
        $sql->bindParam(1, $est_Cedula , PDO::PARAM_STR);
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
     }


}