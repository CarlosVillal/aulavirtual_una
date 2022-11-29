<?php
include 'loginBusiness.php';


if(isset($_POST['Ingresar'])){

    $cedula = $_POST['cedula'];
    $contrasenia = $_POST['contrasenia'];
 
 $loginBusiness = new LoginBusiness();
 $resultado = $loginBusiness->ingresar($cedula, $contrasenia);
 
 if($resultado == 1){
    Header("Location: ../view/vistaMenuAdministrador.php?success=inserted");

}else if($resultado == 2){
    Header("Location: ../view/vistaMenuProfesor.php?error=dbError");

}else if($resultado == 3){
    Header("Location: ../view/vistaMenuEstudiante.php?error=dbError");

}else if($resultado == 0){
    Header("Location: ../view/login.php?error=dbError");
}

}

    
?>




