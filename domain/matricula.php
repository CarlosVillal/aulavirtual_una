
<?php

class Matricula{

    private $cur_est_Id;
    private $cur_Sigla;
    private $est_Cedula;
    
    function Matricula($cur_est_Id, $cur_Sigla, $est_Cedula){

        $this->cur_est_Id = $cur_est_Id;
        $this->cur_Sigla = $cur_Sigla;
        $this->est_Cedula = $est_Cedula;
    }

    function setcur_est_Id($cur_est_Id){
        $this->cur_est_Id = $cur_est_Id;
    }

    function getcur_est_Id(){
        return $this->cur_est_Id;
    }

    function setcur_Sigla($cur_Sigla){
        $this->cur_Sigla = $cur_Sigla;
    }

    function getcur_Sigla(){
        return $this->cur_Sigla;
    }

    function setest_Cedula($est_Cedula){
        $this->est_Cedula = $est_Cedula;
    }

    function getest_Cedula(){
        return $this->est_Cedula;
    }


    
}


?>
