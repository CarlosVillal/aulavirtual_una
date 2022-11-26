<?php
include 'cursoBusiness.php';


if(isset($_POST['Insertar'])){

    $cur_Sigla = $_POST['cur_Sigla'];
    $cur_Nombre = $_POST['cur_Nombre'];
    $cur_CantidadCupos = $_POST['cur_CantidadCupos'];
    $cur_Vigencia = $_POST['cur_Vigencia'];
    $car_Id = $_POST['car_Id'];
    $pro_Cedula = $_POST['pro_Cedula'];
        
    $curso = new Curso($cur_Sigla, $cur_Nombre, $cur_CantidadCupos, $cur_Vigencia,
    $car_Id, $pro_Cedula);
 
 $cursoBusiness = new CursoBusiness();
 $resultado = $cursoBusiness->insertar($curso);
 
    if($resultado == 1){
         Header("Location: ../view/vistaCurso.php?success=inserted");
     }else{
         Header("Location: ../view/vistaCurso.php?error=dbError");
     }
}
if(isset($_POST['InsertarHistorico'])){

    $cur_Sigla = $_POST['cur_Sigla'];
    $cur_Nombre = $_POST['cur_Nombre'];
    $cur_CantidadCupos = $_POST['cur_CantidadCupos'];
    $cur_Vigencia = $_POST['cur_Vigencia'];
    $car_Id = $_POST['car_Id'];
    $pro_Cedula = $_POST['pro_Cedula'];
        
    $curso = new Curso($cur_Sigla, $cur_Nombre, $cur_CantidadCupos, $cur_Vigencia,
    $car_Id, $pro_Cedula);
 
 $cursoBusiness = new CursoBusiness();
 $resultado = $cursoBusiness->insertar2($curso);
 
    if($resultado == 1){
         Header("Location: ../view/vistaHistorico.php?success=inserted");
     }else{
         Header("Location: ../view/vistaHistorico.php?error=dbError");
     }
}


//eliminar un registro 
if(isset($_POST['Eliminar'])){

    if (isset($_POST['cur_Sigla'])){
        $id=$_POST['cur_Sigla'];

        $cursoBusiness = new CursoBusiness();
        $result = $cursoBusiness->delete($id);
        
    if($result == 1){           
        header("Location: ../view/vistaCurso.php?success=deleted");
    }else{       
        header("Location: ../view/vistaCurso.php?error=dbError");
    }
    }
}


//actualizar un registro 
if(isset($_POST['Actualizar'])){

    $cur_Sigla = $_POST['cur_Sigla'];
    $cur_Nombre = $_POST['cur_Nombre'];
    $cur_CantidadCupos = $_POST['cur_CantidadCupos'];
    $cur_Vigencia = $_POST['cur_Vigencia'];
    $car_Id = $_POST['car_Id'];
    $pro_Cedula = $_POST['pro_Cedula'];
        
    $curso = new Curso($cur_Sigla, $cur_Nombre, $cur_CantidadCupos, $cur_Vigencia,
    $car_Id, $pro_Cedula);
    
    $cursoBusiness = new CursoBusiness();
    $resultado = $cursoBusiness->update($curso);
    
    if($resultado == 1){
        Header("Location: ../view/vistaCurso.php?success=update");
    }else{
        Header("Location: ../view/vistaCurso.php?error=dbError");
    }
}


?>