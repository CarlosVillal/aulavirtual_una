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
    <th>Cedula Profesor</th>
    <th>Cursos Impartidos</th>
</tr>
</thead>
    <tbody>
    <?php
    $profesorBusiness = new ProfesorBusiness();
    $profesor = $profesorBusiness -> obtenerReporteDetalle();
    foreach ($profesor as $row) {
        echo '<tr>';
        echo '<td><input type="text" readonly name="Cedula" value="'. $row['Cedula Profesor'] .'"/></td>';
        echo '<td><input type="text" readonly name="Cursos" value="'. $row['Cursos Impartidos'] .'"/></td>';
        echo '</tr>';
    }
    ?>   

    </tbody>
</table> 
    
</body>
</html>