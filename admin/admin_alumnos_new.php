<?php
session_start();
require_once("../view/view.php");
require_once("../login/valid.php");
require_once("../login/validpriv.php");
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
	<div id="top-bar"> <div id="bar-text">Sistema de Inscripciones -Administrador- (Alumnos)</div><div id="botonsalir">Bienvenido,  <?php echo $usuario->nombre; ?>   <a href="#" title="Editar mis datos" class="Bca">  Editar  </a>    <a href="../login/logout.php" title="Salir" class="BcaE">  Salir  </a></div></div>				
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
		
				<div id='cssmenu'> <img src="../resources/lfime1.png" />
					<ul><br />
			 			  <li class="active"><a href='admin_alumnos.php'><span>Alumnos </span></a></li>
			  			 <li><a href= 'admin_alumnos_new.php'><span>Nuevo Alumno</span></a></li>
						  <li class='last'><a href='admin_alumnos_import.php'><span>Importar Alumnos</span></a></li>

					</ul>
				</div>
		
		<div id="contenido">
			<h2> Ingresar nuevo alumno al sistema</h2>
						<?php
							new_alumno();		
						?>
			
		</div>
	</div>
	</div>
	</body>
	</html>