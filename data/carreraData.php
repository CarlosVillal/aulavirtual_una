<?php

include_once 'data.php';
include '../domain/carrera.php';

class CarreraData extends Data {

    public function insertCarrera($Carrera){
        $conexion = new PDO("sqlsrv:server=DESKTOP-K0GAFL0;database=DB_AulaVirtual_UNA");
    
        $car_Id = $Carrera->getcar_Id();
        $car_Nombre = $Carrera->getcar_Nombre();
    
        $sql = $conexion->prepare("EXEC sp_insertar_carrera ?, ?");
        $sql->bindParam(1,$car_Id , PDO::PARAM_INT);
        $sql->bindParam(2,$car_Nombre , PDO::PARAM_STR);
        $resultado= $sql->execute();
        return $resultado;
    
        }


    public function deleteCliente($idcliente){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "DELETE from tbcliente where tbclienteid=" . $idcliente . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

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

    public function getClientes(){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcliente;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $clientes = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentCliente = new Cliente($row['tbclienteid'], $row['tbclientenombre'], $row['tbclienteapellido1'], $row['tbclienteapellido2']);
            array_push($clientes, $currentCliente);
        }
        return $clientes;
    }

    public function searchCliente($palabra){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcliente WHERE tbclientenombre LIKE '%".$palabra."%' OR tbclienteapellido1 LIKE '%".$palabra."%' OR tbclienteapellido2 LIKE '%".$palabra."%'";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $clientes = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentCliente = new Cliente($row['tbclienteid'], $row['tbclientenombre'], $row['tbclienteapellido1'], $row['tbclienteapellido2']);
            array_push($clientes, $currentCliente);
        }
        return $clientes;

    }

   

}