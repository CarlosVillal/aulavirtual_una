
<?php
include '../data/profesorData.php';
$ruta="C:\Program Files\Microsoft SQL Server\MSSQL15.MSSQLSERVER\MSSQL\Backup\;";
$serverName = gethostname();
$conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
if(isset($_POST['Respaldar'])){
    $query=$ruta;

    if ( ($stmt = sqlsrv_query($conn, $query)) )
    {
        do 
        {
        } while ( sqlsrv_next_result($stmt) ) ;
        sqlsrv_free_stmt($stmt);
    }else{
        die(print_r(sqlsrv_errors())); 
    }


}