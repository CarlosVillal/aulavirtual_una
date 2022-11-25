<?php

include_once 'data.php';
include '../domain/profesor.php';

class ProfesorData extends Data {

     

    public function insertprofesor($profesor){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

    $pro_Cedula = $profesor->getpro_Cedula();
    $pro_Nombre = $profesor->getpro_Nombre();
    $pro_Apellido1 = $profesor->getpro_Apellido1();
    $pro_Apellido2 = $profesor->getpro_Apellido2();
    $pro_FechaNacimiento = $profesor->getpro_FechaNacimiento();
    $pro_Sexo = $profesor->getpro_Sexo();
    $pro_GradoAcademico = $profesor->getpro_GradoAcademico();
    $pro_AniosExperiencia = $profesor->getpro_AniosExperiencia();

   
    $sql = $conexion->prepare("EXEC sp_insertar_Profesor ?, ?, ?, ?, ?, ?, ?, ?");
    $sql->bindParam(1,$pro_Cedula , PDO::PARAM_STR);
    $sql->bindParam(2,$pro_Nombre , PDO::PARAM_STR);
    $sql->bindParam(3,$pro_Apellido1 , PDO::PARAM_STR);
    $sql->bindParam(4,$pro_Apellido2 , PDO::PARAM_STR);
    $sql->bindParam(5,$pro_FechaNacimiento , PDO::PARAM_STR);
    $sql->bindParam(6,$pro_Sexo , PDO::PARAM_STR);
    $sql->bindParam(7,$pro_GradoAcademico , PDO::PARAM_STR);
    $sql->bindParam(8,$pro_AniosExperiencia , PDO::PARAM_INT);
    $resultado= $sql->execute();
    
    return $resultado;
    }


    public function deleteprofesor($pro_Cedula){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_eliminar_Profesor ?");
        $sql->bindParam(1, $pro_Cedula , PDO::PARAM_STR);
        $resultado= $sql->execute();
        
        return $resultado;
    }


    public function updateprofesor($profesor){
    $serverName = gethostname();
    $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

    $pro_Cedula = $profesor->getpro_Cedula();
    $pro_Nombre = $profesor->getpro_Nombre();
    $pro_Apellido1 = $profesor->getpro_Apellido1();
    $pro_Apellido2 = $profesor->getpro_Apellido2();
    $pro_FechaNacimiento = $profesor->getpro_FechaNacimiento();
    $pro_Sexo = $profesor->getpro_Sexo();
    $pro_GradoAcademico = $profesor->getpro_GradoAcademico();
    $pro_AniosExperiencia = $profesor->getpro_AniosExperiencia();

    $sql = $conexion->prepare("EXEC sp_actualizar_Profesor ?, ?, ?, ?, ?, ?, ?, ?");
    $sql->bindParam(1,$pro_Cedula , PDO::PARAM_STR);
    $sql->bindParam(2,$pro_Nombre , PDO::PARAM_STR);
    $sql->bindParam(3,$pro_Apellido1 , PDO::PARAM_STR);
    $sql->bindParam(4,$pro_Apellido2 , PDO::PARAM_STR);
    $sql->bindParam(5,$pro_FechaNacimiento , PDO::PARAM_STR);
    $sql->bindParam(6,$pro_Sexo , PDO::PARAM_STR);
    $sql->bindParam(7,$pro_GradoAcademico , PDO::PARAM_STR);
    $sql->bindParam(8,$pro_AniosExperiencia , PDO::PARAM_INT);
    $resultado= $sql->execute();

    return $resultado;
    }


    public function getprofesor(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_profesores");
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
     }

   

}

