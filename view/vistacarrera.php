<?php 
  include '../business/carreraBusiness.php'; 
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

    <title>Carreras</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>

<form method="POST"  id="carreraForm" action="../business/carreraAction.php">  
    <div class="table-responsive">  
    <table class="table table-bordered">       
                    
    <!-- <td><label>ID de carrera: </label>
    <input type="number" name="car_Id"></td> -->

    <td><label>Nombre de carrera: </label>
    <input type="text" id="car_Nombre" name="car_Nombre"></td>

    <td><input onclick="return confirm('Seguro que desea almacenar los datos?')" type="submit" value="Registrar" name="Insertar" id="Insertar"/> </td>
</table>      
</div>  
</form>  
<br><br><br>

<table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                      <th>Nombre de carrera</th>                                 
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $carreraBusiness = new CarreraBusiness();
                   $carreras = $carreraBusiness->obtener();
                   foreach ($carreras as $row) {

                 
                    echo '<form  method="post" enctype="multipart/form-data" action="../business/carreraAction.php">';
                    echo '<input type="hidden" name="car_Id" value="'. $row['car_Id'].'">';
                            
                    echo '<tr>';                          
                    echo '<td><input type="text" name="car_Nombre"  value="'. $row['car_Nombre'] .'"/></td>';       

                         ?> 
                            <td><input type="submit" value="Actualizar" name="Actualizar" id="update" onclick="return confirm('Seguro que desea guardar los cambios?')" />
                            <input type="submit" value="Eliminar" name="Eliminar" id="delete" onclick="return confirm('Seguro que desea eliminar el registro?')" /></td>
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
