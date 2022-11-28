<?php
// $hostName = gethostname();
// Print "$hostName";
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
<html lang="en">
<head>
<title>Aula Virtual UNA</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Profesores</h1>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="static/css/estilos.css">
    <script type="text/javascript" src="../static/js/funciones.js" ></script>
     
</head>
<body>
<div>
    <form>
    <select id="opcion" >
        <option value="registraProfesor">Registro de Profesores</option>
        <option value="reporteDetalle">Reportes en Detalle de Profesores</option>
        <option value="reporteEspecifico">Reportes en Especifico de Profesores</option>
    </select>
        <input class="btnSelect" type="button" value="Mostrar" onclick="verificar()" /> 
    <div id="contenedor"></div>
            
    <br/><br/>     
    </form>
</div>

<br/><br/>
    <button name="Volver" id="volver"><a href="../">Volver</a></button>

</body>
</html>
