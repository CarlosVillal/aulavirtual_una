<?php
include 'loginBusiness.php';


if(isset($_POST['Ingresar'])){

    $cedula = $_POST['cedula'];
    $contrasenia = $_POST['contrasenia'];
 
 $loginBusiness = new LoginBusiness();
 $resultado = $loginBusiness->ingresar($cedula, $contrasenia);
 
 if($resultado == 1){
    Header("Location: ../view/vistaMenuAdministrador.php?success=inserted");
}else{
    Header("Location: ../view/vistaMenuAdministrador.php?error=dbError");
}

}

    
?>




