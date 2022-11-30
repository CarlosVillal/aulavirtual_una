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
       return $this->calificacionData->updateCalificacion($Carrera);
   }

    public function delete($id) {
       return $this->calificacionData->deleteCalificacion($id);
    }

   public function obtenerCalificacionEspecificaDeEstudiante() {
       return $this->calificacionData->getCalificacionEspecifica();
    }

  
    
    
}