<?php
  require_once 'nav-bar.php';
  require_once '../procesos/vehiculos/VehiculosREG.php';
  require_once '../clases/conexion.php';

  if(isset($_SESSION['user']))
  {
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="../js/funciones.js"></script>
  </head>
  <body>
    <div class="container cont-main">
      <div class="cont-t">
        <h3>Administracion de Vehiculos</h3>
        <hr>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="menssage-error">
            <h5><?php echo isset($error) ? $error : ''; ?></h5>
          </div>
          <form action="" method="POST">
            <div class="form-group">
              <label for="email">Cliente:</label>
              <?php
                $query = mysqli_query($con, "SELECT * FROM usuarios");
              ?>
              <select name="id_usuario" class="browser-default custom-select">
                <option selected>Seleccionar Cliente</option>
              <?php
                if(mysqli_num_rows($query) > 0)
                {
                  while($usuarios = mysqli_fetch_array($query))
                  {
              ?>
                <option value="<?php echo $usuarios['id_usuario']; ?>"><?php echo $usuarios['nombres']." ".$usuarios['apellidos']; ?></option>
              <?php
                  }
                }
              ?>
              </select>
            </div>

            <div class="form-group">
              <label for="pwd">Descripcion:</label>
              <input type="text" name="descripcion" class="form-control" id="pwd" placeholder="Descripcion del Vehiculo">
            </div>
            <div class="form-group">
              <label for="pwd">Marca:</label>
              <input type="text" name="marca" class="form-control" id="pwd" placeholder="Marca">
            </div>
            <div class="form-group">
              <label for="pwd">Tipo de Matricula:</label>
              <input type="text" name="matricula" class="form-control" id="pwd" placeholder="Tipo de Matricula">
            </div>
            <button type="submit" name="reg" class="btn btn-success">Registrar Vehiculo</button>
          </form>
        </div>
        <div class="col-md-8">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Marca</th>
                <th scope="col">Tipo Matricula</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = mysqli_query($con, "SELECT v.id_vehiculo, u.nombres, u.apellidos, v.descripcion,v.marca,v.tipo_matricula, v.id_usuario
                                           FROM vehiculos v
                                           INNER JOIN usuarios u
                                           ON v.id_usuario = u.id_usuario");

                $result = mysqli_num_rows($sql);

                if($result >= 0)
                {
                  while ($data = mysqli_fetch_array($sql))
                  {
                    $datos =$data[0]."||".$data[3]."||".$data[4]."||".$data[5]."||".$data[6];
              ?>
                    <tr>
                      <th scope="row"><?php echo $data[0]; ?></th>
                      <td><?php echo $data[1]." ". $data[2]; ?></td>
                      <td><?php echo $data[4]; ?></td>
                      <td><?php echo $data[5]; ?></td>
                      <td><button type="button"class="btn btn-success" data-toggle="modal" data-target="#editar-datos" onclick="cargarDatosVehiculo('<?php echo $datos; ?>')">Editar</button></td>
                      <td><button type="button" class="btn btn-danger" data-toggle="modal" onclick="DeleteMessageV('<?php echo $data[0]; ?>')">Eliminar</button></td>
                    </tr>
              <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--Modal Edicion-->
    <div class="modal fade" id="editar-datos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Edicion de Registros</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
            <div class="modal-body">
              <input type="text" id="id_vehiculo" name="id_vehiculo" hidden="" value="">
              <div class="form-group">
                <label for="email">Cliente:</label>
                <?php
                  $query = mysqli_query($con, "SELECT * FROM usuarios");
                ?>
                <select name="id_usuario" class="browser-default custom-select">
                  <option selected>Seleccionar Cliente</option>
                <?php
                  if(mysqli_num_rows($query) > 0)
                  {
                    while($usuarios = mysqli_fetch_array($query))
                    {
                ?>
                  <option id="id_usuario" value="<?php echo $usuarios['id_usuario']; ?>"><?php echo $usuarios['nombres']." ".$usuarios['apellidos']; ?></option>
                <?php
                    }
                  }
                ?>
                </select>
              </div>

              <div class="form-group">
                <label for="pwd">Descripcion:</label>
                <input id="descripcion" type="text" name="descripcion" class="form-control" id="pwd" placeholder="Descripcion del Vehiculo">
              </div>
              <div class="form-group">
                <label for="pwd">Marca:</label>
                <input id="marca" type="text" name="marca" class="form-control" id="pwd" placeholder="Marca">
              </div>
              <div class="form-group">
                <label for="pwd">Tipo de Matricula:</label>
                <input id="matricula" type="text" name="matricula" class="form-control" id="pwd" placeholder="Tipo de Matricula">
              </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="act-v">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#act-v').click(function(){
      ActualizarVehiculo();
    });
  });
</script>
<?php
  }
  else
  {
    header('Location: ../index.php');
  }
?>
