<?php
  session_start();

  require_once '../../clases/conexion.php';

  if(empty($_POST))
  {
    header('Location: ../../index.php');
  }
  else
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['user'] = $username;

    $sql = "SELECT * FROM usuarios WHERE user='$username' AND pass='$password'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0)
    {
      header('Location: ../../vistas/index.php');
    }
    else
    {
      echo '<script type="text/javascript">alert("Usuario y/o Contraseña incorrectos."); window.location.href="../../index.php";</script>';
    }
  }
?>
