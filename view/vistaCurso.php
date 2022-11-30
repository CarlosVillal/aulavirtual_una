<?php 
  include '../business/cursoBusiness.php';
  include '../business/carreraBusiness.php';
  include '../business/profesorBusiness.php';
  include '../business/matriculaBusiness.php';
  include '../business/loginBusiness.php';
  include '../business/estudianteBusiness.php'; 
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
	<title>Cursos</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>

<?php
$cedula = "";
$tipoUsuario = "";
    $loginBusiness = new LoginBusiness();
    $login = $loginBusiness -> getLoginActivo();
    foreach ($login as $row) {
        echo '<td><input type="hidden" name="log_act_CedulaUsuario" value="'. $row['log_act_CedulaUsuario'] .'"/></td>';
        echo '<td><input type="hidden" name="log_act_Contrasenia" value="'. $row['log_act_Contrasenia'] .'"/></td>';
        echo '<td><input type="hidden" name="log_act_TipoUsuario" value="'. $row['log_act_TipoUsuario'] .'"/></td>';
        $cedula = $row['log_act_CedulaUsuario'];
        $tipoUsuario = $row['log_act_TipoUsuario'];
    }
?>

<h1>Registro de Cursos</h1>
<head><br><br></head>
	 <form method="POST"  id="cursoForm" action="../business/cursoAction.php">  
    <div class="table-responsive">  
    <table class="table table-bordered"> 

    <td><label>Siglas: </label><input type="text" id="cur_Sigla" name="cur_Sigla" placeholder="Siglas" require></td>
    <td><label>Nombre de curso: </label><input type="text" id="cur_Nombre" name="cur_Nombre" placeholder="Nombre de curso" require></td>  

    </select></td>                       
    <td><p>Carrera: <select id="car_Id" name="car_Id" >
    <option value="3">Ingeniería en Sistemas</option>    
    <option value="4">Mercadeo Internacional</option>    
    <option value="5">Administración</option>    
    <option value="6">Administración de Oficinas</option>    
    <option value="7">Inglés</option>                           
  </select></td>
  
    </select></td>
    <td><label>Profesor: </label><select name="pro_Cedula" id="pro_Cedula" required>
    <?php
    $profesorbusiness = new ProfesorBusiness();
    $profesor = $profesorbusiness->obtener();
    foreach ($profesor as $row) {                                
        echo '<option value="'. $row['pro_Cedula'] .'">'. $row['pro_Nombre'] .' '. $row['pro_Apellido1'] .' '. $row['pro_Apellido2'] .'</option>';                                
    }
    ?>
    </select></td>
    <input type="hidden" name="cur_Vigencia" value="Activo" >
    <td><input type="submit" onclick="return confirm('Seguro que desea almacenar los datos?')" value="Insertar" id="Insertar" name="Insertar"/></td>

 
</table>  
</div>  
</form> 

<br><br><hr><br><br>

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
        echo '<td><select name="cur_Vigencia" id="cur_Vigencia">
        <option value="'. $row['cur_Vigencia'].'">'. $row['cur_Vigencia'].'</option>
        <option value="Activo">Activo</option>
        <option value="Finalizado">Finalizado</option>
        </select></td>';
        echo '<td><input type="text" name="car_Id" value="'. $row['car_Id'].'"/></td>';
        echo '<td><input type="text" name="pro_Cedula" value="'. $row['pro_Cedula'].'"/></td>';
    ?>   
        <td><input type="submit" value="Actualizar" name="Actualizar" id="Actualizar" onclick="return confirm('Seguro que desea guardar los cambios?')" />
        <input type="submit" value="Eliminar" name="Eliminar" id="Eliminar" onclick="return confirm('Seguro que desea eliminar el registro?')" /></td>
        <?php } ?>
       </form>
    </tbody>
</table>

<br><BR></BR><hr><br><br><br>
             <h1>Matricular estudiantes</h1>
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
    <input type="hidden" name="ruta" value="../view/vistaCurso.php" >
    <td><input type="submit" onclick="return confirm('Seguro que desea almacenar los datos?')" value="Matricular" id="Insertar" name="Insertar"/></td>

 
</table>  
</div>  
</form>
<BR></BR>
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
                    <input type="hidden" name="ruta" value="../view/vistaCurso.php" >
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
   
    </br></br>
    <?php
    if($tipoUsuario == "Administrador"){
        echo '<button name="Volver" id="volver"><a href="../view/vistaMenuAdministrador.php">Volver</a></button>';
    }else if($tipoUsuario == "Profesor"){
        echo '<button name="Volver" id="volver"><a href="../view/vistaMenuProfesor.php">Volver</a></button>';
    }
    ?>
   

</body>
</html>