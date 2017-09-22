<?php
require 'DAO.php';
if (isset($_GET['busqueda'])) {
  $DAOS = new DAO();
  $result = Array();
  $result = $DAOS->buscarUsuario($_GET['busqueda']);
  if (!empty($result)) {
    echo "
    <link href=\"http://localhost/EjercicioLogin/Estilo/estilo.css\" rel=\"stylesheet\" type=\"text/css\">
    <table id=\"tablabusqueda\" name=\"tablabusqueda\">
    <tr>
    <th id=\"fila\" name=\"fila\">Nombre</th>
    <th id=\"fila\" name=\"fila\">Apellido</th>
    <th id=\"fila\" name=\"fila\">Correo</th>
    <th id=\"fila\" name=\"fila\">Sexo</th>
    <th id=\"fila\" name=\"fila\">Permisos</th>
    <th id=\"fila\" name=\"fila\">Horroe</th>
    </tr>";
    for ($i=0; $i <count($result); $i=$i+5) {
      echo "<tr>";
      echo "<td id=\"fila\" name=\"fila\"> ".$result[$i]."</td>";
      echo "<td id=\"fila\" name=\"fila\"> ".$result[$i+1]."</td>";
      echo "<td id=\"fila\" name=\"fila\"> ".$result[$i+2]."</td>";
      if ($result[$i+3] == "m") {
        echo "<td>Masculino</td>";
      }else if($result[$i+3]== "f"){
        echo "<td>Femenino</td>";
      }
      if ($result[$i+4]== "R") {
        echo "<td id=\"fila\" name=\"fila\">Los permisos de ".$result[$i]. " son solo de lectura</td>";
      }else if($result[$i+4]== "RC"){
        echo "<td id=\"fila\" name=\"fila\">Los permisos de ".$result[$i]." son de lectura y creación de usuarios</td>";
      }else if($result[$i+4]== "RCE"){
        echo "<td id=\"fila\" name=\"fila\">Los permisos de ".$result[$i]." son de lectura, creación de usuarios y edición de usuarios</td>";
      }else if ($result[$i+4]== "RCED") {
        echo "<td id=\"fila\" name=\"fila\">Los permisos de ".$result[$i]." son de lectura, creación de usuarios, edición de usuarios y eliminar</td>";
      }
      echo "<td id=\"fila\" name=\"fila\"><a href=http://localhost/EjercicioLogin/Servidor/Controller.php?usuario=".$result[$i+2].">Ver perfil</a></td>";
      echo "</tr>";
    }
    echo "</table>";

  }else{
    echo "No se encontró usuario";
  }
}
if (isset($_GET['mailin']) and isset($_GET['passin'])) {
  $DAOS = new DAO();
  $result = $DAOS->verificarUsuario($_GET['mailin'], $_GET['passin']);
  if (!empty($result)) {
    session_start();
    $_SESSION['ID'] = $result[0];
    $_SESSION['Nombre'] = $result[1];
    $_SESSION['Apellido'] = $result[2];
    $_SESSION['Correo'] = $result[3];
    $_SESSION['Genero'] = $result[4];
    $_SESSION['Contra'] = $result[5];
    $_SESSION['Permiso'] = $result[6];
    header("Location: http://localhost/EjercicioLogin/Inicio");
  }else{
    echo "El correo o la contraseña son incorrectos";
  }
}
if (isset($_GET['salir'])) {
  session_destroy();
  header("Location: http://localhost/EjercicioLogin/Entrar");
}
if (isset($_GET['usuario'])) {
  session_start();
  $DAOS = new DAO();
  $result = $DAOS->elegirUsuario($_GET['usuario']);
  if (!empty($result)) {
    echo "<script type=\"text/javascript\" src=\"http://localhost/EjercicioLogin/js/creador.js\"></script>";
    echo "<div id=\"information\">";
    echo "<h3>Código: ".$result[0]."</h3>";
    echo "<h3>Nombre: ".$result[1]."</h3>";
    echo "<h3>Apellido: ".$result[2]."</h3>";
    echo "<h3>Correo: ".$result[3]."</h3>";
    if ($result[4]== "m") {
      echo "<h3>Sexo: Masculino</h3>";
    }else if($result[4]== "f"){
      echo "<h3>Sexo: Femenino</h3>";
    }
    if (strpos($_SESSION['Permiso'], 'E') !== false ) {
      echo "<button onclick=\"crear('".$result[1]."', '".$result[2]."', '".$result[3]."', '".$result[4]."', '".$result[6]."', '".$result[0]."' )\">Editar Usuario</button>";
    }
    if (strpos($_SESSION['Permiso'], 'D')!==false) {
      echo "<input type=\"button\" value=\"Borrar Usuario\" onclick=\"loadDoc('".$result[0]."')\">";
    }
    echo "</div>";
    echo "<div id=\"resultado\">";
    echo "</div>";
  }else{
    echo "Este usuario no existe";
  }
}
if (isset($_GET['UpName'])) {
  $DAOS = new DAO();
  $DAOS->editarUsuario($_GET['UpName'], $_GET['UpLastn'], $_GET['UpEmail'], $_GET['UpSex'], $_GET['UpPerm'], $_GET['idu']);
  header("Location: http://localhost/EjercicioLogin/Inicio/");
}
if (isset($_GET['delete'])) {
  $DAOS = new DAO();
  $DAOS->borrarUsuario($_GET['id']);
  echo "El usuario ha sido eliminado";
}
if(isset($_GET['newname'])){
  $DAOS = new DAO();
  $DAOS->crearUsuario($_GET['newname'], $_GET['newlastname'], $_GET['newemail'], $_GET['newsex'], $_GET['newpass']);
  header("Location: http://localhost/EjercicioLogin/Inicio/");
}
?>
