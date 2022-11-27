<?php
include '../business/profesorBusiness.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<table class="table table-striped table-bordered" >
    <thead>
    <tr>
    <th>Carrera</th>
    <th>Nombre de Curso</th>   
    <th>Vigencia</th>
    <th>Num. estudiantes matriculados</th>
</tr>
</thead>
    <tbody>
    <?php
    $profesorBusiness = new ProfesorBusiness();
    $profesor = $profesorBusiness -> obtenerReporteEspecifico();
    foreach ($profesor as $row) {
        echo '<tr>';
        echo '<td><input type="text" readonly name="pro_Cedula" value="'. $row['cur_Nombre'] .'"/></td>';
        echo '<td><input type="text" readonly name="pro_Nombre" value="'. $row['car_Nombre'] .'"/></td>';
        echo '<td><input type="text" readonly name="pro_Apellido2" value="'. $row['cur_Vigencia'] .'"/></td>';
        echo '<td><input type="text" readonly name="pro_Apellido1" value="'. $row['Estud. Matriculados'] .'"/></td>';
        echo '</tr>';
    }
    ?>   

    </tbody>
</table> 
    
</body>
</html>