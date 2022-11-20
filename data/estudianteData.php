<?php

include_once 'data.php';
include '../domain/estudiante.php';

class EstudianteData extends Data {


    public function insertEstudiante($Estudiante){
        $conexion = new PDO("sqlsrv:server=DESKTOP-K0GAFL0;database=DB_AulaVirtual_UNA");
    
        $est_Cedula = $Estudiante->getest_Cedula();
        $est_Nombre = $Estudiante->getest_Nombre();
        $est_Apellido1 = $Estudiante->getest_Apellido1();
        $est_Apellido2 = $Estudiante->getest_Apellido2();
        $est_direccion = $Estudiante->getest_direccion();
        $est_TipoBeca = $Estudiante->getest_TipoBeca();
       
        $sql = $conexion->prepare("EXEC sp_insertar_estudiante ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$est_Cedula , PDO::PARAM_STR);
        $sql->bindParam(2,$est_Nombre , PDO::PARAM_STR);
        $sql->bindParam(3,$est_Apellido1 , PDO::PARAM_STR);
        $sql->bindParam(4,$est_Apellido2 , PDO::PARAM_STR);
        $sql->bindParam(5,$est_direccion , PDO::PARAM_STR);
        $sql->bindParam(6,$est_TipoBeca , PDO::PARAM_STR);

        $resultado= $sql->execute();
        return $resultado;
    
        }


     public function deleteEstudiante($est_Cedula){
        $conexion = new PDO("sqlsrv:server=DESKTOP-K0GAFL0;database=DB_AulaVirtual_UNA");
        $sql = $conexion->prepare("EXEC sp_eliminar_Profesor ?");
        $sql->bindParam(1,$est_Cedula , PDO::PARAM_STR);
        $resultado= $sql->execute();
        return $resultado;

    }

    public function updateCliente($Cliente){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbcliente SET tbclientenombre='" . $Cliente->getNombre() .
        "', tbclienteapellido1='" . $Cliente->getApellido1() .
        "', tbclienteapellido2='" . $Cliente->getApellido2() .
        "' WHERE tbclienteid=" . $Cliente->getIdCliente() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;
    }

    public function getEstudiantes(){
        $conexion = new PDO("sqlsrv:server=DESKTOP-K0GAFL0;database=DB_AulaVirtual_UNA");
        $sql = $conexion->prepare("EXEC sp_ver_estudiantes");
        $sql->execute();
        $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
        var_dump($resultado);
     }


   

}