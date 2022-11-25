<?php
include_once 'data.php';
include '../domain/curso.php';

class CursoData extends Data {


    public function insertcurso($curso){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
    
        $cur_Sigla = $curso->getcur_Sigla();
        $cur_Nombre = $curso->getcur_Nombre();
        $cur_CantidadCupos = $curso->getcur_CantidadCupos();
        $cur_Vigencia = $curso->getcur_Vigencia();
        $car_Id = $curso->getcar_Id();
        $pro_Cedula = $curso->getpro_Cedula(); 
       
        $sql = $conexion->prepare("EXEC sp_insertar_Curso ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$cur_Sigla , PDO::PARAM_STR);
        $sql->bindParam(2,$cur_Nombre , PDO::PARAM_STR);
        $sql->bindParam(3,$cur_CantidadCupos , PDO::PARAM_INT);
        $sql->bindParam(4,$cur_Vigencia , PDO::PARAM_STR);
        $sql->bindParam(5,$car_Id , PDO::PARAM_INT);
        $sql->bindParam(6,$pro_Cedula , PDO::PARAM_STR);
      
        $resultado= $sql->execute();

        return $resultado;    
        }



    public function deletecurso($idCurso){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_eliminar_Curso ?");
        $sql->bindParam(1, $idCurso , PDO::PARAM_INT);
        $resultado= $sql->execute();
        
        return $resultado;
    }



    public function updatecurso($curso){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $cur_Sigla = $curso->getcur_Sigla();
        $cur_Nombre = $curso->getcur_Nombre();
        $cur_CantidadCupos = $curso->getcur_CantidadCupos();
        $cur_Vigencia = $curso->getcur_Vigencia();
        $car_Id = $curso->getcar_Id();
        $pro_Cedula = $curso->getpro_Cedula(); 
       
        $sql = $conexion->prepare("EXEC sp_actualizar_Curso ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$cur_Sigla , PDO::PARAM_STR);
        $sql->bindParam(2,$cur_Nombre , PDO::PARAM_STR);
        $sql->bindParam(3,$cur_CantidadCupos , PDO::PARAM_INT);
        $sql->bindParam(4,$cur_Vigencia , PDO::PARAM_STR);
        $sql->bindParam(5,$car_Id , PDO::PARAM_INT);
        $sql->bindParam(6,$pro_Cedula , PDO::PARAM_STR);
      
        $resultado= $sql->execute();

        return $resultado;  
    }


    public function getcurso(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_cursos");
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

   

}

