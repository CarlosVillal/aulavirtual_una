<?php


include 'EstudianteBusiness.php';


if(isset($_POST['Insertar'])){
    if (isset($_POST['est_Nombre']) && isset($_POST['est_Apellido1'])
    && isset($_POST['est_Apellido2'])&& isset($_POST['est_direccion'])&& isset($_POST['est_TipoBeca'])
) {
 $nombre = $_POST['est_Nombre'];
 $apellido1 = $_POST['est_Apellido1'];
 $apellido2 = $_POST['est_Apellido2'];
 $est_direccion = $_POST['est_direccion'];
 $est_TipoBeca = $_POST['est_TipoBeca'];
 
 $estudiante = new Estudiante(0,$est_Nombre, $est_Apellido1, $est_Apellido2,$est_direccion,$est_TipoBeca);
 
 $estudianteBusiness = new EstudianteBusiness();
 $resultado = $estudianteBusiness->insertar($estudiante);
 
    if($resultado == 1){
         Header("Location: ../views/vistaestudiante.php?success=inserted");
     }else{
         Header("Location: ../views/vistaestudiante.php?error=dbError");
     }


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