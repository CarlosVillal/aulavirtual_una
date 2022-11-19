
<?php

class Carrera{

    private $car_Id;
    private $car_Nombre;
 
    
    function Carrera($car_Id, $car_Nombre){
        $this->car_Id = $car_Id;
        $this->car_Nombre = $car_Nombre;
     

    }

    function getcar_Id(){
        return $this->car_Id;
    }

    function setcar_Id($car_Id){
        $this->car_Id = $car_Id;
    }
   
    function getcar_Nombre(){
        return $this->car_Nombre;
    }

    function setcar_Nombre($car_Nombre){
        $this->car_Nombre = $car_Nombre;
    }

}


?>
