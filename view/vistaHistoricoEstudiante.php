<?php 
  include '../business/historicoBusiness.php'; 
  include '../business/loginBusiness.php';
  include_once '../data/data.php';
  Data::Conexion();
?>

<!DOCTYPE html>
<style>
        body {
            text-align: left;
            margin: 0;
            padding: 0;
            font: normal 15px arial, helvetica, sans-serif;
            background: #AED6F1;
        }
</style>
<head>
    <title>Cursos Historicos</title>
</head>
<body>

<?php
  $cedula = "";
  $tipoUsuario = "";
    $loginBusiness = new LoginBusiness();
    $login = $loginBusiness -> getLoginActivo();
    foreach ($login as $row) {
        echo '<td><input type="hidden" name="log_act_CedulaUsuario" value="'. $row['log_act_CedulaUsuario'] .'"/></td>';
        echo '<td><input type="hidden" name="log_act_TipoUsuario" value="'. $row['log_act_TipoUsuario'] .'"/></td>';
        $cedula = $row['log_act_CedulaUsuario'];
        $tipoUsuario = $row['log_act_TipoUsuario'];
    }
?>

<br><br><br>

<table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                    <th>Siglas</th>
                    <th>Nombre de curso</th>
                    <th>Numero de cupos</th>
                    <th>Vigencia</th>
                    <th>Nota Final</th>
                    <th>Carrera</th>
                    <th>Estudiante</th>                              
                    </tr>
                  </thead>
                  <tbody>
                  <?php
    $historicBusiness = new HistoricoBusiness();
    $historico = $historicBusiness -> obtenerHistorico_Estudiante($cedula);
    foreach ($historico as $row) {
        echo '<form  method="post" enctype="multipart/form-data" action="../business/historicoAction.php">';
        
        echo '<tr>';
        echo '<td><input type="text" readonly name="his_Sigla" value="'. $row['his_Sigla'].'"/></td>';
        echo '<td><input type="text" name="his_Nombre" value="'. $row['his_Nombre'].'"/></td>';
        echo '<td><input type="text" name="his_CantidadEstudiantes" value="'. $row['his_CantidadEstudiantes'].'"/></td>';
        echo '<td><input type="text" name="his_Vigencia" value="'. $row['his_Vigencia'].'"/></td>';
        echo '<td><input type="text" name="his_Nota" value="'. $row['his_Nota'].'"/></td>';
        echo '<td><input type="text" name="car_Id" value="'. $row['car_Id'].'"/></td>';
        echo '<td><input type="text" name="est_Cedula" value="'. $row['est_Cedula'].'"/></td>';
                            
    echo '</tr>';
    echo '</form>';    
}                                      
?>
<tr>
<td></td>
<td>
                   
<?php
    if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyField") {
    echo '<p style="color: red">Campo(s) vacio(s)</p>';
                             
     } else if ($_GET['error'] == "dbError") {
     echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                             
    }
    } else if (isset($_GET['success'])) {
        echo '<p style="color: green">Transacción realizada</p>';
        echo '<br>';                        
    }

        ?>
     </td>
    </tr>
</tbody> 
</table>

</br></br>
<button name="Volver"><a href="../view/vistaMenuEstudiante.php">Volver</a></button>
            




</body>
</html>
