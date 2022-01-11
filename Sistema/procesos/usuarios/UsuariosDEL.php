<?php
  require_once "../../clases/conexion.php";

  $id = $_POST['id'];

  $sql = "DELETE FROM usuarios WHERE id_usuario='$id'";

  $result = mysqli_query($con, $sql);

  echo $result;
?>
