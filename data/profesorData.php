<?php

include_once 'data.php';
include '../domain/profesor.php';

class ProfesorData extends Data {


    public function insertprofesor($profesor){
      //  $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
     //   $conn->set_charset('utf8');

    $queryInsert = "EXEC sp_insertar_Profesor '" .
        $profesor->getpro_Cedula() . "','" .
        $profesor->getpro_Nombre() . "','" .
        $profesor->getpro_Apellido1() . "','" .
        $profesor->getpro_Apellido2() . "','" .
        $profesor->getpro_FechaNacimiento() . "','" .
        $profesor->getpro_Sexo() . "','" .
        $profesor->getpro_GradoAcademico() . "','" .
        $profesor->getpro_AniosExperiencia() . "'";

        $conn = sqlsrv_query($conn, $queryInsert);
//exec sp_insertar_Profesor '11611', 'Carlos', 'Villalobos','Baltodano' ,
//'2022-11-10','m','diplomado',5 
               // $result = mysqli_query($conn, $queryInsert);
               // mysqli_close($conn);
                return $conn;
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

