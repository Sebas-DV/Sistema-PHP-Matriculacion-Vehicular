<?php
  require_once '../clases/conexion.php';
  $error = "";

  if(!empty($_POST))
  {
    if(empty($_POST['id_usuario']) || empty($_POST['descripcion']) || empty($_POST['marca']) || empty($_POST['matricula']))
    {
      $error = "Alert: Todos los campos Son obligatorios.";
    }
    else
    {
      $clientID = $_POST['id_usuario'];
      $descripcion = $_POST['descripcion'];
      $marca = $_POST['marca'];
      $matricula = $_POST['matricula'];


      $query = mysqli_query($con, "INSERT INTO vehiculos (id_usuario, descripcion, marca, tipo_matricula)
              VALUES('$clientID', '$descripcion', '$marca', '$matricula')");
      if($query)
      {
        $error = "Sucess: Se registro Exitosamente..";
      }
      else
      {
        $error = "Error: No se pudo registrar :(";
      }
    }
  }
?>
