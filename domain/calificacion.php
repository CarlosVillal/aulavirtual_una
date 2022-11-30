
<?php

class Calificacion{

    private $cal_Id;
    private $cal_Examen1;
    private $cal_Examen2;
    private $cal_Quiz1;
    private $cal_Quiz2;
    private $cal_Proyecto1;
    private $cal_Proyecto2;
    private $cur_NotaFinal;
    private $cur_Sigla;
    private $cur_est_Id;

    function Calificacion($cal_Id, $cal_Examen1, $cal_Examen2, $cal_Quiz1,
    $cal_Quiz2,$cal_Proyecto1, $cal_Proyecto2,$cur_NotaFinal,$cur_Sigla,$cur_est_Id){

        $this->cal_Id = $cal_Id;
        $this->cal_Examen1 = $cal_Examen1;
        $this->cal_Examen2 = $cal_Examen2;
        $this->cal_Quiz1 = $cal_Quiz1;
        $this->cal_Quiz2 = $cal_Quiz2;
        $this->cal_Proyecto1 = $cal_Proyecto1;
        $this->cal_Proyecto2 = $cal_Proyecto2;
        $this->cur_NotaFinal = $cur_NotaFinal;
        $this->cur_Sigla = $cur_Sigla;
        $this->cur_est_Id = $cur_est_Id;
    }

    function setcal_Id($cal_Id){
        $this->cal_Id = $cal_Id;
    }

    function getcal_Id(){
        return $this->cal_Id;
    }


    function setcal_Examen1($cal_Examen1){
        $this->cal_Examen1 = $cal_Examen1;
    }

    function getcal_Examen1(){
        return $this->cal_Examen1;
    }

    function setcal_Examen2($cal_Examen2){
        $this->cal_Examen2 = $cal_Examen2;
    }

    function getcal_Examen2(){
        return $this->cal_Examen2;
    }

    
    function setcal_Quiz1($cal_Quiz1){
        $this->cal_Quiz1 = $cal_Quiz1;
    }

    function getcal_Quiz1(){
        return $this->cal_Quiz1;
    }

    function setcal_Quiz2($cal_Quiz2){
        $this->cal_Quiz2 = $cal_Quiz2;
    }

    function getcal_Quiz2(){
        return $this->cal_Quiz2;
    }

    function setcal_Proyecto1($cal_Proyecto1){
        $this->cal_Proyecto1 = $cal_Proyecto1;
    }

    function getcal_Proyecto1(){
        return $this->cal_Proyecto1;
    }

    function setcal_Proyecto2($cal_Proyecto2){
        $this->cal_Proyecto2 = $cal_Proyecto2;
    }

    function getcal_Proyecto2(){
        return $this->cal_Proyecto2;
    }

    function setcur_Sigla($cur_Sigla){
        $this->cur_Sigla = $cur_Sigla;
    }

    function getcur_Sigla(){
        return $this->cur_Sigla;
    }

    function setcur_NotaFinal($cur_NotaFinal){
        $this->cur_NotaFinal = $cur_NotaFinal;
    }

    function getcur_NotaFinal(){
        return $this->cur_NotaFinal;
    }



    function setcur_est_Id($cur_est_Id){
        $this->cur_est_Id = $cur_est_Id;
    }

    function getcur_est_Id(){
        return $this->cur_est_Id;
    }

}


?>
