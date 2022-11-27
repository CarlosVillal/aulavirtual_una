<?php
include_once 'data.php';
include '../domain/historico.php';

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

        public function insertHistorico_Estudiante($Historico){
            $serverName = gethostname();
            $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
        
            $his_Sigla = $Historico->gethis_Sigla();
            $his_Nombre = $Historico->gethis_Nombre();
            $his_CantidadEstudiantes = $Historico->gethis_CantidadEstudiantes();
            $his_Vigencia = $Historico->gethis_Vigencia();
            $his_Nota = "100";
            $car_Id = $Historico->getcar_Id();
            $pro_Cedula = $Historico->getpro_Cedula();
           
            $sql = $conexion->prepare("EXEC sp_insertar_Historico_Estudiante ?, ?, ?, ?, ?, ?, ?");
            $sql->bindParam(1,$his_Sigla , PDO::PARAM_STR);
            $sql->bindParam(2,$his_Nombre , PDO::PARAM_STR);
            $sql->bindParam(3,$his_CantidadEstudiantes , PDO::PARAM_INT);
            $sql->bindParam(4,$his_Vigencia , PDO::PARAM_STR);
            $sql->bindParam(5,$his_Nota , PDO::PARAM_STR);
            $sql->bindParam(6,$car_Id , PDO::PARAM_INT);
            $sql->bindParam(7,$pro_Cedula , PDO::PARAM_STR);
          
            $resultado= $sql->execute();
    
            return $resultado;    
            }
        
            public function getHistoricoProfesor(){
                $serverName = gethostname();
                $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
        
                $sql = $conexion->prepare("EXEC sp_ver_historicos_profesores");
                $sql->execute();
                
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        

    public function getHistoricoEstudiante($est_Cedula){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_historicos_estudiantes ?");
        $sql->bindParam(1, $est_Cedula , PDO::PARAM_INT);
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

   

}

