
<?php

class Estudiante{

    private $est_Cedula;
    private $est_Nombre;
    private $est_Apellido1;
    private $est_Apellido2;
    private $est_direccion;
    private $est_TipoBeca;
    private $est_FechaNacimiento;
    private $est_Carrera;
    
    function Estudiante($est_Cedula, $est_Nombre, $est_Apellido1, $est_Apellido2,
    $est_direccion,$est_TipoBeca, $est_FechaNacimiento,$est_Carrera){

        $this->est_Cedula = $est_Cedula;
        $this->est_Nombre = $est_Nombre;
        $this->est_Apellido1 = $est_Apellido1;
        $this->est_Apellido2 = $est_Apellido2;
        $this->est_direccion = $est_direccion;
        $this->est_TipoBeca = $est_TipoBeca;
        $this->est_FechaNacimiento = $est_FechaNacimiento;
        $this->est_Carrera = $est_Carrera;
    }

    function setest_Cedula($est_Cedula){
        $this->est_Cedula = $est_Cedula;
    }

    function getest_Cedula(){
        return $this->est_Cedula;
    }


    function setest_Nombre($est_Nombre){
        $this->est_Nombre = $est_Nombre;
    }

    function getest_Nombre(){
        return $this->est_Nombre;
    }

    function setest_Apellido1($est_Apellido1){
        $this->est_Apellido1 = $est_Apellido1;
    }

    function getest_Apellido1(){
        return $this->est_Apellido1;
    }

    
    function setest_Apellido2($est_Apellido2){
        $this->est_Apellido2 = $est_Apellido2;
    }

    function getest_Apellido2(){
        return $this->est_Apellido2;
    }

    function setest_direccion($est_direccion){
        $this->est_direccion = $est_direccion;
    }

    function getest_direccion(){
        return $this->est_direccion;
    }

    function setest_TipoBeca($est_TipoBeca){
        $this->est_TipoBeca = $est_TipoBeca;
    }

    function getest_TipoBeca(){
        return $this->est_TipoBeca;
    }

    function setest_FechaNacimiento($est_FechaNacimiento){
        $this->est_FechaNacimiento = $est_FechaNacimiento;
    }

    function getest_FechaNacimiento(){
        return $this->est_FechaNacimiento;
    }

    function setest_Carrera($est_Carrera){
        $this->est_Carrera = $est_Carrera;
    }

    function getest_Carrera(){
        return $this->est_Carrera;
    }


}


?>
