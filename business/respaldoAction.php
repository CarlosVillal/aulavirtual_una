
<?php
  include_once '../data/data.php';
  Data::Conexion();

  $serverName = gethostname();
  $conexion = new PDO("sqlsrv:server=$serverName;database=DB_AulaVirtual_UNA");
  
$ruta="BACKUP DATABASE [DB_AulaVirtual_UNA] TO  DISK = N'C:\\Backup\\DB_AulaVirtual_UNA.bak' WITH NOFORMAT, NOINIT,  NAME = N'DB_AulaVirtual_UNA-Base de datos Copia de seguridad', SKIP, NOREWIND, NOUNLOAD,  STATS = 10";

//if(isset(['Respaldar'])){
   // $query=$ruta;

    if(($stmt = sqlsrv_query($conexion, $ruta)))
    {
        do 
        {
            
        } while(sqlsrv_next_result($stmt));
        sqlsrv_free_stmt($stmt);
    }else{
        die(print_r(sqlsrv_errors())); 
    }


//}