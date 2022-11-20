<?php

class Data {
    
    function Conexion(){
        $serverName = "DESKTOP-JP735J3"; //serverName\instanceName

        $connectionInfo = array( "Database"=>"DB_AulaVirtual_UNA");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if( $conn ) {
        echo "Se conecto correctamente a la base de datos";
    }else{
        echo "No se conecto correctamente a la base de datos";
        die( print_r( sqlsrv_errors(), true));
    }
}
        
}

?>
