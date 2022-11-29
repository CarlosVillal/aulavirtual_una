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


    private $cur_est_Id;
<h1>Area Evaluaciones</h1>
<form onsubmit="return(validar());" method="POST"  id="estudianteForm" action="../business/calificacionAction.php">  
    <div class="table-responsive">  
    <table class="table table-bordered">       
      
    </select></td>
    <td><label>Estudiante Matriculado:  </label><select name="cur_est_Id" id="cur_est_Id" required>
    <?php
    $matriculaBusiness = new MatriculaBusiness();
    $matricula = $matriculaBusiness->obtener();
    foreach ($matricula as $row) {                                
        echo '<option value="'. $row['cur_est_Id'] .'">'. $row['cur_Sigla'] .' '. $row['est_Cedula'] .'</option>';                                
    }
    
    ?>
    </select></td>
    <td><label>Id: </label>
    <input type="text" id="cal_Id" name="cal_Id" required></td>
                            
    <td><label>Examen 1: </label>
    <input type="text" id="cal_Examen1" name="cal_Examen1" required></td>

    <td><label>Examen 2: </label>
    <input type="text" id="cal_Examen2" name="cal_Examen2" required></td>
                                  
    <td><label>Quiz 1: </label>
    <input type="text" id="cal_Quiz1" name="cal_Quiz1" required></td>

    <td><label>Quiz 2: </label>
    <input type="date" id="cal_Quiz2" name="cal_Quiz2" required></td>
                                        
    <td><label>Proyecto 1: </label>
    <input type="text" id="cal_Proyecto1" name="cal_Proyecto1" required></td>

    <td><label>Proyecto 1: </label>
    <input type="text" id="cal_Proyecto1" name="cal_Proyecto1" required></td>

<td><label>Proyecto 2: </label>
    <input type="text" id="cal_Proyecto2" name="cal_Proyecto2" required></td>

    <td><label>Nota Final: </label>
    <input type="text" id="cur_NotaFinal" name="cur_NotaFinal" required></td>


  <td><input onclick="return confirm('Seguro que desea almacenar los datos?')" type="submit" value="Registrar" name="Insertar" id="Insertar"/> </td>
    
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
    <th>Estudiante matriculado</th>
</tr>
</thead>
    <tbody>

    <?php
    $cursoBusiness = new CursoBusiness();
    $curso = $cursoBusiness -> obtener();
    foreach ($curso as $row) {
        echo '<form  method="post" enctype="multipart/form-data" action="../business/calificacionAction.php">';
        
        echo '<tr>';
        echo '<td><input type="text" readonly name="cal_Id" value="'. $row['cal_Id'].'"/></td>';
        echo '<td><input type="text" name="cal_Examen1" value="'. $row['cal_Examen1'].'"/></td>';
        echo '<td><input type="text" name="cal_Examen2" value="'. $row['cal_Examen2'].'"/></td>';
        echo '<td><input type="text" name="cal_Examen2" value="'. $row['cal_Quiz1'].'"/></td>';
        echo '<td><input type="text" name="cal_Examen2" value="'. $row['cal_Quiz2'].'"/></td>';
        echo '<td><input type="text" name="cal_Examen2" value="'. $row['cal_Proyecto1'].'"/></td>';
        echo '<td><input type="text" name="cal_Examen2" value="'. $row['cal_Proyecto2'].'"/></td>';
        echo '<td><input type="text" name="cal_Examen2" value="'. $row['cur_NotaFinal'].'"/></td>';
        echo '<td><select name="cur_est_Id"'. $row['cur_est_Id'].'"/></td>';
    ?>   
        <td><input type="submit" value="Actualizar" name="Actualizar" id="Actualizar" onclick="return confirm('Seguro que desea guardar los cambios?')" />
        <input type="submit" value="Eliminar" name="Eliminar" id="Eliminar" onclick="return confirm('Seguro que desea eliminar el registro?')" /></td>
    
      
<tr>
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
}}
    ?>
    </td>
    </tr>
    </tbody>
</table>
   
    </br></br>
    <button name="Volver" id="volver"><a href="../">Volver</a></button>
   

</body>
</html>