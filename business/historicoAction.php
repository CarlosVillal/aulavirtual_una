<?php
include 'historicoBusiness.php';


if(isset($_POST['InsertarHistoricoProfesor'])){

    $his_Sigla = $_POST['his_Sigla'];
    $his_Nombre = $_POST['his_Nombre'];
    $his_CantidadEstudiantes = 35;
    $his_Vigencia = $_POST['his_Vigencia'];
    $car_Id = $_POST['car_Id'];
    $pro_Cedula = $_POST['pro_Cedula'];
        
    $historico = new Historico($his_Sigla, $his_Nombre, $his_CantidadEstudiantes, $his_Vigencia,
    $car_Id, $pro_Cedula);
 
 $historicoBusiness = new HistoricoBusiness();
 $resultado = $historicoBusiness->insertar($historico);
 
    if($resultado == 1){
         Header("Location: ..vistaHistoricoProfesor.php?success=inserted");
     }else{
         Header("Location: ..vistaHistoricoProfesor.php?error=dbError");
     }
}



     if(isset($_POST['InsertarHistoricoEstudiante'])){

        $his_Sigla = $_POST['his_Sigla'];
        $his_Nombre = $_POST['his_Nombre'];
        $his_CantidadEstudiantes = 35;
        $his_Vigencia = $_POST['his_Vigencia'];
        $car_Id = $_POST['car_Id'];
        $est_Cedula = $_POST['cedulaActiva'];
        $his_Nota="100";
        $historico = new HistoricoEstudiante($cur_Sigla, $cur_Nombre, $his_CantidadEstudiantes, $cur_Vigencia ,$his_Nota,
        $car_Id, $est_Cedula);

     $historicoBusiness = new HistoricoBusiness();
     $resultado = $historicoBusiness->insertar($historico);
     
        if($resultado == 1){
             Header("Location: ..vistaHistoricoEstudiante.php?success=inserted");
         }else{
             Header("Location: ..vistaHistoricoEstudiante.php?error=dbError");
         }
    }
    
    ?>




