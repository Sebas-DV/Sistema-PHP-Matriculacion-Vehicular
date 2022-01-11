<?php
  require_once 'nav-bar.php';
  require_once '../procesos/usuarios/UsuariosREG.php';
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
        <h3>Administracion de Usuarios</h3>
        <hr>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="menssage-error">
            <h5><?php echo isset($error) ? $error : ''; ?></h5>
          </div>
          <form action="" method="POST">
            <div class="form-group">
              <label for="email">Usuario:</label>
              <input type="text" name="user" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="pwd">Contraseña:</label>
              <input type="password" name="pass" class="form-control" id="pwd">
            </div>
            <div class="form-group">
              <label for="pwd">Nombres:</label>
              <input type="text" name="nom" class="form-control" id="pwd">
            </div>
            <div class="form-group">
              <label for="pwd">Apellidos:</label>
              <input type="text" name="ape" class="form-control" id="pwd">
            </div>
            <div class="form-group">
              <label for="pwd">Telefono:</label>
              <input type="text" name="tel" class="form-control" id="pwd">
            </div>
            <div class="form-group">
              <label for="pwd">Direccion:</label>
              <input type="text" name="dir" class="form-control" id="pwd">
            </div>
            <button type="submit" name="reg" class="btn btn-success">Registrar</button>
          </form>
        </div>
        <div class="col-md-8">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = mysqli_query($con, "SELECT * FROM usuarios");

                $result = mysqli_num_rows($sql);

                if($result >= 0)
                {
                  while ($data = mysqli_fetch_array($sql))
                  {
                    $datos = $data['id_usuario']."||".$data['nombres']."||".$data['apellidos']."||".$data['telefono']."||".$data['direccion'];
              ?>
                    <tr>
                      <th scope="row"><?php echo $data['id_usuario']; ?></th>
                      <td><?php echo $data['nombres']; ?></td>
                      <td><?php echo $data['apellidos']; ?></td>
                      <td><?php echo $data['telefono']; ?></td>
                      <td><button type="button"class="btn btn-success" data-toggle="modal" data-target="#editar-datos" onclick="cargarDatos('<?php echo $datos; ?>')">Editar</button></td>
                      <td><button type="button" class="btn btn-danger" data-toggle="modal" onclick="DeleteMessage('<?php echo $data[0]; ?>')">Eliminar</button></td>
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
              <input type="text" id="id_user" hidden="" name="" value="">
              <div class="form-group">
                <label for="email1">Nombres:</label>
                <input type="text" id="nombre" class="form-control" aria-describedby="emailHelp" placeholder="Nombres">
              </div>
              <div class="form-group">
                <label for="password1">Apellidos:</label>
                <input type="text" id="apellido" class="form-control"  placeholder="Apellidos">
              </div>
              <div class="form-group">
                <label for="password1">Telefono:</label>
                <input type="text" id="telefono" class="form-control"  placeholder="Telefono">
              </div>
              <div class="form-group">
                <label for="password1">Direccion:</label>
                <input type="text" id="direccion" class="form-control"  placeholder="Direccion">
              </div>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="button" class="btn btn-success" data-dismiss="modal" id="act">Actualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#act').click(function(){
      actualizarDatos();
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
