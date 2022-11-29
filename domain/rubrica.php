<?php

class Rubrica{

    private $rub_Id;
    private $rub_Examen1;
    private $rub_Examen2;
    private $rub_Quiz1;
    private $rub_Quiz2;
    private $rub_Proyecto1;
    private $rub_Proyecto2;
    private $cur_Sigla;


    function Rubrica($rub_Id, $rub_Examen1, $rub_Examen2, $rub_Quiz1, $rub_Quiz2, $rub_Proyecto1,$rub_Proyecto2,$cur_Sigla){
        
        $this->rub_Id = $rub_Id;
        $this->rub_Examen1 = $rub_Examen1;
        $this->rub_Examen2 = $rub_Examen2;
        $this->rub_Quiz1 = $rub_Quiz1;
        $this->rub_Quiz2 = $rub_Quiz2;
        $this->rub_Proyecto1 = $rub_Proyecto1;
        $this->rub_Proyecto2 = $rub_Proyecto2;
        $this->cur_Sigla = $cur_Sigla;
    }

    function getrub_Id(){
        return $this->rub_Id;
    }

    function setrub_Id($rub_Id){
        $this->rub_Id = $rub_Id;
    }

    function getrub_Examen1(){
        return $this->rub_Examen1;
    }

    function setrub_Examen1($rub_Examen1){
        $this->rub_Examen1 = $rub_Examen1;
    }

    function getrub_Examen2(){
        return $this->rub_Examen2;
    }

    function setrub_Examen2($rub_Examen2){
        $this->rub_Examen2 = $rub_Examen2;
    }

    function getrub_Quiz1(){
        return $this->rub_Quiz1;
    }

    function setrub_Quiz1($rub_Quiz1){
        $this->rub_Quiz1 = $rub_Quiz1;
    }

    function getrub_Quiz2(){
        return $this->rub_Quiz2;
    }

    function setrub_Quiz2($rub_Quiz2){
        $this->rub_Quiz2 = $rub_Quiz2;
    }

    function getrub_Proyecto1(){
        return $this->rub_Proyecto1;
    }

    function setrub_Proyecto1($rub_Proyecto1){
        $this->rub_Proyecto1 = $rub_Proyecto1;
    }

    function getrub_Proyecto2(){
        return $this->rub_Proyecto2;
    }

    function setrub_Proyecto2($rub_Proyecto2){
        $this->rub_Proyecto2 = $rub_Proyecto2;
    }

    function getcur_Sigla(){
        return $this->cur_Sigla;
    }

    function setcur_Sigla($cur_Sigla){
        $this->cur_Sigla = $cur_Sigla;
    }    


}

?>