<?php 

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
        h1 {
            text-align: left;
            margin: auto;
            font-weight:bold;
            font-size:2.0em;
            text-align: left;
            line-height: 44px;
            display:block;
            text-decoration: none

        }
        a {
          
      
            font-family: cursive;

        }
        table, th {
            margin: auto;
            text-align: left;
            background-color: #FF0000;


        }

        table, td {
            text-align: left;
            margin: auto;
            background-color:#FFFFFF;

        }

        th, td {
            text-align: left;
            padding: 15px;
            font-family: cursive;
        }

        th{
              text-align: left;
            padding: 20px;
            font-family: cursive;
            font-size:1.5em;
        }
        image{


        }
        </style>
<head>

    <title>Menu Profesor</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
  
<h1>Menú Profesor<h1>
                  <thead>
              
                    <br> 
                    <button><a href="vistaCurso.php">Area Cursos</a></button><br>   
                    <button><a href="vistaAdministrador.php">Distribuir Rúbrica de Calificación</a></button><br>
                    <button><a href="view/vistaAdministrador.php">Calificar Evaluaciones</a></button><br>   
                    <button><a href="vistaestudiante.php">Ver Reporte de Estudiantes</a></button><br>   
                    <button><a href="view/vistaAdministrador.php">Ver Histórico de Cursos</a></button><br>    
                                  
                  
                  </thead>
                  <tbody>
              
                 
                 <td></td>
                 <td>
                  


                   </tbody>
 
   

            <?php
            echo '</br><td><button name="Volver" id="volver"><a href="../">Volver</a></button></td><br>';
            ?>




</body>
</html>
