<?php

include_once 'data.php';
include '../domain/estudiante.php';

class EstudianteData extends Data {


    public function insertEstudiante($Estudiante){
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');


        //Get the last id
        $queryGetLastId = "SELECT MAX(tbclienteid) AS tbclienteid  FROM tbcliente";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;


        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        
        $queryInsert = "INSERT INTO tbcliente VALUES (" . $nextId . ",'" .
                $Cliente->getNombre() . "','" .
                $Cliente->getApellido1() . "','" .
                $Cliente->getApellido2() . "');";

        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;
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