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

                  <thead>
                   
                    <br> 
                    <button><a href="vistaVerCursoInscritoEst.php">Ver Cursos Inscritos</a></button><br>  
                    <button><a href="vistaEntregarTrabajos.php">Entregar Evaluaciones</a></button><br>  
                    <button><a href="vistaVerParciales.php">Ver Notas Parciales y Finales</a></button><br>   
                    <button><a href="vistaHistoricoEstudiante.php">Ver Histórico De Cursos</a></button><br>   
                    <button><a href="vistaMiPerfil.php">Ver Perfil</a></button><br><br>    
                                  
                   
                  </thead>
                  <tbody>
              
                   <tr>
                 <td></td>
                 <td>             

                   </tbody>
 
       

            <?php
            echo '</br><td><button name="Volver" id="volver"><a href="../">SALIR</a></button></td><br>';
            ?>




</body>
</html>
