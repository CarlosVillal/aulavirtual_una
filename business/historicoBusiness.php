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

    public function obtenerHistorico_Estudiante($est_Cedula) {
     return $this->historicoData->getHistoricoEstudiante($est_Cedula);
   }
   public function obtenerHistorico_Profesor() {
    return $this->historicoData->getHistoricoProfesor();
  } 



}
