<?php 
  include '../business/cursoBusiness.php';
  include '../business/estudianteBusiness.php';
  include '../business/profesorBusiness.php';
  include '../business/calificacionBusiness.php';
  include '../business/matriculaBusiness.php';
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
<html>
<head>
	<title>Area Evaluacion</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<?php 
   $cur_est_Id="0";
   ?>
<?php 
 
if(isset($_POST['Buscar'])){ 

$cur_est_Id = $_POST['cur_est_Id'];
   }  

   ?>

<h1>Area Evaluaciones</h1>
<form onsubmit="return(validar());" method="POST"  id="calificacionForm" action="../view/calificarEvaluacionesVista.php">  
    <div class="table-responsive">  
    <table class="table table-bordered">       
      
    </select></td>
    <td><label>Estudiantes Matriculados:  </label><select name="cur_est_Id" id="cur_est_Id" required>
    <?php
    $estudianteBusiness = new EstudianteBusiness();
    $estudiante = $estudianteBusiness->obtener();
    foreach ($estudiante as $row) {                                
        echo '<option value="'. $row['est_Cedula'] .'">'. $row['est_Cedula'] .'</option>';                                
    }

 
    ?>
  
  <td><input onclick="return confirm('Seguro que desea buscar el dato?')" type="submit" value="Buscar" name="Buscar" id="Buscar"/> </td>
    
</table>  
</div>  
</form> 
<br><br>




    <table class="table table-striped table-bordered" >
    <thead>
    <tr>
    <th>Examen 1</th>
    <th>Examen 2</th>
    <th>Quiz 1</th>
    <th>Quiz 2</th>
    <th>Proyecto 1</th>
    <th>Proyecto 2</th>
    <th>Nota Final</th>
    <th>Siglas del curso</th>
    <th>Estudiante matriculado</th>
</tr>
</thead>
    <tbody>

    <?php
    $calificacionBusiness = new CalificacionBusiness();
    $calificacion = $calificacionBusiness -> obtenerCalificacionEspecificaDeEstudiante($cur_est_Id);
    foreach ($calificacion as $row) {
        echo '<form  method="post" enctype="multipart/form-data" action="../business/calificacionAction.php">';
        echo '<input type="hidden" name="cal_Id" value="'. $row['cal_Id'].'">';
        echo '<tr>';
        echo '<td><input type="number" id="cal_Examen1" name="cal_Examen1" value="'. $row['cal_Examen1'].'"/></td>';
        echo '<td><input type="number" id="cal_Examen2" name="cal_Examen2" value="'. $row['cal_Examen2'].'"/></td>';
        echo '<td><input type="number" id="cal_Quiz1" name="cal_Quiz1" value="'. $row['cal_Quiz1'].'"/></td>';
        echo '<td><input type="number" id="cal_Quiz2" name="cal_Quiz2" value="'. $row['cal_Quiz2'].'"/></td>';
        echo '<td><input type="number" id="cal_Proyecto1" name="cal_Proyecto1" value="'. $row['cal_Proyecto1'].'"/></td>';
        echo '<td><input type="number" id="cal_Proyecto2" name="cal_Proyecto2" value="'. $row['cal_Proyecto2'].'"/></td>';
        echo '<td><input type="number" id="cur_NotaFinal" name="cur_NotaFinal" value="'. $row['cur_NotaFinal'].'"/></td>';
        echo '<td><input readonly type="text" id="cur_Sigla" name="cur_Sigla" value="'. $row['cur_Sigla'].'"/></td>';
        echo '<td><input readonly type="text" id="cur_est_Id" name="cur_est_Id" value="'. $row['cur_est_Id'].'"/></td>';
        ?> 
        <td><input type="submit" value="Actualizar" name="Actualizar" id="Actualizar" onclick="return confirm('Seguro que desea guardar los cambios?')" /></td>
        
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

         
         <button name="Volver"><a href="../view/vistaMenuProfesor.php">Volver</a></button>
        




</body>
</html>