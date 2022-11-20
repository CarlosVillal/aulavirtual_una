<?php

class Data {
    public $serverName;
    public $connectionInfo;
    
    function Conexion(){
        $serverName = "DESKTOP-K0GAFL0"; //serverName\instanceName

        $connectionInfo = array( "Database"=>"DB_AulaVirtual_UNA");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if( $conn ) {
     //   echo "Se conecto correctamente a la base de datos";
    }else{
        echo "No se conecto correctamente a la base de datos";
        die( print_r( sqlsrv_errors(), true));
    }
}
        
}

?>
