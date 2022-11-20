<?php 
  include '../business/cursoBusiness.php';
  include '../business/carreraBusiness.php';
  include '../business/profesorBusiness.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cursos</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>

	 <form method="POST"  id="creditoForm" action="../business/cursoAction.php">  
    <div class="table-responsive">  
    <table class="table table-bordered"> 

    <td><label>Siglas: </label><input type="text" id="cur_Sigla" name="cur_Sigla" placeholder="Siglas" require></td>
    <td><label>Nombre de curso: </label><input type="text" id="cur_Nombre" name="cur_Nombre" placeholder="Nombre de curso" require></td>
    <td><label>Numero de cupos: </label><input type="number" id="cur_CantidadCupos" name="cur_CantidadCupos" placeholder="N° de cupos"  ></td>
    <td><label>Vigencia: </label><select name="cur_Vigencia" id="cur_Vigencia">
        <option value="Trimestre">Trimestre</option>
        <option value="Cuatrimestre">Cuatrimestre</option>
        <option value="Semestre">Semestre</option>
    </select></td>
    <td><label>Carrera: </label><select name="car_Id" id="car_Id" required>
    <?php
    $carrerabusiness = new CarreraBusiness();
    $carrera = $carrerabusiness->getAllTBCarrera();
    foreach ($carrera as $row) {                                
        echo '<option value="'. $row->getCarreraId(). '">'. $row->getNombreCarrera(). '</option>';                                
    }
    ?>
    </select></td>
    <td><label>Profesor: </label><select name="pro_Cedula" id="pro_Cedula" required>
    <?php
    $profesorbusiness = new Profesor();
    $profesor = $profesorbusiness->getAllTBProfesor();
    foreach ($carrera as $row) {                                
        echo '<option value="'. $row->getpro_Cedula(). '">'. $row->getpro_Nombre(). ' '. $row->getpro_Apellido1(). '</option>';                                
    }
    ?>
    </select></td>
    <td><input type="submit" onclick="return confirm('Seguro que desea almacenar los datos?')" value="Insertar" id="Insertar" name="Insertar"/></td>

 
</table>  
</div>  
</form>  
<br><br>
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
        echo '<td><input type="text" readonly name="cur_Sigla" value="'. $row->getcur_Sigla().'"/></td>';
        echo '<td><input type="text" name="cur_Nombre" value="'. $row->getcur_Nombre().'"/></td>';
        echo '<td><input type="text" name="cur_CantidadCupos" value="'. $row->getcur_CantidadCupos().'"/></td>';
        echo '<td><input type="text" name="cur_Vigencia" value="'. $row->getcur_Vigencia().'"/></td>';
        echo '<td><input type="text" name="car_Id" value="'. $row->getcar_Id().'"/></td>';
        echo '<td><input type="text" name="pro_Cedula" value="'. $row->getpro_Cedula().'"/></td>';
    ?>   
        <td><input type="submit" value="Actualizar" name="Actualizar" id="Actualizar" onclick="return confirm('Seguro que desea guardar los cambios?')" /></td>
        <td><input type="submit" value="Eliminar" name="Eliminar" id="Eliminar" onclick="return confirm('Seguro que desea eliminar el registro?')" /></td>
    
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