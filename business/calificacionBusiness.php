<?php
include '../data/calificacionData.php';

class CalificacionBusiness{

    private $calificacionData;

    public function CalificacionBusiness() {
        $this->calificacionData= new CalificacionData();
    }

    public function insertar($Calificacion) {
        return $this->calificacionData->insertCalificacion($Calificacion);
    }

   
   public function update($Calificacion) {
       return $this->calificacionData->updateCalificacion($Calificacion);
   }

    public function delete($id) {
       return $this->calificacionData->deleteCalificacion($id);
    }

   public function obtenerCalificacionEspecificaDeEstudiante($cur_est_Id) {
       return $this->calificacionData->getCalificacionEspecifica($cur_est_Id);
    }

  
    
    
}