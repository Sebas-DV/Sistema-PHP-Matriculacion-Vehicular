<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LOGIN - USUARIO</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <div class="main">
      <div class="container">
        <center>
          <div class="middle">
            <div id="login">
              <form action="procesos/login/Login.php" method="POST">
                <fieldset class="clearfix">
                  <p ><span class="fa fa-user"></span><input type="text"  name="username" Placeholder="Usuario" required></p>
                  <p><span class="fa fa-lock"></span><input type="password"  name="password"Placeholder="Contraseña" required></p>
                  <div>
                   <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Iniciar Session"></span>
                  </div>
                </fieldset>
                <div class="clearfix"></div>
              </form>
              <div class="clearfix"></div>
            </div>
            <div class="logo">
              <img class="logo-img" src="img/logo.png" alt="">
              <div class="clearfix"></div>
            </div>
          </div>
        </center>
      </div>
    </div>
  </body>
</html>
