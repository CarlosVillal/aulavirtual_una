<?php
include '../data/historicoData.php';

class HistoricoBusiness{

    private $historicoData;

    public function HistoricoBusiness() {
        $this->historicoData= new HistoricoData();
    }

    public function insertarHistorico_Profesor($Historico) {
        return $this->historicoData->insertHistorico_Profesor($Historico);
    }
    public function insertarHistorico_Estudiante($Historico) {
        return $this->historicoData->insertHistorico_Estudiante($Historico);
    }

    public function obtenerHistorico_Estudiante() {
     return $this->historicoData->getHistoricoEstudiante();
   }
   public function obtenerHistorico_Profesor() {
    return $this->historicoData->getHistoricoProfesor();
  } 



}
