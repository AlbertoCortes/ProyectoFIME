<?php
session_start();
require_once("../login/valid.php");
require_once("../login/validpriv.php");
require_once ("../action/reportes.php");
validAdmin();
$usuario =  $_SESSION['usuario'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio</title>
<link href="css/adminIndex.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
	<div id="top-bar"> <div id="bar-text">Sistema de Inscripciones -Administrador- (Brigadas)</div><div id="botonsalir">Bienvenido,  <?php echo $usuario->nombre; ?>   <a href="admin_modif_pass.php" title="Editar mis contraseña" class="Bca">  Editar  </a>    <a href="../login/logout.php" title="Salir" class="BcaE">  Salir  </a></div></div>				
	<div class="content">
		<div id="divnav"> 
			<ul id="nav">
				<li><a href="admin.php"> Inicio </a></li>	
				<li><a href="admin_docentes.php">Docentes</a></li>
				<li><a href="admin_alumnos.php">Alumnos</a></li>
				<li><a href="admin_brigadas.php">Brigadas</a></li>
				<li><a href="admin_oficial.php">Brigadas Oficiales</a></li>
				
			</ul>
		</div>
		
				<div id='cssmenu'>
					 <img src="../resources/lfime1.png" />
					
					<br /><br /><br /><br /><br /><br /><br /><br />
				</div>
		
			<div id="contenido">
			<h2>BIENVENIDO AL NUEVO SISTEMA DE INSCRIPCIONES PARA EL LABORATORIO DE FISICA 4</h2><br />
				<h3>Por favor seleccione la practica a realizar durante la semana </h3><br /><br />
			<?php
							
							listar_practicas();		
						?>
						</div>
		
		
      <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>