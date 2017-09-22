<?php
require "DBOperator.php";
class DAO {
  private $DBO;
  private $Consulta;
  public function __construct(){
    $this->DBO = new DBOperator('localhost', 'root', 'usuarios', '', 'utf8');
  }
  public function buscarUsuario ($user){
    $this->Consulta="SELECT Nombre, Apellido, Email, Genero, Rol FROM `users` WHERE Nombre LIKE '".$user."'";
    $result=Array();
    $result = $this->DBO->consult($this->Consulta, "yes");
    $this->DBO->close();
    return $result;
  }
  public function verificarUsuario($mail, $pass){
    $this->Consulta="SELECT * FROM `users` WHERE Email LIKE '".$mail."'";
    $result = $this->DBO->consult($this->Consulta, "yes");
    return $result;
  }
  public function elegirUsuario($email){
    $this->Consulta="SELECT * FROM `users` WHERE Email LIKE '".$email."'";
    $result = $this->DBO->consult($this->Consulta, "yes");
    return $result;
  }
  public function editarUsuario($nombre, $apellido, $email, $genero, $rol, $id){
    $this->Consulta="UPDATE `users` SET `Nombre`= '".$nombre."', `Apellido` = '".$apellido."', `Email` = '".$email."', `Genero` = '".$genero."', `Rol` ='".$rol."' WHERE `users`.`ID` = ".$id;
    $result = $this->DBO->consult($this->Consulta, "no");
  }
  public function borrarUsuario($id){
    $this->Consulta="DELETE FROM `users` WHERE `users`.`ID` = ".$id;
    $this->DBO->consult($this->Consulta, "no");
  }
  public function crearUsuario($Nombre, $Apellido, $Correo, $Genero, $Contra){
    $this->Consulta="INSERT INTO `users` (`ID`, `Nombre`, `Apellido`, `Email`, `Genero`, `Contraseña`, `Rol`) VALUES (NULL, '".$Nombre."', '".$Apellido."', '".$Correo."', '".$Genero."', '".$Contra."', 'R');";
    $this->DBO->consult($this->Consulta, "no");
  }
}
?>
