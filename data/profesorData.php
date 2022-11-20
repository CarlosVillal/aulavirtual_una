<?php

include_once 'data.php';
include '../domain/profesor.php';

class ProfesorData extends Data {


    public function insertprofesor($profesor){
        $conexion = new PDO("sqlsrv:server=DESKTOP-K0GAFL0;database=DB_AulaVirtual_UNA");

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
        $conexion = new PDO("sqlsrv:server=DESKTOP-K0GAFL0;database=DB_AulaVirtual_UNA");
        $pro_Cedula = $profesor->getpro_Cedula();
        $sql = $conexion->prepare("EXEC sp_eliminar_Profesor ?");
        $sql->bindParam(1,$pro_Cedula , PDO::PARAM_STR);
        $resultado= $sql->execute();
        return $resultado;

    }

    // public function updateprofesor($Cita){
    //     $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
    //     $conn->set_charset('utf8');
    //     $queryUpdate = "UPDATE tbcita SET tbprofesionalmedicoid='" . $Cita->gettbprofesionalmedicoid() .
    //     "', tbclienteid='" . $Cita->gettbclienteid() .
    //     "', tbcitahorainicio='" . $Cita->gettbcitahorainicio() .
    //     "', tbcitahorafinal='" . $Cita->gettbcitahorafinal() .
    //     "', tbcitadia='" . $Cita->gettbcitadia() .
    //     "' WHERE tbcitaid=" . $Cita->getIdCita() . ";";

    //     $result = mysqli_query($conn, $queryUpdate);
    //     mysqli_close($conn);

    //     return $result;
    // }

    public function getprofesor(){
        $conexion = new PDO("sqlsrv:server=DESKTOP-K0GAFL0;database=DB_AulaVirtual_UNA");
        $sql = $conexion->prepare("EXEC sp_ver_profesores");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        var_dump($resultado);
     }

   

}

