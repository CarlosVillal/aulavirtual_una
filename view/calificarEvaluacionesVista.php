<?php 
  include '../business/cursoBusiness.php';
  include '../business/carreraBusiness.php';
  include '../business/profesorBusiness.php';
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
	<title>Cursos</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
    

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
</tr>
</thead>
    <tbody>
    <?php
  
    ?>   
      
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
}
    ?>
    </td>
    </tr>
    </tbody>
</table>
   
    </br></br>
    <button name="Volver" id="volver"><a href="../">Volver</a></button>
   

</body>
</html>