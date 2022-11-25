<?php
include 'profesorBusiness.php';


if(isset($_POST['Insertar'])){
    $pro_Cedula = $_POST['pro_Cedula'];
    $pro_Nombre = $_POST['pro_Nombre'];
    $pro_Apellido1 = $_POST['pro_Apellido1'];
    $pro_Apellido2 = $_POST['pro_Apellido2'];
    $pro_FechaNacimiento = $_POST['pro_FechaNacimiento'];
    $pro_Sexo = $_POST['pro_Sexo'];
    $pro_GradoAcademico = $_POST['pro_GradoAcademico'];
    $pro_AniosExperiencia = $_POST['pro_AniosExperiencia'];
        
    $profesor = new Profesor($pro_Cedula, $pro_Nombre, $pro_Apellido1, $pro_Apellido2,
    $pro_FechaNacimiento, $pro_Sexo, $pro_GradoAcademico, $pro_AniosExperiencia);
 
 $profesorBusiness = new ProfesorBusiness();
 $resultado = $profesorBusiness->insertar($profesor);
 
    if($resultado == 1){
         Header("Location: ../view/vistaProfesor.php?success=inserted");
     }else{
         Header("Location: ../view/vistaProfesor.php?error=dbError");
     }
}



//$metodoAction ==2, es eliminar un registro 
if(isset($_POST['Eliminar'])){

    if (isset($_POST['pro_Cedula'])){
        $id = $_POST['pro_Cedula'];

        $profesorBusiness = new ProfesorBusiness();
        $result = $profesorBusiness->delete($id);
        
    if($result == 1){           
        header("Location: ../view/vistaProfesor.php?success=deleted");
    }else{       
        header("Location: ../view/vistaProfesor.php?error=dbError");
    }
    }
}


//$metodoAction == 3, es actualizar un registro 

if(isset($_POST['Actualizar'])){
    $pro_Cedula = $_POST['pro_Cedula'];
    $pro_Nombre = $_POST['pro_Nombre'];
    $pro_Apellido1 = $_POST['pro_Apellido1'];
    $pro_Apellido2 = $_POST['pro_Apellido2'];
    $pro_FechaNacimiento = $_POST['pro_FechaNacimiento'];
    $pro_Sexo = $_POST['pro_Sexo'];
    $pro_GradoAcademico = $_POST['pro_GradoAcademico'];
    $pro_AniosExperiencia = $_POST['pro_AniosExperiencia'];
        
    $profesor = new Profesor($pro_Cedula, $pro_Nombre, $pro_Apellido1, $pro_Apellido2,
    $pro_FechaNacimiento, $pro_Sexo, $pro_GradoAcademico, $pro_AniosExperiencia);
 
    $profesorBusiness = new ProfesorBusiness();
    $resultado = $profesorBusiness->update($profesor);
    
    if($resultado == 1){
        Header("Location: ../view/vistaProfesor.php?success=update");
    }else{
        Header("Location: ../view/vistaProfesor.php?error=dbError");
    }
}


?>