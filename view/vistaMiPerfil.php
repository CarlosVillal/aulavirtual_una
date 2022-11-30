<?php 
  include '../business/estudianteBusiness.php'; 
  include '../business/loginBusiness.php';
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
    <title>Perfil Estudiante</title>
</head>
<body> 
<?php
  $cedula = "";
  $tipoUsuario = "";
    $loginBusiness = new LoginBusiness();
    $login = $loginBusiness -> getLoginActivo();
    foreach ($login as $row) {
        echo '<td><input type="hidden" name="log_act_CedulaUsuario" value="'. $row['log_act_CedulaUsuario'] .'"/></td>';
        echo '<td><input type="hidden" name="log_act_TipoUsuario" value="'. $row['log_act_TipoUsuario'] .'"/></td>';
        $cedula = $row['log_act_CedulaUsuario'];
        $tipoUsuario = $row['log_act_TipoUsuario'];
    }
    ?>

<table class="table table-striped table-bordered" >
                  <thead>
                  <h1>Mi Perfil</h1>
                    <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>  
                    <th>Primer apellido</th>                   
                    <th>Sengundo apellido</th> 
                    <th>Fecha de Nacimiento</th>
                    <th>Dirección</th>
                    <th>Carrera</th>    
                    <th>Tipo de beca</th>                                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   $estudianteBusiness = new EstudianteBusiness();
                  $estudiante = $estudianteBusiness->obtenerEstudianteEspecifico($cedula);
                   foreach ($estudiante as $row) {

                    echo '<form  method="post" enctype="multipart/form-data" action="../business/estudianteAction.php">';
                    echo '<input type="hidden" name="est_Cedula" value="'. $row['est_Cedula'] .'">';
                    echo '<tr>';
                          
                    echo '<td><input type="text" readonly id="est_Cedula" name="est_Cedula"  value="'. $row['est_Cedula'] . '"/></td></br>';
                    echo '<td><input type="text" readonly id="est_Nombre" name="est_Nombre"  value="'. $row['est_Nombre'] . '"/></td></br>';
                    echo '<td><input type="text" readonly id="est_Apellido1" name="est_Apellido1" value="'. $row['est_Apellido1'] . '"/></td></br>';
                    echo '<td><input type="text" readonly name="est_Apellido2" id="est_Apellido2" value="'. $row['est_Apellido2'] . '"/></td></br>';
                    echo '<td><input type="text" name="est_FechaNacimiento" value="'. $row['est_FechaNacimiento'] . '"/></td></br>';
                    echo '<td><input type="text" name="est_direccion" id="est_direccion" value="'. $row['est_direccion'] . '"/></td></br>'; 
                   
                    echo '<td><select name="est_Carrera" id="est_Carrera">
                      <option value="'. $row['est_Carrera'] .'">'. $row['est_Carrera'] .'</option>
                      <option value="Ingeniería en Sistemas">Ingeniería en Sistemas</option>
                      <option value="Mercadeo Internacional">Mercadeo Internacional</option>
                      <option value="Administración">Administración</option>
                      <option value="Administración de Oficinas">Administración de Oficinas</option>
                      <option value="Inglés">Inglés</option>
                    </select></td></br>';

                    echo '<td><select name="est_TipoBeca" id="est_TipoBeca">
                      <option value="'. $row['est_TipoBeca'] .'">'. $row['est_TipoBeca'] .'</option>
                      <option value="No aplica">No aplica</option>    
                      <option value="Luis Felipe">Luis Felipe</option>    
                      <option value="Omar Dengo">Omar Dengo</option> 
                    </select></td></br>';
                       
                    ?> 
                    
                    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
        <span class="heading">Foto de Perfil</span>
        <form>
            <div class="holder">
                <img id="imgPreview" src="#" alt="pic" />
            </div>
            <input type="file" name="photograph"
                   id="photo" required="true" />
        </form>
        <style>
            .holder {
                height: 200px;
                width: 200px;
                border: 2px solid black;
            }
            img {
                max-width: 200px;
                max-height: 200px;
                min-width: 200px;
                min-height: 200px;
            }
            input[type="file"] {
                margin-top: 5px;
            }
            .heading {
                font-family: Montserrat;
                font-size: 45px;
                color: green;
            }
        </style>
        <script>
            $(document).ready(() => {
                $("#photo").change(function () {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#imgPreview")
                              .attr("src", event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>
    
<br/><br/>

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

<br/><br/>
<button><a href="../view/vistaMenuEstudiante.php">Volver</a></button>


</body>
</html>
