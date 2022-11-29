<?php
include '../business/estudianteBusiness.php';
include '../business/loginBusiness.php';
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Estudiantes</title>
</head>
<body>
  <?php 
  $cedula = "";
  $tipoUsuario = "";
   ?>
 <br><h1>Cursos Matriculados</h1> 
 <br><br>

<table class="table table-striped table-bordered" >
    <thead>
    <tr>
    <th>Curso</th>
    <th>Cedula</th>
    <th>Nombre de Estudiante</th>   
    <th>Primer Apellido</th>
    <th>Seguando Apellido</th>
</tr>
</thead>
    <tbody>
    <?php
    $loginBusiness = new LoginBusiness();
    $login = $loginBusiness -> getLoginActivo();
    foreach ($login as $row) {
        echo '<td><input type="hidden" name="log_act_CedulaUsuario" value="'. $row['log_act_CedulaUsuario'] .'"/></td>';
        echo '<td><input type="hidden" name="log_act_Contrasenia" value="'. $row['log_act_Contrasenia'] .'"/></td>';
        echo '<td><input type="hidden" name="log_act_TipoUsuario" value="'. $row['log_act_TipoUsuario'] .'"/></td>';
        $cedula = $row['log_act_CedulaUsuario'];
        $tipoUsuario = $row['log_act_TipoUsuario'];
    }
    $estudianteBusiness = new EstudianteBusiness();
    $estudiante = $estudianteBusiness -> getCursosMatriculados($cedula);
    foreach ($estudiante as $row) {
    
        echo '<tr>';
        echo '<td><input type="text" readonly name="Curso" value="'. $row['cur_Nombre'] .'"/></td>';
        echo '<td><input type="text" readonly name="est_Cedula" value="'. $row['est_Cedula'] .'"/></td>';
        echo '<td><input type="text" readonly name="est_Nombre" value="'. $row['est_Nombre'] .'"/></td>';
        echo '<td><input type="text" readonly name="est_Apellido1" value="'. $row['est_Apellido1'] .'"/></td>';
        echo '<td><input type="text" readonly name="est_Apellido2" value="'. $row['est_Apellido2'] .'"/></td>';
        echo '</tr>';
    }
    ?>   

    </tbody>
</table> 
<br><br>
    <button name="Volver" id="volver"><a href="../view/vistaMenuEstudiante.php">Volver</a></button>
           
    
</body>
</html>