<?php

include_once 'data.php';
include '../domain/rubrica.php';

class RubricaData extends Data {

    public function insertRubrica($Rubrica){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
        
    $rub_Id = $Rubrica->getrub_Id();
    $rub_Examen1 = $Rubrica->getrub_Examen1();
    $rub_Examen2 = $Rubrica->getrub_Examen2();
    $rub_Quiz1 = $Rubrica->getrub_Quiz1();
    $rub_Quiz2 = $Rubrica->getrub_Quiz2();
    $rub_Proyecto1 = $Rubrica->getrub_Proyecto1();
    $rub_Proyecto2 = $Rubrica->getrub_Proyecto2();
    $cur_Sigla = $Rubrica->getcur_Sigla();


    $sql = $conexion->prepare("EXEC sp_insertar_Rubrica ?, ?, ?, ?, ?, ?, ?, ?");
    $sql->bindParam(1,$rub_Id , PDO::PARAM_INT);
    $sql->bindParam(2,$rub_Examen1 , PDO::PARAM_INT);
    $sql->bindParam(3,$rub_Examen2 , PDO::PARAM_INT);
    $sql->bindParam(4,$rub_Quiz1 , PDO::PARAM_INT);
    $sql->bindParam(5,$rub_Quiz2 , PDO::PARAM_INT);
    $sql->bindParam(6,$rub_Proyecto1 , PDO::PARAM_INT);
    $sql->bindParam(7,$rub_Proyecto2 , PDO::PARAM_INT);
    $sql->bindParam(8,$cur_Sigla , PDO::PARAM_STR);
    $resultado= $sql->execute();
    
    return $resultado;
    }


    public function deleteRubrica($rub_Id){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_eliminar_Rubrica ?");
        $sql->bindParam(1, $rub_Id , PDO::PARAM_INT);
        $resultado= $sql->execute();
        
        return $resultado;
    }


    public function updateRubrica($Rubrica){
    $serverName = gethostname();
    $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

    $rub_Id = $Rubrica->getrub_Id();
    $rub_Examen1 = $Rubrica->getrub_Examen1();
    $rub_Examen2 = $Rubrica->getrub_Examen2();
    $rub_Quiz1 = $Rubrica->getrub_Quiz1();
    $rub_Quiz2 = $Rubrica->getrub_Quiz2();
    $rub_Proyecto1 = $Rubrica->getrub_Proyecto1();
    $rub_Proyecto2 = $Rubrica->getrub_Proyecto2();
    $cur_Sigla = $Rubrica->getcur_Sigla();


    $sql = $conexion->prepare("EXEC sp_actualizar_Rubrica ?, ?, ?, ?, ?, ?, ?, ?");
    $sql->bindParam(1,$rub_Id , PDO::PARAM_INT);
    $sql->bindParam(2,$rub_Examen1 , PDO::PARAM_INT);
    $sql->bindParam(3,$rub_Examen2 , PDO::PARAM_INT);
    $sql->bindParam(4,$rub_Quiz1 , PDO::PARAM_INT);
    $sql->bindParam(5,$rub_Quiz2 , PDO::PARAM_INT);
    $sql->bindParam(6,$rub_Proyecto1 , PDO::PARAM_INT);
    $sql->bindParam(7,$rub_Proyecto2 , PDO::PARAM_INT);
    $sql->bindParam(8,$cur_Sigla , PDO::PARAM_STR);
    $resultado= $sql->execute();
    
    return $resultado;
    }


    public function getRubricas(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_rubricas");
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
     }

}

