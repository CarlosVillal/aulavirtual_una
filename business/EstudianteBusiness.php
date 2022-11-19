<?php

include '../data/EstudianteData.php';

class EstudianteBusiness{

    private $estudianteData;

    public function EstudianteBusiness() {
        $this->estudianteData= new EstudianteData();
    }

    public function insertar($Estudiante) {
        return $this->estudianteData->insertCarrera($Estudiante);
    }

    public function update($Estudiante) {
        return $this->estudianteData->updateCarrera($Estudiante);
    }

    public function delete($id) {
        return $this->estudianteData->deleteCarrera($id);
    }

    public function obtener() {
        return $this->estudianteData->getCarreras();
    }
}