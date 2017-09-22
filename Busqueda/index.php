
<?php
session_start();
if(empty($_SESSION['Nombre'])){
  header("Location: http://localhost/EjercicioLogin/Entrar/index.html");
}
?>
<html>
  <head>
    <link href="http://localhost/EjercicioLogin/Estilo/estilo.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <form action="http://localhost/EjercicioLogin/Servidor/Controller.php">
      <input type="search" id="busqueda" name="busqueda" placeholder="Busque..."></input>
      <input type="submit" value="Buscar"></input>
    </form>
  </body>
</html>
