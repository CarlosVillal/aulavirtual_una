<?php 
  include '../business/estudianteBusiness.php'; 
  include '../business/cursoBusiness.php';
  include '../business/matriculaBusiness.php';
  include_once '../data/data.php';
  Data::Conexion();
?>

<!DOCTYPE html>
<head>
    <title>Estudiantes</title>
</head>
<body>

<form onsubmit="return(validar());" method="POST"  id="estudianteForm" action="../business/estudianteAction.php">  
    <div class="table-responsive">  
    <table class="table table-bordered">       
    
    <td><label>Cédula: </label>
    <input type="text" id="est_Cedula" name="est_Cedula" required></td>
                            
    <td><label>Nombre: </label>
    <input type="text" id="est_Nombre" name="est_Nombre" required></td>

    <td><label>Primer Apellido: </label>
    <input type="text" id="est_Apellido1" name="est_Apellido1" required></td>
                                  
    <td><label>Sengundo Apellido: </label>
    <input type="text" id="est_Apellido2" name="est_Apellido2" required></td>

    <td><label>Fecha de Nacimeinto: </label>
    <input type="date" id="est_FechaNacimiento" name="est_FechaNacimiento" required></td>
                                        
    <td><label>Dirección: </label>
    <input type="text" id="est_direccion" name="est_direccion" required></td>

    <td><label>Carrera: </label><select name="est_Carrera" id="est_Carrera">
      <option value="Ingeniería en Sistemas">Ingeniería en Sistemas</option>
      <option value="Mercadeo Internacional">Mercadeo Internacional</option>
      <option value="Administración">Administración</option>
      <option value="Administración de Oficinas">Administración de Oficinas</option>
      <option value="Inglés">Inglés</option>
    </select></td>
                                  
    <td><p>Tipo de beca: <select id="est_TipoBeca" name="est_TipoBeca" required >
    <option value="No aplica">No aplica</option>    
    <option value="Luis Felipe">Luis Felipe</option>    
    <option value="Omar Dengo">Omar Dengo</option>    
                               
  </select></td>


  <td><input onclick="return confirm('Seguro que desea almacenar los datos?')" type="submit" value="Registrar" name="Insertar" id="Insertar"/> </td>
  </table>      
  </div>  
      </form>  
<br><br><br>

<table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                      <th>Cédula</th>  
                      <th>Nombre</th>  
                      <th>Primer apellido</th>                   
                      <th>Sengundo apellido</th> 
                      <th>Fecha de Nacimiento</th>
                      <th>Dirección</th>
                      <th>Carrera</th>    
                      <th>Tipo de beca</th>                                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $estudianteBusiness = new EstudianteBusiness();
                  $estudiante = $estudianteBusiness->obtener();
                   foreach ($estudiante as $row) {

                    echo '<form  method="post" enctype="multipart/form-data" action="../business/estudianteAction.php">';
                    echo '<input type="hidden" name="est_Cedula" value="'. $row['est_Cedula'] .'">';
                    echo '<tr>';
                          
                    echo '<td><input type="text" readonly id="est_Cedula" name="est_Cedula"  value="'. $row['est_Cedula'] . '"/></td>';
                    echo '<td><input type="text" readonly id="est_Nombre" name="est_Nombre"  value="'. $row['est_Nombre'] . '"/></td>';
                    echo '<td><input type="text" readonly id="est_Apellido1" name="est_Apellido1" value="'. $row['est_Apellido1'] . '"/></td>';
                    echo '<td><input type="text" readonly name="est_Apellido2" id="est_Apellido2" value="'. $row['est_Apellido2'] . '"/></td>';
                    echo '<td><input type="text" name="est_FechaNacimiento" value="'. $row['est_FechaNacimiento'] . '"/></td>';
                    echo '<td><input type="text" name="est_direccion" id="est_direccion" value="'. $row['est_direccion'] . '"/></td>'; 
                   
                    echo '<td><select name="est_Carrera" id="est_Carrera">
                      <option value="'. $row['est_Carrera'] .'">'. $row['est_Carrera'] .'</option>
                      <option value="Ingeniería en Sistemas">Ingeniería en Sistemas</option>
                      <option value="Mercadeo Internacional">Mercadeo Internacional</option>
                      <option value="Administración">Administración</option>
                      <option value="Administración de Oficinas">Administración de Oficinas</option>
                      <option value="Inglés">Inglés</option>
                    </select></td>';

                    echo '<td><select name="est_TipoBeca" id="est_TipoBeca">
                      <option value="'. $row['est_TipoBeca'] .'">'. $row['est_TipoBeca'] .'</option>
                      <option value="No aplica">No aplica</option>    
                      <option value="Luis Felipe">Luis Felipe</option>    
                      <option value="Omar Dengo">Omar Dengo</option> 
                    </select></td>';
                    
                         ?> 
                            <td><input type="submit" value="Actualizar" name="Actualizar" id="update" onclick="return confirm('Seguro que desea guardar los cambios?')" /></td>
                            <td><input type="submit" value="Eliminar" name="Eliminar" id="delete" onclick="return confirm('Seguro que desea eliminar el registro?')" /></td>
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

             <br><br><br><br>
             <form method="POST"  id="matriculaForm" action="../business/matriculaAction.php">  
    <div class="table-responsive">  
    <table class="table table-bordered"> 
  
    <td><label>Matricular estudiante: </label><select name="est_Cedula" id="est_Cedula">
    <?php
    $estudianteBusiness = new EstudianteBusiness();
    $estudiante = $estudianteBusiness->obtener();
     foreach ($estudiante as $row) {                                
        echo '<option value="'. $row['est_Cedula'] .'">'. $row['est_Nombre'] .' '. $row['est_Apellido1'] .' '. $row['est_Apellido2'] .'</option>';                                
    }
    ?>
    </select></td>
    <td><label>Curso: </label><select name="cur_Sigla" id="cur_Sigla">
    <?php
    $cursoBusiness = new CursoBusiness();
    $curso = $cursoBusiness->obtener();
     foreach ($curso as $row) {                                
        echo '<option value="'. $row['cur_Sigla'] .'">'. $row['cur_Nombre'] .'</option>';                                
    }
    ?>
    </select></td>
    
    <td><input type="submit" onclick="return confirm('Seguro que desea almacenar los datos?')" value="Matricular" id="Insertar" name="Insertar"/></td>

 
</table>  
</div>  
</form>

<table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                      <th>Estudiante</th>  
                      <th>Curso</th>                                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $matriculaBusiness = new MatriculaBusiness();
                  $matricula = $matriculaBusiness->obtener();
                   foreach ($matricula as $row) {

                    echo '<form  method="post" enctype="multipart/form-data" action="../business/matriculaAction.php">';
                    echo '<input type="hidden" name="cur_est_Id" value="'. $row['cur_est_Id'] .'">';
                    echo '<tr>';
                          
                    echo '<td><input type="text" readonly id="est_Cedula" name="est_Cedula"  value="'. $row['est_Cedula'] . '"/></td>';
                    echo '<td><input type="text" readonly id="cur_Sigla" name="cur_Sigla"  value="'. $row['cur_Sigla'] . '"/></td>';
                                       
                    ?> 
                      <td><input type="submit" value="Eliminar" name="Eliminar" id="delete" onclick="return confirm('Seguro que desea eliminar el registro?')" /></td>
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
<br><br>
            <?php
            echo '</br></br><td><button name="Volver" id="volver"><a href="../">Volver</a></button></td><br>';
            ?>

</body>
</html>
