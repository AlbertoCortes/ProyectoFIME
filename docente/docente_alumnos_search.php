<?php
session_start();
require_once("../login/valid.php");
require_once("../login/validpriv.php");
validDocente();
$usuario =  $_SESSION['usuario'];
require_once("../action/funciones_docente.php");
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
	<div id="top-bar"> <div id="bar-text">Sistema de Inscripciones -Docente-</div><div id="botonsalir">Bienvenido,  <?php echo $usuario->nombre; ?>  <a href="docente_modif_pass.php" title="Cambiar mi password" class="Bca">  Editar  </a>    <a href="../login/logout.php" title="Salir" class="BcaE">  Salir  </a></div></div>				
	<div class="content">
		<!--<div id="divnav"> 
			<ul id="nav">
				<li><a href="admin_docentes.php">Docentes</a></li>
				<li><a href="admin_alumnos.php">Alumnos</a></li>
				<li><a href="admin_brigadas.php">Brigadas</a></li>
				<li><a href="admin_oficial.php">Brigadas Oficiales</a></li>
				<li><a href="admin_avisos.php">Avisos</a></li>						
			</ul>
		</div>-->
		
				<div id='cssmenu'>
					<ul>
			  			<li class="active"><a href='docente.php'><span>Inicio</span></a></li>
			  			 <li><a href="docente_brigadas.php"><span>Brigadas</span></a></li>
			  			 <li><a href="docente_brigadas_oficiales.php"><span>Brigadas oficiales</span></a></li>
			  			 <li><a href="docente_alumnos.php"><span>Mis alumnos</span></a></li>
					</ul>
				</div>
		
			<div id="contenido">
			<h2>BIENVENIDO AL NUEVO SISTEMA DE INSCRIPCIONES PARA EL LABORATORIO DE FISICA 4</h2><br />
			
			<div id="tabladocentes">
				
				
				<?php
							
							filtro_alumnos_doc($usuario->num_empleado);
						?>
				
			</div>
			
						</div>
		
		
      <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>