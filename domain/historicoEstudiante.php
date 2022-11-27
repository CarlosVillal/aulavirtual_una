<?php

class HistoricoEstudiante{

    private $his_Sigla;
    private $his_Nombre;
    private $his_CantidadEstudiantes;
    private $his_Vigencia;
    private $his_Nota;
    private $car_Id;
    private $est_Cedula;

    function HistoricoEstudiante($his_Sigla, $his_Nombre, $his_CantidadEstudiantes, $his_Vigencia, $his_Nota,$car_Id, $est_Cedula){
        $this->his_Sigla = $his_Sigla;
        $this->his_Nombre = $his_Nombre;
        $this->his_CantidadEstudiantes = $his_CantidadEstudiantes;
        $this->his_Vigencia = $his_Vigencia;
        $this->his_Nota = $his_Nota;
        $this->car_Id = $car_Id;
        $this->est_Cedula = $est_Cedula;
    }

    function gethis_Sigla(){
        return $this->his_Sigla;
    }

    function sethis_Sigla($his_Sigla){
        $this->his_Sigla = $his_Sigla;
    }

    function gethis_Nombre(){
        return $this->his_Nombre;
    }

    function sethis_Nombre($his_Nombre){
        $this->his_Nombre = $his_Nombre;
    }

    function gethis_CantidadEstudiantes(){
        return $this->his_CantidadEstudiantes;
    }

    function sethis_CantidadEstudiantes($his_CantidadEstudiantes){
        $this->his_CantidadEstudiantes = $his_CantidadEstudiantes;
    }

    function gethis_Vigencia(){
        return $this->his_Vigencia;
    }

    function sethis_Vigencia($his_Vigencia){
        $this->his_Vigencia = $his_Vigencia;
    }

    function gethis_Nota(){
        return $this->his_Nota;
    }

    function sethis_Nota($his_Nota){
        $this->his_Nota = $his_Nota;
    }



    function getcar_Id(){
        return $this->car_Id;
    }

    function setcar_Id($car_Id){
        $this->car_Id = $car_Id;
    }

    function getest_Cedula(){
        return $this->est_Cedula;
    }

    function setest_Cedula($est_Cedula){
        $this->est_Cedula = $est_Cedula;
    }    


}

?>