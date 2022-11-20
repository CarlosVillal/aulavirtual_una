<?php
include '../data/cursoData.php';

class CursoBusiness{

    private $cursoData;

    public function CursoBusiness() {
        $this->cursoData= new CursoData();
    }

    public function insertar($curso) {
        return $this->cursoData->insertcurso($curso);
    }

    public function update($curso) {
        return $this->cursoData->updatecurso($curso);
    }

    public function delete($id) {
        return $this->cursoData->deletecurso($id);
    }

    public function obtener() {
        return $this->cursoData->getcursos();
    }
    
    
}


?>