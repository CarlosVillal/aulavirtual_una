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
</body>
<br>
<form action="subearchivo.php" method="post" enctype="multipart/form-data">
    <b>Nombre de trabajo:</b> 
    <br>
    <input type="text" name="cadenatexto" size="20" maxlength="100">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    <br>
    <br>
    <b>Subir archivo: </b>
    <br>
    <input name="userfile" type="file">
    <br/><br/>
    <input type="submit" value="Enviar Trabajo">
</form>
</head>

<br/><br/>
    <button><a href="../view/vistaMenuEstudiante.php">Volver</a></button>
</body>
</html>
