<?php
include '../data/profesorData.php';

class ProfesorBusiness{

    private $profesorData;

    public function ProfesorBusiness() {
        $this->profesorData = new ProfesorData();
    }

    public function insertar($profesor) {
        return $this->profesorData->insertprofesor($profesor);
    }

    // public function update($profesor) {
    //     return $this->profesorData->updateprofesor($profesor);
    // }

     public function delete($id) {
        return $this->profesorData->deleteprofesor($id);
     }

     public function obtener() {
      return $this->profesorData->getprofesor();
    }
    
    
}


?>