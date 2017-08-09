
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio</title>
<link href="index.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="containeer">
	<div id="top-bar"> <div>Sistema de Inscripciones Laboratorio Fisica IV -Inicio-</div></div>
	<div class="content">
		<h3>Iniciar Sesion</h3>
	<div id="lateral">
		<img src="resources/lfime.png" />
	</div>
	
	
			<div id="formlogin">
				<center><table>
					<form id="log" action="login/loginvalidate.php" method="POST">
						<h2>Introduce tu matricula y tu contraseña para iniciar</h2>
						
						<br />
						
						<tr><td>Usuario:</td><td><input type="text" name="usuario" /></td></tr>
						<tr><td>Contraseña:</td><td><input type="password" name="pass" /></td></tr>
						<input type="hidden" name="niv" value="0" />
						<tr><td colspan="2"><center><input type="submit" value="Entrar" /></center></td></tr>
					</form>
				</table></center>
      <!-- end #formlogin --></div>
      <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>