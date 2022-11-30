<?php
include 'calificacionBusiness.php';


if(isset($_POST['Insertar'])){ 

 $cal_Id = $_POST['cal_Id'];
 $cal_Examen1 = $_POST['cal_Examen1'];
 $cal_Examen2 = $_POST['cal_Examen2'];
 $cal_Quiz1 = $_POST['cal_Quiz1'];
 $cal_Quiz2 = $_POST['cal_Quiz2'];
 $cal_Proyecto1 = $_POST['cal_Proyecto1'];
 $cal_Proyecto2 = $_POST['cal_Proyecto2'];
 $cur_NotaFinal = $_POST['cur_NotaFinal'];
 $cur_est_Id = $_POST['cur_est_Id'];


 $calificacion = new Calificacion($cal_Id,$cal_Examen1,$cal_Examen2, $cal_Quiz1,$cal_Quiz2,$cal_Proyecto1,$cal_Proyecto2, $cur_NotaFinal, $cur_est_Id);
 
 $calificacionBusiness = new CalificacionBusiness();
 $resultado = $calificacionBusiness->insertar($calificacion);
 
    if($resultado == 1){
         Header("Location: ../view/calificarEvaluacionesVista.php?success=inserted");
     }else{
         Header("Location: ../view/calificarEvaluacionesVista.php?error=dbError");
     }


    }


if(isset($_POST['Eliminar'])){

    if (isset($_POST['cal_Id'])){
        $id=$_POST['cal_Id'];
        $calificacionBusiness = new CalificacionBusiness();

        $result = $calificacionBusiness->delete($id);
        
        if($result == 1){           
        header("Location: ../view/calificarEvaluacionesVista.php?success=deleted");
    }else{       
        header("Location: ../view/calificarEvaluacionesVista.php?error=dbError");
    }
    }
}
    

if(isset($_POST['Actualizar'])){
    $cal_Id = $_POST['cal_Id'];
    $cal_Examen1 = $_POST['cal_Examen1'];
    $cal_Examen2 = $_POST['cal_Examen2'];
    $cal_Quiz1 = $_POST['cal_Quiz1'];
    $cal_Quiz2 = $_POST['cal_Quiz2'];
    $cal_Proyecto1 = $_POST['cal_Proyecto1'];
    $cal_Proyecto2 = $_POST['cal_Proyecto2'];
    $cur_NotaFinal = $_POST['cur_NotaFinal'];
    $cur_est_Id = $_POST['cur_est_Id'];
        
     
 $calificacion = new Calificacion($cal_Id,$cal_Examen1,$cal_Examen2, $cal_Quiz1,$cal_Quiz2,$cal_Proyecto1,$cal_Proyecto2, $cur_NotaFinal, $cur_est_Id);
    
        $calificacionBusiness = new CalificacionBusiness();
        $resultado = $calificacionBusiness->update($calificacion);
    
        if($resultado == 1){
            Header("Location: ../view/calificarEvaluacionesVista.php?success=update");
        }else{
            Header("Location: ../view/calificarEvaluacionesVista.php?error=dbError");
        }
    

}
?>