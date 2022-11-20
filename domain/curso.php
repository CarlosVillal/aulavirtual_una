<?php

class Curso{

    private $cur_Sigla;
    private $cur_Nombre;
    private $cur_CantidadCupos;
    private $cur_Vigencia;
    private $car_Id;
    private $pro_Cedula;

    function Curso($cur_Sigla, $cur_Nombre, $cur_CantidadCupos, $cur_Vigencia, $car_Id, $pro_Cedula){
        $this->cur_Sigla = $cur_Sigla;
        $this->cur_Nombre = $cur_Nombre;
        $this->cur_CantidadCupos = $cur_CantidadCupos;
        $this->cur_Vigencia = $cur_Vigencia;
        $this->car_Id = $car_Id;
        $this->pro_Cedula = $pro_Cedula;
    }

    function getcur_Sigla(){
        return $this->cur_Sigla;
    }

    function setcur_Sigla($cur_Sigla){
        $this->cur_Sigla = $cur_Sigla;
    }

    function getcur_Nombre(){
        return $this->cur_Nombre;
    }

    function setcur_Nombre($cur_Nombre){
        $this->cur_Nombre = $cur_Nombre;
    }

    function getcur_CantidadCupos(){
        return $this->cur_CantidadCupos;
    }

    function setcur_CantidadCupos($cur_CantidadCupos){
        $this->cur_CantidadCupos = $cur_CantidadCupos;
    }

    function getcur_Vigencia(){
        return $this->cur_Vigencia;
    }

    function setcur_Vigencia($cur_Vigencia){
        $this->cur_Vigencia = $cur_Vigencia;
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