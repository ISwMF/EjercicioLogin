function crear() {
  document.write('<form action=\"http://localhost/EjercicioLogin/Servidor/Controller.php\">');
  document.write('<h3>Nombre: </h3><input name=\"UpName\" id=\"UpName\" type=\"text\" value='+arguments[0]+ '>');
  document.write('<h3>Apellido: </h3><input name=\"UpLastn\" id=\"UpLastn\" type=\"text\" value='+arguments[1]+ '>');
  document.write('<h3>Correo: </h3><input type=\"text\" name=\"UpEmail\" value='+arguments[2]+ ' >');
  document.write('<h3>Sexo: </h3><input type=\"text\" name=\"UpSex\" id=\"UpSex\"value='+arguments[3]+ '>');
  document.write('<h3>Permisos: </h3><input type=\"text\" name=\"UpPerm\" id=\"UpPerm\"value='+arguments[4]+ '>');
  document.write('<h3>ID: </h3><input type=\"text\" name=\"idu\" id=\"idu\" value='+arguments[5]+'   >')
  document.write('<input type=\"submit\">');
  document.write('</form>');
}

function loadDoc() {
  var a=arguments[0];
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.page.innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "http://localhost/EjercicioLogin/Servidor/Controller.php?delete=true&id="+a, true);
  xhttp.send();
}
