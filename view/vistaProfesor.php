<?php
  include '../business/profesorBusiness.php';
  include_once '../data/data.php';
  Data::Conexion();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profesores</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>

	 <form method="POST"  id="creditoForm" action="../business/profesorAction.php">  
    <div class="table-responsive">  
    <table class="table table-bordered"> 

    <td><label>Cedula: </label><input type="text" name="pro_Cedula" require ></td>
    <td><label>Nombre: </label><input type="text" name="pro_Nombre" ></td>
    <td><label>Primer Apellido: </label><input type="text" name="pro_Apellido1"></td>
    <td><label>Segundo Apellido: </label><input type="text" name="pro_Apellido2" ></td>
    <td><label>Fecha de Nacimiento: </label><input type="date" name="pro_FechaNacimiento" ></td>
    <td><label>Sexo: </label></td>
    <td><input type="radio" id="sexo" name="pro_Sexo" value="Maculino"></td>
    <td><label for="sexo">Masculino</label></td>
    <td><input type="radio" id="sexo" name="pro_Sexo" value="Femenino"></td>
    <td><label for="sexo">Femenino</label></td>
    <td><label>Grado Academico: </label><input type="text" name="pro_GradoAcademico"></td>
    <td><label>Años de experiencia: </label><input type="number" name="pro_AniosExperiencia"></td>
    
    <td><input type="submit" onclick="return confirm('Seguro que desea almacenar los datos?')" value="Insertar" name="Insertar"/></td>

 
</table>  
</div>  
</form>  
<br><br>
    <table class="table table-striped table-bordered" >
    <thead>
    <tr>
    <th>Cedula</th>
    <th>Nombre</th>
    <th>Primer Apellido</th>
    <th>Segundo Apellido</th>
    <th>Fecha de Nacimiento</th>
    <th>Sexo</th>
    <th>Grado Academico</th>
    <th>Años de experiencia</th>
</tr>
</thead>
    <tbody>
    <?php
    $profesorBusiness = new ProfesorBusiness();
    $profesor = $profesorBusiness -> obtener();
    foreach ($profesor as $row) {
        echo '<form  method="post" enctype="multipart/form-data" action="../business/profesorAction.php">';
        echo '<tr>';
        echo '<td><input type="text" readonly name="pro_Cedula" value="'. $row['pro_Cedula'] .'"/></td>';
        echo '<td><input type="text" readonly name="pro_Nombre" value="'. $row['pro_Nombre'] .'"/></td>';
        echo '<td><input type="text" readonly name="pro_Apellido1" value="'. $row['pro_Apellido1'] .'"/></td>';
        echo '<td><input type="text" readonly name="pro_Apellido2" value="'. $row['pro_Apellido2'] .'"/></td>';
        echo '<td><input type="text" name="pro_FechaNacimiento" value="'. $row['pro_FechaNacimiento'] .'"/></td>';
        echo '<td><input type="text" readonly name="pro_Sexo" value="'. $row['pro_Sexo'] .'"/></td>';
        echo '<td><input type="text" readonly name="pro_GradoAcademico" value="'. $row['pro_GradoAcademico'] .'"/></td>';
        echo '<td><input type="text" name="pro_AniosExperiencia" value="'. $row['pro_AniosExperiencia'] .'"/></td>';
    ?>   
        <td><input type="submit" value="Actualizar" name="Actualizar" id="Actualizar" onclick="return confirm('Seguro que desea guardar los cambios?')" /></td>
        <td><input type="submit" value="Eliminar" name="Eliminar" id="Eliminar" onclick="return confirm('Seguro que desea eliminar el registro?')" /></td>
       
<tr>
<td>
    <?php
 }

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

//}
    ?>
    </td>
    </tr>
    </tbody>
</table>
   
    </br></br>
    <button name="Volver" id="volver"><a href="../">Volver</a></button>
   

</body>
</html>