<?php 
  include '../business/estudianteBusiness.php'; 
  include '../business/cursoBusiness.php';
  include '../business/matriculaBusiness.php';
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
    <title>Rubrica</title>
</head>
<body>
<h1>Registro de Rubrica</h1>
<form onsubmit="return(validar());" method="POST"  id="estudianteForm" action="../business/estudianteAction.php">  
    <div class="table-responsive">  
    <table class="table table-bordered">       

    
    <td><label>Id Rubrica: </label>
    <input type="number" id="rub_id" name="rub_id" required></td>
                            
    <td><label>Examen 1:</label>
    <input type="number" id="rub_examen1" name="rub_examen1" required></td>

    <td><label>Examen 2: </label>
    <input type="number" id="rub_examen2" name="rub_examen2" required></td>
                                  
    <td><label>Quiz 1: </label>
    <input type="number" id="rub_quiz1" name="rub_quiz1" required></td>

    <td><label>Quiz 2: </label>
    <input type="number" id="rub_quiz2" name="rub_quiz2" required></td>
                                        
    <td><label>Proyecto 1: </label>
    <input type="number" id="rub_Proyecto1" name="rub_Proyecto1" required></td>

    <td><label>Proyecto 2: </label>
    <input type="number" id="rub_Proyecto2" name="rub_Proyecto2" required></td>

    <td><label>Nota Final: </label>
    <input type="number" id="rub_NotaFinal" name="rub_NotaFinal" required></td>

    <td><label>Curso: </label><select name="cur_Sigla" id="cur_Sigla" required>
    <?php
    $cursobusiness = new Cursobusiness();
    $curso = $cursobusiness->obtener();
    foreach ($curso as $row) {                                
        echo '<option value="'. $row['cur_Sigla'] .'-">'. $row['cur_Nombre'] .'</option>';                                
    }
    ?>
    </select></td>

  <td><input onclick="return confirm('Seguro que desea almacenar los datos?')" type="submit" value="Registrar" name="Insertar" id="Insertar"/> </td>
  </table>      
  </div>  
      </form>  
<br><br><br>

<table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                      <th>Id Rubrica</th>  
                      <th>Examen 1</th>  
                      <th>Examen 2</th>                   
                      <th>Quiz 1</th> 
                      <th>Quiz 2</th>
                      <th>Proyecto 1</th>
                      <th>Proyecto 2</th>    
                      <th>Nota Final</th>                                    
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
                   </tbody> 
             </table>
             
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
