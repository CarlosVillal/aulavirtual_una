<?php 
  include '../business/cursoBusiness.php'; 
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

<br><br><br>
<table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                    <th>Siglas</th>
                    <th>Nombre de curso</th>
                    <th>Numero de cupos</th>
                    <th>Vigencia</th>
                    <th>Carrera</th>
                   <th>Profesor</th>                                   
                    </tr>
                  </thead>
                  <tbody>
                  <?php
    $cursoBusiness = new CursoBusiness();
    $curso = $cursoBusiness -> obtener();
    foreach ($curso as $row) {
        echo '<form  method="post" enctype="multipart/form-data" action="../business/cursoAction.php">';
        
        echo '<tr>';
        echo '<td><input type="text" readonly name="cur_Sigla" value="'. $row['cur_Sigla'].'"/></td>';
        echo '<td><input type="text" name="cur_Nombre" value="'. $row['cur_Nombre'].'"/></td>';
        echo '<td><input type="text" name="cur_CantidadCupos" value="'. $row['cur_CantidadCupos'].'"/></td>';
        echo '<td><input type="text" name="cur_Vigencia" value="'. $row['cur_Vigencia'].'"/></td>';
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
