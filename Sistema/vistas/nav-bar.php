<?php session_start(); require_once 'dependencias.php'; ?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
        <div class="container">
            <a class="navbar-brand" href="index.php">
              <img src="../img/logo.png" alt="">
            </a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                &#9776;
            </button>
            <div class="collapse navbar-collapse" id="exCollapsingNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="Usuarios.php" class="nav-link">Administrar Usuarios</a></li>
                    <li class="nav-item"><a href="Vehiculos.php" class="nav-link">Administracion Vehiculos</a></li>
                    <li class="nav-item"><a href="Reportes.php" class="nav-link">Generador de Reportes</a></li>
                </ul>
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                    <li class="dropdown order-1">
                        <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Usuario: <?php echo $_SESSION['user']; ?><span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                           <li class="px-3 py-2">
                             <div class="form-group">
                               <a class="btn btn-danger btn-block" href="../clases/salir.php">SALIR</a>
                              </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </body>
</html>
