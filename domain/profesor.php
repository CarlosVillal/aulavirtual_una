<?php

class Profesor{

    private $pro_Cedula;
    private $pro_Nombre;
    private $pro_Apellido1;
    private $pro_Apellido2;
    private $pro_FechaNacimiento;
    private $pro_Sexo;
    private $pro_GradoAcademico;
    private $pro_AniosExperiencia;

    function Profesor($pro_Cedula, $pro_Nombre, $pro_Apellido1, $pro_Apellido2, 
    $pro_FechaNacimiento, $pro_Sexo, $pro_GradoAcademico, $pro_AniosExperiencia){

        $this->pro_Cedula = $pro_Cedula;
        $this->pro_Nombre = $pro_Nombre;
        $this->pro_Apellido1 = $pro_Apellido1;
        $this->pro_Apellido2 = $pro_Apellido2;
        $this->pro_FechaNacimiento = $pro_FechaNacimiento;
        $this->pro_Sexo = $pro_Sexo;
        $this->pro_GradoAcademico = $pro_GradoAcademico;
        $this->pro_AniosExperiencia = $pro_AniosExperiencia;
    }

    function getpro_Cedula(){
        return $this->pro_Cedula;
    }

    function setpro_Cedula($pro_Cedula){
        $this->pro_Cedula = $pro_Cedula;
    }

    function getpro_Nombre(){
        return $this->pro_Nombre;
    }

    function setpro_Nombre($pro_Nombre){
        $this->pro_Nombre = $pro_Nombre;
    }

    function getpro_Apellido1(){
        return $this->pro_Apellido1;
    }

    function setpro_Apellido1($pro_Apellido1){
        $this->pro_Apellido1 = $pro_Apellido1;
    }

    function getpro_Apellido2(){
        return $this->pro_Apellido2;
    }

    function setpro_Apellido2($pro_Apellido2){
        $this->pro_Apellido2 = $pro_Apellido2;
    }

    function getpro_FechaNacimiento(){
        return $this->pro_FechaNacimiento;
    }

    function setpro_FechaNacimiento($pro_FechaNacimiento){
        $this->pro_FechaNacimiento = $pro_FechaNacimiento;
    }

    function getpro_Sexo(){
        return $this->pro_Sexo;
    }

    function setpro_Sexo($pro_Sexo){
        $this->pro_Sexo = $pro_Sexo;
    }  
    
    function getpro_GradoAcademico(){
        return $this->pro_GradoAcademico;
    }

    function setpro_GradoAcademico($pro_GradoAcademico){
        $this->pro_GradoAcademico = $pro_GradoAcademico;
    }

    function getpro_AniosExperiencia(){
        return $this->pro_AniosExperiencia;
    }

    function setpro_AniosExperiencia($pro_AniosExperiencia){
        $this->pro_AniosExperiencia = $pro_AniosExperiencia;
    }


}

?>