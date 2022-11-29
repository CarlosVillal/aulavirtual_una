<?php
include_once 'data.php';

class LoginData extends Data {


    public function ingresar($cedula, $contrasenia){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_verificar_login ?");
        $sql->bindParam(1,$cedula , PDO::PARAM_STR);
        $sql->execute();
        $usuario = $sql->fetchAll(PDO::FETCH_ASSOC);
        $resultadoFinal = 0;
        foreach ($usuario as $row) {     
            if(($row['log_CedulaUsuario'] == $cedula) && ($row['log_Contrasenia'] == $contrasenia)){
                if($row['log_TipoUsuario'] == "Administrador"){
                    $resultadoFinal = 1;
                }else if($row['log_TipoUsuario'] == "Profesor"){
                    $resultadoFinal = 2;
                }else if($row['log_TipoUsuario'] == "Estudiante"){
                    $resultadoFinal = 3;
                }
                $id = 1;
                $sql2 = $conexion->prepare("EXEC sp_actualizar_login_activo ?, ?, ?, ?");
                $sql2->bindParam(1,$id , PDO::PARAM_INT);
                $sql2->bindParam(2,$cedula , PDO::PARAM_INT);
                $sql2->bindParam(3,$contrasenia , PDO::PARAM_STR);
                $sql2->bindParam(4,$row['log_TipoUsuario'], PDO::PARAM_STR);
                $resultado= $sql2->execute();
            }                          
            // echo '<option value="'. $row['pro_Cedula'] .'">'. $row['pro_Nombre'] .' '. $row['pro_Apellido1'] .' '. $row['pro_Apellido2'] .'</option>';                                
        }
        
        return $resultadoFinal;
    }

    public function getLoginActivo(){
        $serverName = gethostname();
        $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");

        $sql = $conexion->prepare("EXEC sp_ver_login_activo");
        $sql->execute();
        
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


   

}