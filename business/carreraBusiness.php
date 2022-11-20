<?php

include '../data/CarreraData.php';

class CarreraBusiness{

    private $carreraData;

    public function CarreraBusiness() {
        $this->carreraData= new CarreraData();
    }

    public function insertar($Carrera) {
        return $this->carreraData->insertCarrera($Carrera);
    }

 //   public function update($Carrera) {
   //     return $this->carreraData->updateCarrera($Carrera);
   // }

    //public function delete($id) {
      //  return $this->carreraData->deleteCarrera($id);
    //}

    public function obtener() {
        return $this->carreraData->getCarreras();
    }

  
    
    
}