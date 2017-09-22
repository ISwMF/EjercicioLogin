<?php
session_start();
if(empty($_SESSION['Nombre'])){
  header("Location: http://localhost/EjercicioLogin/Entrar/index.html");
}
?>
<html lang="es">
  <head>
  </head>
  <body>
    <form action="http://localhost/EjercicioLogin/Servidor/Controller.php">
      Nombre: <input type="text" name="newname"><br>
      Apellido: <input type="text" name="newlastname"><br>
      Correo: <input type="text" name="newemail"><br>
      Sexo: <input type="radio" name="newsex" value="m">Masculino<input type="radio" name="newsex" value="f">Femenino<br>
      Contraseña: <input type="password" name="newpass"><br>
      <p><b>El nuevo usuario comenzará con los permisos de lectura</b></p><br>
      <input type="submit">
    </form>
  </body>
</html>
