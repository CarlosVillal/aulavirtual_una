<?php

include 'CarreraBusiness.php';


if(isset($_POST['Insertar'])){
    if (isset($_POST['car_Nombre'])) {

 $car_Nombre = $_POST['car_Nombre'];
 
 $carrera = new Carrera(0,$car_Nombre);
 
 $carreraBusiness = new CarreraBusiness();
 $resultado = $carreraBusiness->insertar($carrera);
 
    if($resultado == 1){
         Header("Location: ../views/vistacarrera.php?success=inserted");
     }else{
         Header("Location: ../views/vistacarrera.php?error=dbError");
     }


    }


}


if(isset($_POST['Eliminar'])){

    if (isset($_POST['car_Id'])){
        $id=$_POST['car_Id'];
        $carreraBusiness = new CarreraBusiness();

        $result = $carreraBusiness->delete($id);
        
        if($result == 1){
           
        header("Location: ../views/vistacarrera.php?success=deleted");
    }else{
       
        header("Location: ../views/vistacarrera.php?error=dbError");
    }
    }
}
    

if(isset($_POST['Actualizar'])){

    if (isset($_POST['car_Nombre']))
    
     {
        $est_Cedula=$_POST['car_Id'];
        $est_Nombre=$_POST['car_Nombre'];
  
  

        
        $estudiante = new Carrera($car_Id, $car_Nombre);
    
        $carreraBusiness = new CarreraBusiness();
        $resultado = $carreraBusiness->update($carrera);
    
        if($resultado == 1){
            Header("Location: ../views/vistacarrera.php?success=update");
        }else{
            Header("Location: ../views/vistacarrera.php?error=dbError");
        }
    }

}
?>