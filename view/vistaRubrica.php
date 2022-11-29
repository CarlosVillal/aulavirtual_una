<?php 
  include '../business/cursoBusiness.php'; 
  include '../business/rubricaBusiness.php'; 
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
<h1>Crear Rubrica</h1>
<form method="POST"  id="rubricaForm" action="../business/rubricaAction.php">  
    <div class="table-responsive">  
    <table class="table table-bordered">       

    
    <td><label>Id Rubrica: </label>
    <input type="number" id="rub_Id" name="rub_Id" required></td>
                            
    <td><label>Examen 1:</label>
    <input type="number" id="rub_Examen1" name="rub_Examen1"></td>

    <td><label>Examen 2: </label>
    <input type="number" id="rub_Examen2" name="rub_Examen2" ></td>
                                  
    <td><label>Quiz 1: </label>
    <input type="number" id="rub_Quiz1" name="rub_Quiz1" ></td>

    <td><label>Quiz 2: </label>
    <input type="number" id="rub_Quiz2" name="rub_Quiz2" ></td>
                                        
    <td><label>Proyecto 1: </label>
    <input type="number" id="rub_Proyecto1" name="rub_Proyecto1" ></td>

    <td><label>Proyecto 2: </label>
    <input type="number" id="rub_Proyecto2" name="rub_Proyecto2" ></td>

    
    <td><label>Curso: </label><select name="curso" id="curso">
    <?php
    $cursobusiness = new Cursobusiness();
    $curso = $cursobusiness->obtener();
    foreach ($curso as $row) {                                
        echo '<option value="'. $row['cur_Sigla'] .'-">'. $row['cur_Sigla'] .'</option>';                                
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
                      <th>Curso</th>                                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $rubricaBusiness = new RubricaBusiness();
                  $rubrica = $rubricaBusiness->obtener();
                   foreach ($rubrica as $row) {

                    echo '<form  method="post" enctype="multipart/form-data" action="../business/rubricaAction.php">';
                    echo '<input type="hidden" name="rub_Id" value="'. $row['rub_Id'] .'">';
                    echo '<tr>';
                          
                    echo '<td><input type="text" readonly id="rub_Id" name="rub_Id"  value="'. $row['rub_Id'] . '"/></td>';
                    echo '<td><input type="text" id="rub_Examen1" name="rub_Examen1"  value="'. $row['rub_Examen1'] . '"/></td>';
                    echo '<td><input type="text" id="rub_Examen2" name="rub_Examen2" value="'. $row['rub_Examen2'] . '"/></td>';
                    echo '<td><input type="text" name="rub_Quiz1" id="rub_Quiz1" value="'. $row['rub_Quiz1'] . '"/></td>';
                    echo '<td><input type="text" name="rub_Quiz2" value="'. $row['rub_Quiz2'] . '"/></td>';
                    echo '<td><input type="text" name="rub_Proyecto1" id="rub_Proyecto1" value="'. $row['rub_Proyecto1'] . '"/></td>'; 
                    echo '<td><input type="text" name="rub_Proyecto2" id="rub_Proyecto2" value="'. $row['rub_Proyecto2'] . '"/></td>'; 
                    echo '<td><input type="text" name="curso" id="curso" value="'. $row['cur_Sigla'] . '"/></td>'; 
                    
                         ?> 
                            <td><input type="submit" value="Actualizar" name="Actualizar" id="Actualizar" onclick="return confirm('Seguro que desea guardar los cambios?')" /></td>
                            <td><input type="submit" value="Eliminar" name="Eliminar" id="Eliminar" onclick="return confirm('Seguro que desea eliminar el registro?')" /></td>
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
