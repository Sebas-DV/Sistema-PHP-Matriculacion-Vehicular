<?php
  require_once "../../clases/conexion.php";

  $id = $_POST['id'];

  $sql = "DELETE FROM vehiculos WHERE id_vehiculo='$id'";

  $result = mysqli_query($con, $sql);

  echo $result;
?>
