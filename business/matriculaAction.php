<?php
include 'matriculaBusiness.php';


if(isset($_POST['Insertar'])){ 
 $cur_Sigla = $_POST['cur_Sigla'];
 $est_Cedula = $_POST['est_Cedula'];
 $ruta = $_POST['ruta'];
 
 $matricula = new Matricula(0, $cur_Sigla, $est_Cedula);
 
 $matriculaBusiness = new MatriculaBusiness();
 $resultado = $matriculaBusiness->insertar($matricula);
 
    if($resultado == 1){
         Header("Location: $ruta?success=inserted");
     }else{
         Header("Location: $ruta?error=dbError");
     }

    }



    

if(isset($_POST['Eliminar'])){
    if (isset($_POST['cur_est_Id'])){
        $id=$_POST['cur_est_Id'];

        $matriculaBusiness = new MatriculaBusiness();
        $result = $matriculaBusiness->delete($id);
        
        if($result == 1){           
        header("Location: ../view/vistaestudiante.php?success=deleted");
    }else{       
        header("Location: ../view/vistaestudiante.php?error=dbError");
    }
    }
}
    

// if(isset($_POST['Actualizar'])){
//         $car_Id=$_POST['car_Id'];
//         $car_Nombre=$_POST['car_Nombre'];
        
//         $carrera = new Carrera($car_Id, $car_Nombre);
    
//         $carreraBusiness = new CarreraBusiness();
//         $resultado = $carreraBusiness->update($carrera);
    
//         if($resultado == 1){
//             Header("Location: ../view/vistaCurso.php?success=update");
//         }else{
//             Header("Location: ../view/vistaCurso.php?error=dbError");
//         }
// }



?>