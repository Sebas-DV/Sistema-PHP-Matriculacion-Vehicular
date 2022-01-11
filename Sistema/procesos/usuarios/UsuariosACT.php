<?php
  require_once "../../clases/conexion.php";

  $id = $_POST['id'];
  $nombres = $_POST['nombres'];
  $apellidos = $_POST['apellidos'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];

  $sql = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', telefono='$telefono', direccion='$direccion' WHERE id_usuario='$id'";
  $result = mysqli_query($con, $sql);

  echo $result;
?>
