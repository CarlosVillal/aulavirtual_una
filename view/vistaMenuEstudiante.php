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
          
            margin:0 1px;
            width: 900px;
            font-weight:bold;
            font-size:1em;
            line-height: 20px;
            display:block;
            text-decoration: none
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

    <title>Menu Estudiante</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<h1>Menú Estudiante<h1>

<br><br>

<table class="table table-striped table-bordered" >
                  <thead>
                    <tr>
                    <br><br>  
                    <th><a href="view/vistaCurso.php">Ver Cursos Inscritos</a></th> <br><br>   
                      <th><a href="view/vistaAdministrador.php">Entregar Evaluaciones</a></th> <br><br>   
                      <th><a href="view/vistaAdministrador.php">Ver Notas Parciales y Finales</a></th> <br><br>   
                      <th><a href="view/vistaAdministrador.php">Ver Histórico De Cursos</a></th> <br><br>   
                      <th><a href="view/vistaAdministrador.php">Ver Perfil</a></th> <br><br>    
                                  
                    </tr>
                  </thead>
                  <tbody>
              
                   <tr>
                 <td></td>
                 <td>
                  


                   </tbody>
 
             </table>

            <?php
            echo '</br></br><td><button name="Volver" id="volver"><a href="../">Volver</a></button></td><br>';
            ?>




</body>
</html>
