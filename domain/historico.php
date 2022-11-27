<?php

class Historico{

    private $his_Sigla;
    private $his_Nombre;
    private $his_CantidadEstudiantes;
    private $his_Vigencia;
    private $car_Id;
    private $pro_Cedula;

    function Historico($his_Sigla, $his_Nombre, $his_CantidadEstudiantes, $his_Vigencia, $car_Id, $pro_Cedula){
        $this->his_Sigla = $his_Sigla;
        $this->his_Nombre = $his_Nombre;
        $this->his_CantidadEstudiantes = $his_CantidadEstudiantes;
        $this->his_Vigencia = $his_Vigencia;
        $this->car_Id = $car_Id;
        $this->pro_Cedula = $pro_Cedula;
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

    function getcar_Id(){
        return $this->car_Id;
    }

    function setcar_Id($car_Id){
        $this->car_Id = $car_Id;
    }

    function getpro_Cedula(){
        return $this->pro_Cedula;
    }

    function setpro_Cedula($pro_Cedula){
        $this->pro_Cedula = $pro_Cedula;
    }    


}

?>