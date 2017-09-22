<?php
session_start();
if(empty($_SESSION['Nombre'])){
  header("Location: http://localhost/EjercicioLogin/Entrar/index.html");
}
?>
<html lang="es">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Bienvenid@ <?php echo $_SESSION['Nombre']?></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="#">Perfil</a></li>
          <li><a href="http://localhost/EjercicioLogin/Busqueda/">Buscar</a></li>
          <?php
          if (strpos($_SESSION['Permiso'], 'C') !== false ) {
            echo "<li><a href=\"http://localhost/EjercicioLogin/NuevoUsuario/\">Crear usuario</a></li>";
          }
          ?>
          <li><a href="http://localhost/EjercicioLogin/Servidor/Controller.php?salir=true">Salir</a></li>
        </ul>
      </div>
    </nav>
  </body>
</html>
