<?php
include 'carreraBusiness.php';


if(isset($_POST['Insertar'])){ 
 //$car_Id = $_POST['car_Id'];
 $car_Nombre = $_POST['car_Nombre'];
 
 $carrera = new Carrera(0, $car_Nombre);
 
 $carreraBusiness = new CarreraBusiness();
 $resultado = $carreraBusiness->insertar($carrera);
 
    if($resultado == 1){
         Header("Location: ../view/vistacarrera.php?success=inserted");
     }else{
         Header("Location: ../view/vistacarrera.php?error=dbError");
     }


    }


if(isset($_POST['Eliminar'])){

    if (isset($_POST['car_Id'])){
        $id=$_POST['car_Id'];
        $carreraBusiness = new CarreraBusiness();

        $result = $carreraBusiness->delete($id);
        
        if($result == 1){           
        header("Location: ../view/vistacarrera.php?success=deleted");
    }else{       
        header("Location: ../view/vistacarrera.php?error=dbError");
    }
    }
}
    

if(isset($_POST['Actualizar'])){
        $car_Id=$_POST['car_Id'];
        $car_Nombre=$_POST['car_Nombre'];
        
        $carrera = new Carrera($car_Id, $car_Nombre);
    
        $carreraBusiness = new CarreraBusiness();
        $resultado = $carreraBusiness->update($carrera);
    
        if($resultado == 1){
            Header("Location: ../view/vistacarrera.php?success=update");
        }else{
            Header("Location: ../view/vistacarrera.php?error=dbError");
        }
    

}
?>