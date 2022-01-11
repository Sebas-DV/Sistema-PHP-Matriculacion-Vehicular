<?php
  error_reporting(5);

  session_start();

  if(isset($_SESSION['user']))
  {
    require_once 'nav-bar.php';
  }
  else
  {
    header('Location:../index.php');
  }
?>
