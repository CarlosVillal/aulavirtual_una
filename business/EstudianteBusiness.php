<?php

include '../data/estudianteData.php';

class EstudianteBusiness{

    private $estudianteData;

    public function EstudianteBusiness() {
        $this->estudianteData= new EstudianteData();
    }

    public function insertar($Estudiante) {
        return $this->estudianteData->insertEstudiante($Estudiante);
    }

   public function update($Estudiante) {
       return $this->estudianteData->updateEstudiante($Estudiante);
    }

   public function delete($id) {
       return $this->estudianteData->deleteEstudiante($id);
    }

    public function obtener() {
   return $this->estudianteData->getEstudiantes();
   }

   public function obtenerEstudianteEspecifico($est_Cedula) {
    return $this->estudianteData->getEstudianteEspecifico($est_Cedula);
    }

    public function reporteEstudiantePorCurso() {
        return $this->estudianteData->reporteEstudiantePorCurso();
    }

    public function getCursosMatriculados($est_Cedula) {
        return $this->estudianteData->getCursosMatriculados($est_Cedula);
    }

    public function getHistoricoCursosMatriculados($est_Cedula) {
        return $this->estudianteData->getHistoricoCursosMatriculados($est_Cedula);
    }

}