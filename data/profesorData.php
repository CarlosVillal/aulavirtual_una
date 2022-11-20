<?php

include_once 'data.php';
include '../domain/profesor.php';

class ProfesorData extends Data {


    public function insertprofesor($profesor){
    $conexion = new PDO("sqlsrv:server=DESKTOP-JP735J3;database=DB_AulaVirtual_UNA");

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




    public function deleteprofesor($idcita){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbcita where tbcitaid=" . $idcita . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

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

    // public function getprofesor(){
    //     $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
    //     $conn->set_charset('utf8');

    //     $querySelect = "SELECT * FROM tbcita ;";
    //     $result = mysqli_query($conn, $querySelect);
    //     mysqli_close($conn);
    //     $citas = [];
    //     while ($row = mysqli_fetch_array($result)) {
    //         $currentCita = new Cita($row['tbcitaid'], $row['tbprofesionalmedicoid'], $row['tbclienteid'], $row['tbcitahorainicio'],$row['tbcitahorafinal'],$row['tbcitadia']);
    //         array_push($citas, $currentCita);
    //     }
    //     return $citas;
    // }

   

}

