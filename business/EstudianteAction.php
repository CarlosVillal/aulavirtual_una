<?php
include 'estudianteBusiness.php';

if(isset($_POST['Insertar'])){ 

 $est_Cedula = $_POST['est_Cedula'];
 $est_Nombre = $_POST['est_Nombre'];
 $est_Apellido1 = $_POST['est_Apellido1'];
 $est_Apellido2 = $_POST['est_Apellido2'];
 $est_direccion = $_POST['est_direccion'];
 $est_TipoBeca = $_POST['est_TipoBeca'];
 $est_FechaNacimiento = $_POST['est_FechaNacimiento'];
 $est_Carrera = $_POST['est_Carrera'];
 
 $estudiantes = new Estudiante($est_Cedula, $est_Nombre, $est_Apellido1, 
 $est_Apellido2, $est_direccion, $est_TipoBeca, $est_FechaNacimiento, $est_Carrera);
 
 $estudianteBusiness = new EstudianteBusiness();
 $resultado = $estudianteBusiness->insertar($estudiantes);
 
    if($resultado == 1){
         Header("Location: ../view/vistaestudiante.php?success=inserted");
     }else{
         Header("Location: ../view/vistaestudiante.php?error=dbError");
     }


    }



if(isset($_POST['Eliminar'])){
    if (isset($_POST['est_Cedula'])){
        $id=$_POST['est_Cedula'];

        $estudianteBusiness = new EstudianteBusiness();
        $result = $estudianteBusiness->delete($id);
        
    if($result == 1){           
        header("Location: ../view/vistaestudiante.php?success=deleted");
    }else{       
    header("Location: ../view/vistaestudiante.php?error=dbError");
    }
    }
}
    

if(isset($_POST['Actualizar'])){

    $est_Cedula=$_POST['est_Cedula'];
    $est_Nombre=$_POST['est_Nombre'];
    $est_Apellido1 = $_POST['est_Apellido1'];
    $est_Apellido2 = $_POST['est_Apellido2'];
    $est_direccion = $_POST['est_direccion'];
    $est_TipoBeca = $_POST['est_TipoBeca'];
    $est_FechaNacimiento = $_POST['est_FechaNacimiento'];
    $est_Carrera = $_POST['est_Carrera'];
    
    $estudiante = new Estudiante($est_Cedula, $est_Nombre, $est_Apellido1, 
    $est_Apellido2,$est_direccion, $est_TipoBeca, $est_FechaNacimiento, $est_Carrera);
    
    $estudianteBusiness = new EstudianteBusiness();
    $resultado = $estudianteBusiness->update($estudiante);
    
    if($resultado == 1){
        Header("Location: ../view/vistaestudiante.php?success=update");
    }else{
        Header("Location: ../view/vistaestudiante.php?error=dbError");
    }
}


?>