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

    
    
}


?>