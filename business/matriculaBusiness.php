<?php
include '../data/matriculaData.php';

class MatriculaBusiness{

    private $matriculaData;

    public function MatriculaBusiness() {
        $this->matriculaData= new MatriculaData();
    }

    public function insertar($matricula) {
        return $this->matriculaData->insertMatricula($matricula);
    }

//    public function update($matricula) {
//        return $this->matriculaData->updateMatricula($matricula);
//    }

    public function delete($id) {
       return $this->matriculaData->deleteMatricula($id);
    }

   public function obtener() {
       return $this->matriculaData->getMatriculas();
    }

  
    
    
}