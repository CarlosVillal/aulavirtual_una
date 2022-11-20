<?php


include 'EstudianteBusiness.php';


if(isset($_POST['Insertar'])){ 
 $est_Cedula = $_POST['est_Cedula'];
 $est_Nombre = $_POST['est_Nombre'];
 $est_Apellido1 = $_POST['est_Apellido1'];
 $est_Apellido2 = $_POST['est_Apellido2'];
 $est_direccion = $_POST['est_direccion'];
 $est_TipoBeca = $_POST['est_TipoBeca'];
 
 $estudiantes = new Estudiante($est_Cedula, $est_Nombre, $est_Apellido1, $est_Apellido2, $est_direccion, $est_TipoBeca);
 
 $estudianteBusiness = new EstudianteBusiness();
 $resultado = $estudianteBusiness->insertar($estudiantes);
 
    if($resultado == 1){
         Header("Location: ../views/vistaestudiante.php?success=inserted");
     }else{
         Header("Location: ../views/vistaestudiante.php?error=dbError");
     }


    }



if(isset($_POST['Eliminar'])){

    if (isset($_POST['est_Cedula'])){
        $id=$_POST['est_Cedula'];
        $estudianteBusiness = new EstudianteBusiness();

        $result = $estudianteBusiness->delete($id);
        
        if($result == 1){
           
        header("Location: ../views/vistaestudiante.php?success=deleted");
    }else{
       
        header("Location: ../views/vistaestudiante.php?error=dbError");
    }
    }
}
    

if(isset($_POST['Actualizar'])){

    if (isset($_POST['est_Nombre']) && isset($_POST['est_Apellido1']) && isset($_POST['est_Apellido2'],)
) 
    
     {
        $est_Cedula=$_POST['est_Cedula'];
        $est_Nombre=$_POST['est_Nombre'];
        $est_Apellido1 = $_POST['est_Apellido1'];
        $est_Apellido2 = $_POST['est_Apellido2'];
        $est_direccion = $_POST['est_direccion'];
        $est_TipoBeca = $_POST['est_TipoBeca'];

        
        $estudiante = new Estudiante($est_Cedula, $est_Nombre, $est_Apellido1, $est_Apellido2,$est_direccion, $est_TipoBeca);
    
        $estudianteBusiness = new EstudianteBusiness();
        $resultado = $estudianteBusiness->update($estudiante);
    
        if($resultado == 1){
            Header("Location: ../views/vistaestudiante.php?success=update");
        }else{
            Header("Location: ../views/vistaestudiante.php?error=dbError");
        }
    }

}
?>