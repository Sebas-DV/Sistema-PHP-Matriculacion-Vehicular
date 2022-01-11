<?php
  require_once "../../clases/conexion.php";

  $idV = $_POST['idVehiculo'];
  $idCliente = $_POST['idCliente'];
  $des = $_POST['des'];
  $marca = $_POST['marca'];
  $matricula = $_POST['matricula'];

  $sql = "UPDATE vehiculos SET id_usuario='$idCliente', descripcion='$des', marca='$marca', tipo_matricula='$matricula' WHERE id_vehiculo='$idV'";
  $result = mysqli_query($con, $sql);

  echo $result;
?>
