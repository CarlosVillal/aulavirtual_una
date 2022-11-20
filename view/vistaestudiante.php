<?php 
  include '../business/EstudianteBusiness.php'; 
  include_once '../data/data.php';
  Data::Conexion();
?>

<!DOCTYPE html>
<head>

    <title>Estudiantes</title>
</head>
<body>



<form onsubmit="return(validar());" method="POST"  id="estudianteForm" action="../business/EstudianteAction.php">  
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
                                        
                                  <td><label>Dirección: </label>
                                  <input type="text" id="est_direccion" name="est_direccion" required></td>
                                  
                                  <td><p>Tipo de beca: <select id="est_TipoBeca" name="est_TipoBeca" required >
                                <option value="No aplica">‘No aplica</option>    
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
                      <th>Dirección</th>    
                      <th>Tipo de beca</th>                                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $estudianteBusiness = new EstudianteBusiness();
                  $estudiante = $estudianteBusiness->obtener();
                   foreach ($estudiante as $row) {

                    echo '<form  method="post" enctype="multipart/form-data" action="../business/EstudianteAction.php">';
                    echo '<input type="hidden" name="est_Cedula" value="'. $row->getest_Cedula().'">';
                            echo '<tr>';
                          
                            echo '<td><input type="text" id="est_Cedula" name="est_Cedula"  value="'. $row->getest_Cedula(). '"/></td>';
                          echo '<td><input type="text" id="est_Nombre" name="est_Nombre"  value="'. $row->getest_Nombre(). '"/></td>';
                      echo '<td><input type="text" id="est_Apellido1" name="est_Apellido1" value="'. $row->getest_Apellido1(). '"/></td>';
                      echo '<td><input type="text" name="est_Apellido2" id="est_Apellido2" value="'. $row->getest_Apellido2(). '"/></td>';
                       echo '<td><input type="text" name="est_direccion" id="est_direccion" value="'. $row->getest_direccion(). '"/></td>';           
                   echo '<td><input type="text" name="est_TipoBeca" id="est_TipoBeca" value="'. $row->getest_TipoBeca(). '"/></td>';                                 

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

            <?php
            echo '</br></br><td><button name="Volver" id="volver"><a href="../">Volver</a></button></td><br>';
            ?>




</body>
</html>
