<?php

include_once 'data.php';
include '../domain/curso.php';

class CursoData extends Data {


    public function insertcurso($curso){
        $conexion = new PDO("sqlsrv:server=DESKTOP-K0GAFL0;database=DB_AulaVirtual_UNA");
    
        $cur_Sigla = $profesor->getcur_Sigla();
        $cur_Nombre = $profesor->getcur_Nombre();
        $cur_CantidadCupos = $profesor->getcur_CantidadCupos();
        $cur_Vigencia = $profesor->getcur_Vigencia();
        $car_Id = $profesor->getcar_Id();
        $pro_Cedula = $profesor->getpro_Cedula();
        
    
       
        $sql = $conexion->prepare("EXEC sp_insertar_Curso ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$cur_Sigla , PDO::PARAM_STR);
        $sql->bindParam(2,$cur_Nombre , PDO::PARAM_STR);
        $sql->bindParam(3,$cur_CantidadCupos , PDO::PARAM_INT);
        $sql->bindParam(4,$cur_Vigencia , PDO::PARAM_STR);
        $sql->bindParam(5,$car_Id , PDO::PARAM_INT);
        $sql->bindParam(6,$pro_Cedula , PDO::PARAM_STR);
      
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

    public function updateprofesor($Cita){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbcita SET tbprofesionalmedicoid='" . $Cita->gettbprofesionalmedicoid() .
        "', tbclienteid='" . $Cita->gettbclienteid() .
        "', tbcitahorainicio='" . $Cita->gettbcitahorainicio() .
        "', tbcitahorafinal='" . $Cita->gettbcitahorafinal() .
        "', tbcitadia='" . $Cita->gettbcitadia() .
        "' WHERE tbcitaid=" . $Cita->getIdCita() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getprofesor(){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcita ;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $citas = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentCita = new Cita($row['tbcitaid'], $row['tbprofesionalmedicoid'], $row['tbclienteid'], $row['tbcitahorainicio'],$row['tbcitahorafinal'],$row['tbcitadia']);
            array_push($citas, $currentCita);
        }
        return $citas;
    }

   

}

