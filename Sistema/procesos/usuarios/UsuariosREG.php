<?php
  require_once '../clases/conexion.php';
  $error = "";

  if(!empty($_POST))
  {
    if(empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['nom']) || empty($_POST['ape']) || empty($_POST['tel']) || empty($_POST['dir']))
    {
      $error = "Alert: Todos los campos Son obligatorios.";
    }
    else
    {
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $nom = $_POST['nom'];
      $ape = $_POST['ape'];
      $tel = $_POST['tel'];
      $dir = $_POST['dir'];


      $query = mysqli_query($con, "INSERT INTO usuarios (user, pass, nombres, apellidos, telefono, direccion)
              VALUES('$user', '$pass', '$nom', '$ape', '$tel', '$dir')");
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
