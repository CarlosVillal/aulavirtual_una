<?php 
  include '../business/historicoBusiness.php'; 
  include_once '../data/data.php';
  Data::Conexion();
?>

<!DOCTYPE html>
<head>
    <title>Cursos Historicos</title>
</head>
<body>

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
                   <th>Profesor</th>                                   
                    </tr>
                  </thead>
                  <tbody>
                  <?php
    $historicBusiness = new HistoricoBusiness();
    $historico = $historicBusiness -> obtenerHistorico_Estudiante(702540125);
    foreach ($historico as $row) {
        echo '<form  method="post" enctype="multipart/form-data" action="../business/historicoAction.php">';
        
        echo '<tr>';
        echo '<td><input type="text" readonly name="his_Sigla" value="'. $row['his_Sigla'].'"/></td>';
        echo '<td><input type="text" name="his_Nombre" value="'. $row['his_Nombre'].'"/></td>';
        echo '<td><input type="text" name="his_CantidadEstudiantes" value="'. $row['his_CantidadEstudiantes'].'"/></td>';
        echo '<td><input type="text" name="his_Vigencia" value="'. $row['his_Vigencia'].'"/></td>';
        echo '<td><input type="text" name="car_Id" value="'. $row['car_Id'].'"/></td>';
        echo '<td><input type="text" name="pro_Cedula" value="'. $row['pro_Cedula'].'"/></td>';
    ?>   
    
    
                         <?php  
                         
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

            <?php
            echo '</br></br><td><button name="Volver" id="volver"><a href="../">Volver</a></button></td><br>';
            ?>




</body>
</html>
