<?php
include '../data/rubricaData.php';

class RubricaBusiness{

    private $rubricaData;

    public function RubricaBusiness() {
        $this->rubricaData= new RubricaData();
    }

    public function insertar($Rubrica) {
        return $this->rubricaData->insertRubrica($Rubrica);
    }

   public function update($Rubrica) {
       return $this->rubricaData->updateRubrica($Rubrica);
    }

   public function delete($id) {
       return $this->rubricaData->deleteRubrica($id);
    }

    public function obtener() {
   return $this->rubricaData->getRubricas();
   }

}