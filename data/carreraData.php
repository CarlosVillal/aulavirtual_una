<?php

include_once 'data.php';
include '../domain/carrera.php';

class CarreraData extends Data {

    public function insertCarrera($carrera){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
    
        $car_Id = $carrera->getcar_Id();
        $car_Nombre = $carrera->getcar_Nombre();
    
        $sql = $conexion->prepare("EXEC sp_insertar_carrera ?, ?");

        $sql->bindParam(1,$car_Id , PDO::PARAM_INT);
        $sql->bindParam(2,$car_Nombre , PDO::PARAM_STR);
        $resultado= $sql->execute();

        return $resultado;
        }


    public function deleteCarrera($idcliente){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_eliminar_carrera ?");
        $sql->bindParam(1, $idcliente , PDO::PARAM_INT);
        $resultado= $sql->execute();
        
        return $resultado;
    }

    public function updateCarrera($carrera){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $car_Id = $carrera->getcar_Id();
        $car_Nombre = $carrera->getcar_Nombre();
    
        $sql = $conexion->prepare("EXEC sp_actualizar_carrera ?, ?");

        $sql->bindParam(1,$car_Id , PDO::PARAM_INT);
        $sql->bindParam(2,$car_Nombre , PDO::PARAM_STR);
        $resultado= $sql->execute();

        return $resultado;
    }

    public function getCarreras(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_carreras");
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


   

}