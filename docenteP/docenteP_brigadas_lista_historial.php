<?php
session_start();
require_once("../action/reportes.php");
//require_once("../view/view.php");
require_once("../login/valid.php");
require_once("../login/validpriv.php");
validDocenteP();
$usuario =  $_SESSION['usuario'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Docente</title>
<link href="css/adminIndex.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
	<div id="top-bar"> <div id="bar-text">Sistema de Inscripciones -Administrador- (Brigadas)</div><div id="botonsalir">Bienvenido,  <?php echo $usuario->nombre; ?>   <a href="#" title="Editar mis datos" class="Bca">  Editar  </a>    <a href="../login/logout.php" title="Salir" class="BcaE">  Salir  </a></div></div>				
	<div class="content">
				<div id='cssmenu'><img src="../resources/lfime1.png" />
					<ul><br />
			  			<li class="active"><a href='docenteP.php'><span>Inicio</span></a></li>
			  			 <li><a href="docenteP_brigadas.php"><span>Brigadas</span></a></li>
			  			 <li><a href="docenteP_brigadas_oficiales.php"><span>Brigadas oficiales</span></a></li>
			  			 <li><a href="docenteP_alumnos.php"><span>Mis alumnos</span></a></li>
			  			 <br /> <br/>

			  			 <li class="active"><a href='docenteP_alumnos_new.php'><span>Dar de alta almnos</span></a></li>
			  			 <li><a href="docenteP_alumnos_reasig.php"><span>Reasignar alumnos</span></a></li>
			  			 <li><a href="docenteP_brigadas_historial.php"s><span>Historial de birgadas</span></a></li>

				</div>
		
		<div id="contenido">
			<h2>Lista de alumnos que asistieron a la brigada</h2>
			<div id="tabladocentes">
					
				<?php
							historial_asistencia();
						?>
				
			</div>
		</div>
	</div>
	</div>
	</body>
	</html>