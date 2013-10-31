
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio</title>
<link href="index.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
	<div id="top-bar"> <div>Sistema de Inscripciones Laboratorio Fisica IV -Inicio-</div></div>
	<div class="content">
		<h3>Iniciar Sesion</h3>
			<div id="formlogin">
				<table>
					<form action="../login/loginvalidate.php" method="POST">
						<tr><td>Usuario:</td><td><input type="text" name="usuario" /></td></tr>
						<tr><td>Contrasenia:</td><td><input type="password" name="pass" /></td></tr>
						<input type="hidden" name="niv" value="3" />
						<tr><td colspan="2"><center><input type="submit" value="Entrar" /></center></td></tr>
					</form>
				</table>
      <!-- end #formlogin --></div>
      <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>