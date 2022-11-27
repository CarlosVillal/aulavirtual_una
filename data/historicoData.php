<?php
include_once 'data.php';
include '../domain/historico.php';
include '../domain/historicoEstudiante.php';
class HistoricoData extends Data {


    public function insertHistorico_Profesor($Historico){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
    
        $his_Sigla = $Historico->gethis_Sigla();
        $his_Nombre = $Historico->gethis_Nombre();
        $his_CantidadEstudiantes = $Historico->gethis_CantidadEstudiantes();
        $his_Vigencia = $Historico->gethis_Vigencia();
        $car_Id = $Historico->getcar_Id();
        $pro_Cedula = $Historico->getpro_Cedula(); 
       
        $sql = $conexion->prepare("EXEC sp_insertar_Historico_Profesor ?, ?, ?, ?, ?, ?");
        $sql->bindParam(1,$his_Sigla , PDO::PARAM_STR);
        $sql->bindParam(2,$his_Nombre , PDO::PARAM_STR);
        $sql->bindParam(3,$his_CantidadEstudiantes , PDO::PARAM_INT);
        $sql->bindParam(4,$his_Vigencia , PDO::PARAM_STR);
        $sql->bindParam(5,$car_Id , PDO::PARAM_INT);
        $sql->bindParam(6,$pro_Cedula , PDO::PARAM_STR);
      
        $resultado= $sql->execute();

        return $resultado;    
        }

        public function insertHistorico_Estudiante($HistoricoEstudiante){
            $serverName = gethostname();
            $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
        
            $his_Sigla = $HistoricoEstudiante->gethis_Sigla();
            $his_Nombre = $HistoricoEstudiante->gethis_Nombre();
            $his_CantidadEstudiantes = $HistoricoEstudiante->gethis_CantidadEstudiantes();
            $his_Vigencia = $HistoricoEstudiante->gethis_Vigencia();
            $his_Nota =$HistoricoEstudiante->gethis_Nota();
            $car_Id = $HistoricoEstudiante->getcar_Id();
            $est_Cedula =$HistoricoEstudiante->getest_Cedula();
           
            $sql = $conexion->prepare("EXEC sp_insertar_Historico_Estudiante ?, ?, ?, ?, ?, ?, ?");
            $sql->bindParam(1,$his_Sigla , PDO::PARAM_STR);
            $sql->bindParam(2,$his_Nombre , PDO::PARAM_STR);
            $sql->bindParam(3,$his_CantidadEstudiantes , PDO::PARAM_INT);
            $sql->bindParam(4,$his_Vigencia , PDO::PARAM_STR);
            $sql->bindParam(5,$his_Nota , PDO::PARAM_STR);
            $sql->bindParam(6,$car_Id , PDO::PARAM_INT);
            $sql->bindParam(7,$est_Cedula , PDO::PARAM_STR);
          
            $resultado= $sql->execute();
    
            return $resultado;    
            }
        
            public function getHistoricoProfesor($pro_Cedula){
                $serverName = gethostname();
                $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
        
                $sql = $conexion->prepare("EXEC sp_ver_historicos_profesores ?");
                $sql->bindParam(1, $pro_Cedula , PDO::PARAM_STR);
                $sql->execute();
                
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        

    public function getHistoricoEstudiante($est_Cedula){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_historicos_estudiantes ?");
        $sql->bindParam(1, $est_Cedula , PDO::PARAM_STR);
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

   

}

