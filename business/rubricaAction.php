<?php
include 'rubricaBusiness.php';

if(isset($_POST['Insertar'])){ 

 $rub_Id = $_POST['rub_Id'];
 $rub_Examen1 = $_POST['rub_Examen1'];
 $rub_Examen2 = $_POST['rub_Examen2'];
 $rub_Quiz1 = $_POST['rub_Quiz1'];
 $rub_Quiz2 = $_POST['rub_Quiz2'];
 $rub_Proyecto1 = $_POST['rub_Proyecto1'];
 $rub_Proyecto2 = $_POST['rub_Proyecto2'];
 $cur_Sigla = $_POST['cur_Sigla'];
 
    $rubrica = new Rubrica($rub_Id,$rub_Examen1,$rub_Examen2, $rub_Quiz1, $rub_Quiz2, $rub_Proyecto1,
    $rub_Proyecto2, $cur_Sigla);
    $rubricaBusiness = new RubricaBusiness();
    $resultado = $rubricaBusiness->insertar($rubrica);
 
    if($resultado == 1){
         Header("Location: ../view/vistaRubrica.php?success=inserted");
     }else{
         Header("Location: ../view/vistaRubrica.php?error=dbError");
     }


    }



if(isset($_POST['Eliminar'])){
    if (isset($_POST['rub_Id'])){
        $id=$_POST['rub_Id'];

        $rubricaBusiness = new RubricaBusiness();
        $result = $rubricaBusiness->delete($id);
        
    if($result == 1){           
        header("Location: ../view/vistaRubrica.php?success=deleted");
    }else{       
    header("Location: ../view/vistaRubrica.php?error=dbError");
    }
    }
}
    

if(isset($_POST['Actualizar'])){

    $rub_Id = $_POST['rub_Id'];
 $rub_Examen1 = $_POST['rub_Examen1'];
 $rub_Examen2 = $_POST['rub_Examen2'];
 $rub_Quiz1 = $_POST['rub_Quiz1'];
 $rub_Quiz2 = $_POST['rub_Quiz2'];
 $rub_Proyecto1 = $_POST['rub_Proyecto1'];
 $rub_Proyecto2 = $_POST['rub_Proyecto2'];
 $cur_Sigla = $_POST['cur_Sigla'];
    
 $rubricas = new Rubrica($rub_Id, $rub_Examen1, $rub_Examen2, 
 $rub_Quiz1, $rub_Quiz2, $rub_Proyecto1, $rub_Proyecto2, $rub_NotaFinal, $cur_Sigla);
    
    $rubricaBusiness = new RubricaBusiness();
    $resultado = $rubricaBusiness->update($rubricas);
    
    if($resultado == 1){
        Header("Location: ../view/vistaRubrica.php?success=update");
    }else{
        Header("Location: ../view/vistaRubrica.php?error=dbError");
    }
}



?>