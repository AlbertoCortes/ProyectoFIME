<?php
require_once("../lib/lib.php");
echo "<script type='text/javascript' src='../lib/jquery.js'></script>
        <script type='text/javascript' src='../lib/lib.js'></script>
";
/*
 * CONSTRUCTORES PARA ALTAS   ---INICIO---
 */
function new_docente(){
	echo"<table>";
	echo"<form name ='new_docente' action='../action/alta_docente.php' method='POST' >";
	echo"<tr><th>Numero de empleado:</th><td><input type='text' name='Noempleado' value='' maxlength='7' onkeypress='javascript:return validarNro(event)'/></td></tr>"; 
	echo"<tr><th>Nombre:</th><td><input type='text' name='Nombre' value='' onkeypress='return soloLetras(event)'/></td></tr>";
	echo"<tr><th>Telefono:</th><td><input type='text' name='Telefono' value='' maxlength='10' onkeypress='javascript:return validarNro(event)'/></td></tr>";
	echo"<tr><th>Email:</th><td><input type='text' name='Email'></td></tr>";
	echo"<tr><th>Permisos especiales:</th><td>Si<input type='radio' checked='false' name='permisos' value='3'>No<input type='radio' name='permisos' checked='true' value='1'></td></tr>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Agregar Docente'> </form></center></td>";
	echo"</table>";
}
function new_alumno(){
	echo"<table>";
	echo"<form name ='new_alumno' action='../action/alta_alumno.php' method='POST' >";
	echo"<tr><th>Matricula:</th><td><input type='text' name='Matricula' value='' maxlength='7' onkeypress='javascript:return validarNro(event)'/></td></tr>"; 
	echo"<tr><th>Nombre:</th><td><input type='text' name='Nombre' value='' onkeypress='return soloLetras(event)'/></td></tr>";
	echo "<tr><th>Brigada:</th><td>";
	echo "<select name='Brigada'>";
	echo "<option value = '-1'></option>";
		$pro = drop_brigada_real();
			foreach($pro as $key =>$prv){
				echo "<option value ='{$prv->idbrigada_real}' selected>{$prv->idbrigada_real}</option>";
					}
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo"<tr><th>Plan:</th><td><input type='text' name='plan'></td></tr>";
	echo"<tr><th>Email:</th><td><input type='text' name='Email'></td></tr>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Agregar Alumno'></center></td>";
	echo"</table>";
}
function import_alumnos(){
	echo"<table>";
	echo"<form name ='import_alumnos' action='../import/import.php' method='POST' enctype='multipart/form-data'>";
	echo"<tr><th>Archivo txt:</th><td><input type='file' name='import'/></td></tr>"; 
	echo"<tr><td colspan='2'><center><input type='submit' value='Cargar archivo'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='admin_alumnos.php'></center></td>";
	echo"</table>";
}
function new_brigada_real(){
	echo "<table>";
	echo "<form name = 'new_brigada_real' action = '../action/alta_brigada_real.php' method = 'POST'>";
	echo"<tr><th>Brigada Oficial:</th><td><input type='text' name='Nobrigada' maxlength='3' onkeypress='return validarNro(event)'/></td></tr>"; 
	echo "<tr><th>Maestro:</th><td>";
	echo "<select name='Maestro'>";
	echo "<option value = '-1'></option>";
		$pro = drop_docentes();
			foreach($pro as $key =>$prv){
				if ($prv->num_empleado == $prv->num_empleado){
						echo "<option value ='{$prv->num_empleado}' selected>{$prv->nombre}</option>";}
				else{
						echo "<option value ='{$prv->num_empleado}'>{$prv->nombre}</option>";}
					}
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Agregar Brigada'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}
function new_brigada(){
	echo"<table>";
	echo"<form name ='new_brigada' action='../action/alta_brigada.php' method='POST'>";
	echo"<tr><th>Numero de brigada:</th><td><input type='text' name='Nobrigada' maxlength='3' onkeypress='return validarNro(event)'/></td></tr>"; 
	echo "<tr><th>Maestro:</th><td>";
	echo "<select name='Maestro'>";
	echo "<option value = '-1'></option>";
		$pro = drop_docentes();
			foreach($pro as $key =>$prv){
				if ($prv->num_empleado == $prv->num_empleado){
						echo "<option value ='{$prv->num_empleado}' selected>{$prv->nombre}</option>";}
				else{
						echo "<option value ='{$prv->num_empleado}'>{$prv->nombre}</option>";}
					}// esto nos ayuda e elegir el proveedor... de manera automatizada
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo"<tr><th>Día:</th><td><select name='dia'>";
	for($d = 1; $d<=6; $d++)
	{
		switch($d)
		{
			case "01": $dia = "Lunes"; break;
			case "02": $dia = "Martes"; break;
			case "03": $dia = "Miercoles"; break;
			case "04": $dia = "Jueves"; break;
			case "05": $dia = "Viernes"; break;
			case "06": $dia = "Sabado"; break;			
		}
		echo "<option value='$dia'>$dia</option>";
	}
	echo"<tr><th>Hora:</th><td><select name='hora'>";
	for($h=1; $h<=9; $h++){
		switch ($h) {
			case "01": $hora = "M1-M2"; break;
			case "02": $hora = "M3-M4"; break;
			case "03": $hora = "M5-M6"; break;
			case "04": $hora = "V1-V2"; break;
			case "05": $hora = "V3-V4"; break;
			case "06": $hora = "V5-V6"; break;
			case "07": $hora = "N1-N2"; break;
			case "08": $hora = "N3-N4"; break;
			case "09": $hora = "N5-N6"; break;		
		}
		echo "<option value='$hora'>$hora</option>";
	}
	echo"<tr><th>Salon:</th><td><input type='text' name='Salon' value='6204' /></td></tr>";
	echo"<tr><th>Cupo:</th><td><input type='text' name='NAlumnos' value='20' maxlength='2' onkeypress='return validarNro(event)'/></td></tr>";
	echo"<tr><th>Disponible:</th><td>Si<input type='radio' checked='true' name='disp' value='1'>No<input type='radio' name='disp' value='0'></td></tr>";?>
	<tr><td colspan='2'><center><input type='submit' value='Crear brigada'>   <input type='button' name='cancelar' value='Cancelar' onClick = "self.location.href='admin_brigadas.php'"></center></td>
	<?php
	echo"</table>";
}
/*
 * CONSTRUCTORES PARA ALTAS   ---FIN---
 */
 
 
 /*
  * CONSTRUCTORES PARA REPORTES   ---INICIO---
  */
function lista_docentes($docentes){
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Numero de Empleado</th>";
	echo "<th>Nombre</th>";
	echo "<th>Telefono</th>";
    echo "<th>E-mail</th>";
	echo "<th>Password</th>";
    echo "<th>Editar</th>";
    echo "<th>Eliminar</th>";
	echo "</tr>";
	foreach ($docentes as $key => $doc) {
	echo "<tr>";
	echo "<td>".$doc->num_empleado."</td>";
	echo "<td>".$doc->nombre."</td>";
	echo "<td>".$doc->telefono."</td>";
    echo "<td>".$doc->email."</td>";
	echo "<td>".$doc->pass."</td>";
	echo "<td><form action='../admin/admin_docentes_edit.php' method='POST'><input type='hidden' value='".$doc->num_empleado."' name='id'><input type='submit' value='Modificar'></form></td>";
	echo "<td><form action='../delete/del_docente.php' method='POST'><input type='hidden' value='".$doc->num_empleado."' name='id'><input type='submit' value='Eliminar'></form></td>";
	//echo "<td><a href='eliminar.php?id=5' onclick='javascript:return confirmar('¿Está seguro que desea eliminar el registro?')'>Eliminar</a></td>";
	echo"</tr>";
	}
}
function lista_alumnos($alumnos){
	echo "<table border=1>";	
	echo "<tr>";
	echo "<th>Matricula</th>";
	echo "<th>Nombre</th>";
	echo "<th>E-mail</th>";
    echo "<th>Brigada</th>";
    echo "<th>Plan</th>";
	echo "<th>Password</th>";
	echo "<th>Modificar</th>";
	echo "<th>Eliminar</th>";
	echo "</tr>";
	foreach ($alumnos as $key => $alum) {
	echo "<tr>";
	echo "<td>".$alum->matricula."</td>";
	echo "<td>".$alum->nombre."</td>";
	echo "<td>".$alum->email."</td>";
    echo "<td>".$alum->brigada."</td>";
    echo "<td>".$alum->plan."</td>";
	echo "<td>".$alum->pass."</td>";
	//echo "<td>"."<a href=../update/view/view.php?id=".$alum->matricula.">Editar</a></td> ";
	echo "<td><form name='modificar' action='../admin/admin_alumnos_edit.php' method='POST'><input type='hidden' value='".$alum->matricula."' name='id'><input type='submit' value='Modificar'></form></td>";
	echo "<td><form action='../delete/del_alumno.php' method='POST'><input type='hidden' value='".$alum->matricula."' name='id'><input type='submit' value='Eliminar'></form></td>";
	echo"</tr>";
}
	echo "</table>";
}
function lista_alumnos_reasig($alumnos, $practica){
	$brigada = "brigada".$practica;
	$status = "a".$practica;
	//$stat = "Pendiente";
	function status($status)
	{
		$stat;
		switch($status){
	case'0':
	$stat = "Falta";
		return $stat;
		break;
	case'1':
	$stat = "Retardo";
		return $stat;
		break;
	case'2':
	$stat = "Asistencia";
		return $stat;
		break;
	case '':
	$stat = "Pendiente";
		return $stat;
		break;
	}
	
	}
	echo "<table border=1>";	
	echo "<tr>";
	echo "<th>Matricula</th>";
	echo "<th>Nombre</th>";
	echo "<th>Clase Inscrita</th>";
    echo "<th>Status</th>";
    //echo "<th>Plan</th>";
	//echo "<th>Password</th>";
	//echo "<th>Modificar</th>";
	echo "<th>Reasignar Grupo</th>";
	echo "</tr>";
	foreach ($alumnos as $key => $alum) {
		$stat = status($alum->$status);
	echo "<tr>";
	echo "<td>".$alum->matricula."</td>";
	echo "<td>".$alum->nombre."</td>";
	echo "<td>".$alum->$brigada."</td>";
    echo "<td>".$stat."</td>";
    //echo "<td>".$alum->plan."</td>";
	//echo "<td>".$alum->pass."</td>";
	//echo "<td>"."<a href=../update/view/view.php?id=".$alum->matricula.">Editar</a></td> ";
	//echo "<td><form name='modificar' action='../admin/admin_alumnos_edit.php' method='POST'><input type='hidden' value='".$alum->matricula."' name='id'><input type='submit' value='Modificar'></form></td>";
	echo "<td><form action='docenteP_alumnos_reasig_reasig.php' method='POST'><input type='hidden' value='".$alum->matricula."' name='id'><input type='submit' value='Reasignar grupo'></form></td>";
	echo"</tr>";
}
	echo "</table>";
}
function lista_brigadas($brigadas){
		function check($disp){
		if($disp == 1){
			$res=  "<img src='../resources/yes.png'>";
		}
elseif($disp == 0){
	$res=  "<img src='../resources/no.png'>";
}
return $res;
	}
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Brigada</th>";
	echo "<th>Dia</th>";
	echo "<th>Hora</th>";
	echo "<th>Cupo</th>";
	echo "<th>Disponible</th>";
	echo "<th>Maestro Encargado</th>";
	echo "<th>Modificar</th>";
	echo "<th>Eliminar Brigada</th>";
	echo "</tr>";
	foreach ($brigadas as $key => $brig) {
	$disp=check($brig->disponibilidad);
	echo "<tr>";
	echo "<td>".$brig->idbrigadas."</td>";
	echo "<td>".$brig->dia."</td>";
	echo "<td>".$brig->hora."</td>";
	echo "<td>".$brig->cupo."</th>";
	echo "<td><center>".$disp."</center></td>";
	echo "<td>".$brig->nombre."</th>";
	echo "<td><form  action='admin_brigadas_edit.php' method='POST'><input type='hidden' value='".$brig->idbrigadas."' name='id'><input type='submit' value='Modificar'></form></td>";
	echo "<td><form action='../delete/del_brigada.php' method='POST'><input type='hidden' value='".$brig->idbrigadas."' name='id'><input type='submit' value='Eliminar'></form></td>";
	echo"</tr>";
}
	echo "</table>";
}
function lista_brigadas_reales($brigadas){
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Brigada</th>";
	echo "<th>Profesor Encargado</th>";
	echo "<th>Editar</th>";
	echo "<th>Eliminar</th>";
	echo "</tr>";
	foreach ($brigadas as $key => $brig) {
	echo "<tr>";
	echo "<td>".$brig->idbrigada_real."</td>";
	echo "<td>".$brig->nombre."</td>";
	echo "<td><form  action='../admin/admin_oficial_edit.php' method='POST'><input type='hidden' value='".$brig->idbrigada_real."' name='id'><input type='submit' value='Modificar'></form></td>";
	echo "<td><form  action='../delete/del_oficial.php' method='POST'><input type='hidden' value='".$brig->idbrigada_real."' name='id'><input type='submit' value='Eliminar'></form></td>";
	echo"</tr>";
}
	echo "</table>";
}
function practicas($practicas){
	$pr = select_admin();
	function selact($pr, $key){
			if($pr == ($key+1)){
			$res=  "<img src='../resources/yes.png'>";
				}
			elseif($pr != ($key+1)){
			$res=  "<img src='../resources/no.png'>";
	}
	return $res;
	}
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>No. de Practica</th>";
	echo "<th>Nombre</th>";
	echo "<th>Status</th>";
	echo "<th>Activar</th>";
	echo "</tr>";
	$i = 1;
	foreach ($practicas as $key => $prac) {
	$status = selact($pr->practica, $key);
	echo "<tr>";
	echo "<td>".$prac->idpracticas."</td>";
	echo "<td>".$prac->nombre."</td>";
	echo "<td>".$status."</td>";
	echo "<td><form  action='../update/activarPractica.php' method='POST'><input type='hidden' value='".$prac->idpracticas."' name='id'><input type='submit' value='Activar'></form></td>";
	echo"</tr>";
}
	echo "</table>";
}

function form_fliter_docente(){

echo "<form action='../admin/admin_docentes_search.php' method='post'>";
echo "</br></br>";
echo "<input type= 'text' id='info' name='info'>"; 
echo "<input type= 'submit'  value='BUSCAR' >"; 
echo "</br></br>";
echo "</form>";
        
}

function form_filter_alumno(){
	echo "<form action='../admin/admin_alumnos_search.php' method='post'>";
	echo "</br></br>";
	echo "<input type= 'text' id='info' name='info'>"; 
	echo "<input type= 'submit'  value='BUSCAR' >"; 
	echo "</br></br>";
	echo "</form>";
}
function form_filter_alumno_docente(){
	echo "<form action='../docente/docente_alumnos_search.php' method='post'>";
	echo "</br></br>";
	echo "Buscar alumno por matricula: <input type= 'text' id='info' name='info'>"; 
	echo "<input type= 'submit'  value='BUSCAR' >"; 
	echo "</br></br>";
	echo "</form>";
}
function form_filter_alumnoR_docenteP(){
	echo "<form action='../docenteP/docenteP_alumnos_reasig_search.php' method='post'>";
	echo "</br></br>";
	echo"<tr><th>Practica correspondiente:</th><td><select name='practica'>";
	for($h=1; $h<=9; $h++){
		switch ($h) {
			case "01": $practica = 1; break;
			case "02": $practica = 2; break;
			case "03": $practica = 3; break;
			case "04": $practica = 4; break;
			case "05": $practica = 5; break;
			case "06": $practica = 6; break;
			case "07": $practica = 7; break;
			case "08": $practica = 8; break;
			case "09": $practica = 9; break;		
		}
		echo "<option value='$practica'>$practica</option>";
	}
	
	echo "</select>";
	echo "</br></br>";
	echo "Matricula: <input type= 'text' id='info' name='info'>"; 
	echo "<input type= 'submit'  value='BUSCAR' >"; 
	echo "</br></br>";
	echo "</form>";
}
function form_filter_alumno_docenteP(){
	echo "<form action='../docenteP/docenteP_alumnos_search.php' method='post'>";
	echo "</br></br>";
	//echo "</br></br>";
	echo "Buscar alumno por Matricula: <input type= 'text' id='info' name='info'>"; 
	echo "<input type= 'submit'  value='BUSCAR' >"; 
	echo "</br></br>";
	echo "</form>";
}
function form_filter_brigada(){
	echo "<form action='../admin/admin_brigadas_search.php' method='post'>";
	echo "</br></br>";
	echo "<input type= 'text' id='info' name='info'>"; 
	echo "<input type= 'submit'  value='BUSCAR' >"; 
	echo "</br></br>";
	echo "</form>";
}
function form_filter_brigada_real(){
	echo "<form action='../admin/admin_oficial_search.php' method='post'>";
	echo "</br></br>";
	echo "<input type= 'text' id='info' name='info'>"; 
	echo "<input type= 'submit'  value='BUSCAR' >"; 
	echo "</br></br>";
	echo "</form>";
}
function form_filter_historial(){
	echo "<form action='../admin/admin_brigadas_historial_search.php' method='post'>";
	echo "<table>";
	echo"<tr><th>Practica realizada:</th><td><select name='practica'>";
	for($h=1; $h<=9; $h++){
		switch ($h) {
			case "01": $practica = 1; break;
			case "02": $practica = 2; break;
			case "03": $practica = 3; break;
			case "04": $practica = 4; break;
			case "05": $practica = 5; break;
			case "06": $practica = 6; break;
			case "07": $practica = 7; break;
			case "08": $practica = 8; break;
			case "09": $practica = 9; break;		
		}
		echo "<option value='$practica'>$practica</option>";
	}
	echo "</br></br>";
	echo "</br></br>";
	echo "<tr><th>Seleccione la fecha en la que se realizo la practica: </th><td><input type= 'date' id='fecha' name='fecha'></td></tr>"; 
	echo "<tr><td colspan='2'><center><input type= 'submit'  value='BUSCAR' ><center></td></tr>"; 
	echo "</br></br>";
	echo "</form>";
}
function form_filter_historialD(){
	echo "<form action='../docenteP/docenteP_brigadas_historial_search.php' method='post'>";
	echo "<table>";
	echo"<tr><th>Practica realizada:</th><td><select name='practica'>";
	for($h=1; $h<=9; $h++){
		switch ($h) {
			case "01": $practica = 1; break;
			case "02": $practica = 2; break;
			case "03": $practica = 3; break;
			case "04": $practica = 4; break;
			case "05": $practica = 5; break;
			case "06": $practica = 6; break;
			case "07": $practica = 7; break;
			case "08": $practica = 8; break;
			case "09": $practica = 9; break;		
		}
		echo "<option value='$practica'>$practica</option>";
	}
	echo "</br></br>";
	echo "</br></br>";
	echo "<tr><th>Seleccione la fecha en la que se realizo la practica: </th><td><input type= 'date' id='fecha' name='fecha'></td></tr>"; 
	echo "<tr><td colspan='2'><center><input type= 'submit'  value='BUSCAR' ><center></td></tr>"; 
	echo "</br></br>";
	echo "</form>";
}

function lista_historial($brigadas, $practica, $user){
	$fecha = "fecha".$practica;
	//print_r($brigadas);
	///array_unique($brigadas);
//	if (empty($brigadas))echo "vacio";
	//print_r($brigadas);
	function returnDOC($docente){
		foreach ($docente as $key => $value) {
			$doc =  "".$value->nombre."";
		}
		return $doc;
	}
	switch ($user->privilegios) {
		case '2':
			$dir = "admin_brigadas_lista_historial.php";
			break;
		case '3':
			$dir = "docenteP_brigadas_lista_historial.php";
	}
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Brigada</th>";
	echo "<th>Maestro</th>";
	echo "<th>Dia</th>";
	echo "<th>Hora</th>";
	echo "<th>Fecha</th>";
	echo "<th>Ver lista de asistencia</th>";
	echo "</tr>";
	foreach ($brigadas as $key => $brig) {
	//	$doc = returnDOC(maestro_historial($brig->empleado));
	echo "<tr>";
	echo "<td>".$brig->idbrigadas."</td>";
	echo "<td>".$brig->nombre."</td>";
	echo "<td>".$brig->dia."</td>";
	echo "<td>".$brig->hora."</td>";
	echo "<td>".$brig->$fecha."</td>";
	//echo "";
//	echo "";
	echo "<td>
		
		<form action='".$dir."' method='POST'>
			<input type='hidden' value='".$brig->idbrigadas."' name='brigada'>
			<input type='hidden' name = 'fecha' value=".$brig->$fecha.">
			<input type='hidden' name = 'practica' value=".$practica.">
			<input type='submit' value='Ver lista de asistencia'></form></td>";
	echo"</tr>";
}
	echo "</table>";
}
function lista_asistencia_historial($alumnos, $practica){
	$stat = "a".$practica;
	//print_r($alumnos);
	function asistencia($asistencia){
		switch ($asistencia) {
			case '0':
				$res = "<img src='../resources/no.png' title='Falta'>";
				return $res;
				break;
			case '1':
				$res = "<img src='../resources/cau.png' title='Retardo'>";
				return $res;
				break;
			case '2':
				$res = "<img src='../resources/yes.png' title='Asistencia'>";
				return $res;
				break;
		}
	}
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Matricula</th>";
	echo "<th>Nombre</th>";
	echo "<th>Status</th>";
	echo "</tr>";
	foreach ($alumnos as $key => $al) {
	$status = asistencia($al->$stat);
	echo "<tr>";
	echo "<td>".$al->matricula."</td>";
	echo "<td>".$al->nombre."</td>";
	echo "<td>".$status."</td>";
	echo"</tr>";
}
	echo "</table>";
}
//new_docente();
//new_alumno();
//new_brigada();
//new_brigada_real();


/*
 * FUNCIONES PARA DOCENTE   ---INICIO---
 */

function inicioDoc($docente){
	echo "<table>";
	echo "<tr><th>Numero de empleado:</th><td>".$docente->num_empleado."</td></tr>";
	echo "<tr><th>Docente:</th><td>".$docente->nombre."</td></tr>";
	echo "<tr><th>Telefono:</th><td>".$docente->telefono."</td></tr>";
	echo "<tr><th>E-mail:</th><td>".$docente->email."</td></tr>";
	echo "<tr><td colspan='2'><center><form action='docente_actualizar.php'><input type = 'submit' value = 'Actualizar mis datos'></center></td></tr>";
}
function inicioDocP($docente){
	echo "<table>";
	echo "<tr><th>Numero de empleado:</th><td>".$docente->num_empleado."</td></tr>";
	echo "<tr><th>Docente:</th><td>".$docente->nombre."</td></tr>";
	echo "<tr><th>Telefono:</th><td>".$docente->telefono."</td></tr>";
	echo "<tr><th>E-mail:</th><td>".$docente->email."</td></tr>";
	echo "<tr><td colspan='2'><center><form action='docenteP_actualizar.php'><input type = 'submit' value = 'Actualizar mis datos'></center></td></tr>";
}
function mis_brigadasV($brigadas){
	function check($disp){
		if($disp == 1){
			$res=  "<img src='../resources/yes.png'>";
		}
elseif($disp == 0){
	$res=  "<img src='../resources/no.png'>";
}
return $res;
	}
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Brigada</th>";
	echo "<th>Dia</ht>";
	echo "<th>Hora</ht>";
	echo "<th>Cupo</ht>";
	echo "<th>Disponibilidad</th>";
	echo "<th>Iniciar Clase</th></tr>";
	foreach ($brigadas as $key => $brig) {
		$disp=check($brig->disponibilidad);
		echo "<tr>";
		echo "<td>".$brig->idbrigadas."</td>";
		echo "<td>".$brig->dia."</td>";
		echo "<td>".$brig->hora."</td>";
		echo "<td>".$brig->cupo."</td>";
		echo "<td><center>".$disp."</center></td>";
		//echo "<td><form  action='../docente/docente_brigadas_edit.php' method='POST'><input type='hidden' value='".$brig->idbrigadas."' name='id'><input type='submit' value='Modificar'></form></td>";
		echo "<td><form  action='../docente/docente_clase.php' method='POST'><input type='hidden' value='".$brig->idbrigadas."' name='id'><input type='submit' value='Inicair clase'></form></td>";
		echo "</tr>";
	}
	echo "</table>";
}
function mis_brigadasVP($brigadas){
	function check($disp, $status){
		if($disp == 1 AND $status == 0){
			$res=  "<img src='../resources/yes.png'>";
		}elseif($disp == 1 AND $status == 1){
	$res=  "<img src='../resources/yes.png'>";
}
elseif($disp == 0 AND $status == 0){
	$res=  "<img src='../resources/no.png'>";
}elseif($disp == 0 AND $status == 1){
	$res=  "Clase Terminada";}
return $res;
	}
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Brigada</th>";
	echo "<th>Dia</ht>";
	echo "<th>Hora</ht>";
	echo "<th>Cupo</ht>";
	echo "<th>Disponibilidad</th>";
	echo "<th>Iniciar Clase</th></tr>";
	foreach ($brigadas as $key => $brig) {
		$disp=check($brig->disponibilidad, $brig->status);
		echo "<tr>";
		echo "<td>".$brig->idbrigadas."</td>";
		echo "<td>".$brig->dia."</td>";
		echo "<td>".$brig->hora."</td>";
		echo "<td>".$brig->cupo."</td>";
		echo "<td><center>".$disp."</center></td>";
		//echo "<td><form  action='../docente/docente_brigadas_edit.php' method='POST'><input type='hidden' value='".$brig->idbrigadas."' name='id'><input type='submit' value='Modificar'></form></td>";
		echo "<td><form  action='../docenteP/docenteP_clase.php' method='POST'><input type='hidden' value='".$brig->idbrigadas."' name='id'><input type='submit' value='Inicair clase'></form></td>";
		echo "</tr>";
	}
	echo "</table>";
}
function mis_brigadas_oficialesV($brigadas){
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Brigada</th>";
	echo "<th>Ver lista de alumnos</ht>";
	echo "</tr>";
	foreach ($brigadas as $key => $brig) {
		echo "<tr>";
		echo "<td>".$brig->idbrigada_real."</td>";
		echo "<td><form  action='../docente/docente_brigadas_oficiales_lista.php' method='POST'><input type='hidden' value='".$brig->idbrigada_real."' name='id'><input type='submit' value='Ver lista'></form></td>";
		echo "</tr>";
	}
	echo "</table>";
}
function mis_brigadas_oficialesVP($brigadas){
	echo "<table border=1>";
	echo "<tr>";
	echo "<th>Brigada</th>";
	echo "<th>Ver lista de alumnos</ht>";
	echo "</tr>";
	foreach ($brigadas as $key => $brig) {
		echo "<tr>";
		echo "<td>".$brig->idbrigada_real."</td>";
		echo "<td><form  action='../docenteP/docenteP_brigadas_oficiales_lista.php' method='POST'><input type='hidden' value='".$brig->idbrigada_real."' name='id'><input type='submit' value='Ver lista'></form></td>";
		echo "</tr>";
	}
	echo "</table>";
}
function lista_brigada_oficialV($alumno){
	echo "<table border=1>";	
	echo "<tr>";
	echo "<th>Matricula</th>";
	echo "<th>Nombre</th>";
	echo "<th>E-mail</th>";
    echo "<th>Brigada</th>";
    echo "<th>Plan</th>";
	echo "<th>Promedio</th>";
	echo "<th>Asignar calificaciones</th>";
	echo "</tr>";
	foreach ($alumno as $key => $alum) {
	echo "<tr>";
	echo "<td>".$alum->matricula."</td>";
	echo "<td>".$alum->nombre."</td>";
	echo "<td>".$alum->email."</td>";
    echo "<td>".$alum->brigada."</td>";
    echo "<td>".$alum->plan."</td>";
    echo "<td>".$alum->promedioF."</td>";
	echo "<td><form action='docente_calif.php' method='POST'><input type='hidden' value='".$alum->matricula."' name='id'><input type='submit' value='Calificar'></form></td>";
	echo"</tr>";
}
	echo "</table>";	
}
function lista_brigada_oficialVP($alumno){
	echo "<table border=1>";	
	echo "<tr>";
	echo "<th>Matricula</th>";
	echo "<th>Nombre</th>";
	echo "<th>E-mail</th>";
    echo "<th>Brigada</th>";
    echo "<th>Plan</th>";
	echo "<th>Promedio</th>";
	echo "<th>Asignar calificaciones</th>";
	echo "</tr>";
	foreach ($alumno as $key => $alum) {
	echo "<tr>";
	echo "<td>".$alum->matricula."</td>";
	echo "<td>".$alum->nombre."</td>";
	echo "<td>".$alum->email."</td>";
    echo "<td>".$alum->brigada."</td>";
    echo "<td>".$alum->plan."</td>";
    echo "<td>".$alum->promedioF."</td>";
	echo "<td><form action='docenteP_calif.php' method='POST'><input type='hidden' value='".$alum->matricula."' name='id'><input type='submit' value='Calificar'></form></td>";
	echo"</tr>";
}
	echo "</table>";	
}
function calificarV(){
	$calif = select_calif($_POST['id']);
	$asist = select_asistencias($_POST['id']);
	function count_asist($asistencias){
		$status = array("a","r","f");
		$status["a"]=0;
		$status["r"]=0;
		$status["f"]=0;
		foreach ($asistencias as $key => $asist) {
			switch ($asist) {
				case '0':
					//$f++;
					$status["f"]++;
					break;
				case '1':
					//$r++;
					$status["r"]++;
					break;
				case '2':
					//$a++;
					$status["a"]++;
					break;			
					}
					return $status;
		}}
	$status = count_asist($asist);
		
	echo "<table>";
	echo "<tr><th>Matricula:</th><td>".$calif->matricula."</td>";
	echo "<tr><th>Nombre:</th><td>".$calif->nombre."</td>";
	echo "<tr><th>Brigada:</th><td>".$calif->brigada."</td>";
	echo "<tr><th>Plan:</th><td>".$calif->plan."</td>";
	echo "<tr><th>Promedio Final:</th><td>".$calif->promedioF."</td>";
	echo "</table>";
	
	echo "<br />";	
	echo "<table id='asist'>";
	echo "<tr><th width: '300px'>Status de asistencia del alumno:</th><td></td>";
	echo "<tr ><th width: '300px'>Asistencias:</th><td width: '300px'>".$status['a']."</td>";
	echo "<tr><th width: '300px'>Retardos:</th><td>".$status['r']."</td>";
	echo "<tr><th width: '300px'>Faltas:</th><td>".$status['f']."</td>";
	echo "</table>";
	
	
	
	echo "<br />";
	echo "<table>";
	echo "<form action='../update/calificar.php' method='POST'>";
	echo "<tr><th>Practica #1:</th><td><input type='text' name='c1' value='".$calif->cal1."' maxlength='3' onkeypress='javascript:return validarNro(event)'</td></tr>";
	echo "<tr><th>Practica #2:</th><td><input type='text' name='c2' value='".$calif->cal2."' maxlength='3' onkeypress='javascript:return validarNro(event)'</td></tr>";
	echo "<tr><th>Practica #3:</th><td><input type='text' name='c3' value='".$calif->cal3."' maxlength='3' onkeypress='javascript:return validarNro(event)'</td></tr>";
	echo "<tr><th>Practica #4:</th><td><input type='text' name='c4' value='".$calif->cal4."' maxlength='3' onkeypress='javascript:return validarNro(event)'</td></tr>";
	echo "<tr><th>Practica #5:</th><td><input type='text' name='c5' value='".$calif->cal5."' maxlength='3' onkeypress='javascript:return validarNro(event)'</td></tr>";
	echo "<tr><th>Practica #6:</th><td><input type='text' name='c6' value='".$calif->cal6."'  maxlength='3' onkeypress='javascript:return validarNro(event)'</td></tr>";
	echo "<tr><th>Practica #7:</th><td><input type='text' name='c7' value='".$calif->cal7."' maxlength='3' onkeypress='javascript:return validarNro(event)'</td></tr>";
	echo "<tr><th>Practica #8:</th><td><input type='text' name='c8' value='".$calif->cal8."' maxlength='3' onkeypress='javascript:return validarNro(event)'</td></tr>";
	echo "<tr><th>Practica #9:</th><td><input type='text' name='c9' value='".$calif->cal9."' maxlength='3' onkeypress='javascript:return validarNro(event)'</td></tr>";
	echo "<input type='hidden' name ='alumno' value='".$calif->matricula."''>";?>
	
	<tr><td colspan='2'><center><input type='submit' value='Subir calificaciones'>   <input type='button' name='cancelar' value='Cancelar' onClick = "self.location.href='javascript:history.back(1)'"></center></td>
	<?php
	echo "</table>";
	
}
function lista($alumnos, $brigada){
	echo "<table>";
	echo "<tr>";
	echo "<th>Matricula</th>";
	echo "<th>Nombre</ht>";
	echo "<th>Status</th></tr>";
	foreach ($alumnos as $key => $al) {
		echo "<tr>";
		echo "<td>".$al->matricula."</td>";
		echo "<td>".$al->nombre."</td>";
		echo "<td><form name='status' action='../update/asistencia.php' method='POST'>Asistencia<input type='checkbox' value='2' name='id[]' onchange:'this.status.submit()' >Retardo<input type='checkbox' value='1' name='id[]' onclick'javascript:document.frm.submit()' >Falta<input type='checkbox' value='0' name='id[]' onclick'javascript:document.frm.submit()' ><input type='hidden' name='alumno[]' value='".$al->matricula."'></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "<br />";
	echo "<input type='hidden' name ='dia' value='".$brigada->dia."''>";
	echo "<input type='hidden' name ='hora' value='".$brigada->hora."''>";
	echo "<input type='hidden' name ='brigada' value='".$brigada->idbrigadas."''>";
	echo "<center><input type='submit' value='Capturar Asistencias'></form><center>";
}
/*
 * FUNCIONES PARA DOCENTE   ---FIN---
 */
 
 
 
/*
 * FUNCIONES PARA ALUMNO   ---INICIO---
 */
 function inicioaL($alumno){
	echo "<table>";
	echo "<tr><th>Matricula:</th><td>".$alumno->matricula."</td></tr>";
	echo "<tr><th>Docente:</th><td>".$alumno->nombre."</td></tr>";
	echo "<tr><th>E-mail:</th><td>".$alumno->email."</td></tr>";
	echo "<tr><th>Plan:</th><td>".$alumno->plan."</td></tr>";
	echo "<tr><th>Brigada Oficial:</th><td>".$alumno->brigada."</td></tr>";
	echo "<tr><td colspan='2'><center><form action='alumno_modif_email.php'><input type = 'submit' value = 'Cambiar E-mail'></center></td></tr>";
}
 function prox($brigada){
if (empty($brigada)){
	echo "<table>";
	echo "<br /><br /><h2>Proxima clase...</h2><br />";
	echo "<br /><br /><h2>No estas inscrito en alguna brigada para esta practica</h2><br />";
	echo "</table>";}
else{
 	echo "<table>";
	echo "<br /><br /><h2>Proxima clase...</h2><br />";
	echo "<tr><th width='100px'>Brigada:</th><td>".$brigada->idbrigadas."</td></tr>";
	echo "<tr><th>Dia:</th><td>".$brigada->dia."</td></tr>";
	echo "<tr><th>Hora:</th><td>".$brigada->hora."</td></tr>";
	echo "</table>";
 }}
function mis_calificaciones($alumn){
	$alumno = select_calif($alumn);
	echo "<table>";
	echo "<tr><th>Matricula:</th><td>".$alumno->matricula."</td>";
	echo "<tr><th>Nombre:</th><td>".$alumno->nombre."</td>";
	echo "<tr><th>Brigada:</th><td>".$alumno->brigada."</td>";
	echo "<tr><th>Plan:</th><td>".$alumno->plan."</td>";
	echo "<tr><th>Promedio Final:</th><td>".$alumno->promedioF."</td>";
	echo "</table>";
	echo "<br />";
	echo "<table>";
	echo "<form action='../update/calificar.php' method='POST'>";
	echo "<tr><th>Practica #1:</th><td>".$alumno->cal1."</td></tr>";
	echo "<tr><th>Practica #2:</th><td>".$alumno->cal2."</td></tr>";
	echo "<tr><th>Practica #3:</th><td>".$alumno->cal3."</td></tr>";
	echo "<tr><th>Practica #4:</th><td>".$alumno->cal4."</td></tr>";
	echo "<tr><th>Practica #5:</th><td>".$alumno->cal5."</td></tr>";
	echo "<tr><th>Practica #6:</th><td>".$alumno->cal6."</td></tr>";
	echo "<tr><th>Practica #7:</th><td>".$alumno->cal7."</td></tr>";
	echo "<tr><th>Practica #8:</th><td>".$alumno->cal8."</td></tr>";
	echo "<tr><th>Practica #9:</th><td>".$alumno->cal9."</td></tr>";
	echo "</table>";
}
function actualizar_email($alumno){
	echo "<table><form action='../update/alumno_uemail.php' method='POST'>";
	echo "<tr><th>Matricula:</th><td>".$alumno->matricula."</td></tr>";
	echo "<tr><th>Docente:</th><td>".$alumno->nombre."</td></tr>";
	echo "<tr><th>E-mail:</th><td><input type='text' name='uemail' value='".$alumno->email."'></td></tr>";
	echo "<input type='hidden' name ='alumno' value='".$alumno->matricula."''>";
	echo "<tr><th>Plan:</th><td>".$alumno->plan."</td></tr>";
	echo "<tr><th>Brigada Oficial:</th><td>".$alumno->brigada."</td></tr>";
	echo "<tr><td colspan='2'><center><input type = 'submit' value = 'Aceptar'></form></center></td></tr>";
}
function brigadas_disponibles_alumno($brigadas){
	echo "<table border=1>";
	echo "<form action='../action/alumno_inscribir.php' method='POST'>";
	echo "<tr>";
	echo "<th>Brigada</th>";
	echo "<th>Dia</th>";
	echo "<th>Hora</th>";
	echo "<th>Cupo</th>";
	echo "<th>Maestro Encargado</th>";
	echo "<th>Inscribir</th>";
	echo "</tr>";
	foreach ($brigadas as $key => $brig) {
	echo "<tr>";
	echo "<td>".$brig->idbrigadas."</td>";
	echo "<td>".$brig->dia."</td>";
	echo "<td>".$brig->hora."</td>";
	echo "<td>".$brig->cupo."</th>";
	echo "<td>".$brig->nombre."</th>";
	//echo "<td><form action='../delete/del_brigada.php' method='POST'><input type='hidden' value='".$brig->idbrigadas."' name='id'><input type='submit' value='Eliminar'></form></td>";
	echo "<td><input type='radio' value='".$brig->idbrigadas."' name='brig'><input type='hidden' name='alumno' value='".$brig->idbrigadas."'</td>";
	echo"</tr>";
}
	echo "</table>";
	echo "<br />";
	echo "<center><input type='submit' value='inscribir'></center>";
}
function brigadas_disponibles_reinscribir($brigadas, $alumno){
	//echo $alumno;
	echo "<table border=1>";
	echo "<form action='../action/reinscribir.php' method='POST'>";
	echo "<tr>";
	echo "<th>Brigada</th>";
	echo "<th>Dia</th>";
	echo "<th>Hora</th>";
	echo "<th>Cupo</th>";
	echo "<th>Maestro Encargado</th>";
	echo "<th>Inscribir</th>";
	echo "</tr>";
	foreach ($brigadas as $key => $brig) {
	echo "<tr>";
	echo "<td>".$brig->idbrigadas."</td>";
	echo "<td>".$brig->dia."</td>";
	echo "<td>".$brig->hora."</td>";
	echo "<td>".$brig->cupo."</th>";
	echo "<td>".$brig->nombre."</th>";
	
	//echo "<td><form action='../delete/del_brigada.php' method='POST'><input type='hidden' value='".$brig->idbrigadas."' name='id'><input type='submit' value='Eliminar'></form></td>";
	echo "<td><input type='radio' value='".$brig->idbrigadas."' name='brig'><input type='hidden' name='alumno' value='".$brig->idbrigadas."'</td>";
	echo"</tr>";
}
	echo "</table>";
	echo "<br />";
	echo "<input type='hidden' name='alumno' value= ".$alumno.">";
	echo "<center><input type='submit' value='inscribir'></center>";
}

function mis_practicas($practicas, $alumno){
	$pr = select_admin();
	$al = select_alumno($alumno);
	//print_r($al);
	function selact($pr, $key, $al){
			if($pr == ($key+1)){
				switch ($al->status){
					case 0:
						$res=  "<a href = 'alumno_inscribir.php'><center><img src='../resources/cau.png' title='Aun no estas inscrito en la practica'></center> </a>";
						return $res;
					break;
					case 1:
						$res=  "<center><img src='../resources/yes.png' title='Ya estas inscrito en la practica'></center>";
						return $res;
					break;
				}}
			/*	if($al->status == 0){
					//echo "Vacio";
					$res=  "<a href = 'alumno_inscribir.php'><img src='../resources/cau.png' title='Aun no estas inscrito en la practica'> </a>";
					return $res;
				}
				if(!emp){
					 $res=  "<img src='../resources/yes.png' title='Ya estas inscrito en la practica'>";
					return $res;
				}*/
elseif($pr != ($key+1)){
			$res=  "";
			return $res;
	}}

	echo "<table border=1>";
	echo "<tr>";
	echo "<th>No. de Practica</th>";
	echo "<th>Nombre</th>";
	echo "<th>Status</th>";
	//echo "<th>Activar</th>";
	echo "</tr>";
	$i = 1;
	foreach ($practicas as $key => $prac) {
	$status = selact($pr->practica, $key, $al);
	echo "<tr>";
	echo "<td>".$prac->idpracticas."</td>";
	echo "<td>".$prac->nombre."</td>";
	echo "<td>".$status."</td>";
	//  echo "<td><form  action='../update/activarPractica.php' method='POST'><input type='hidden' value='".$prac->idpracticas."' name='id'><input type='submit' value='Activar'></form></td>";
	echo"</tr>";
}
	echo "</table>";
}
 
 
/*
 * FUNCIONES PARA ALUMNO   ---FIN---
 */
?>
<!--
	SCRIPTS DE VALIDACION DE CAMPOS   ---INICIO---
-->
<script language="JavaScript">
function confirmar ( mensaje ) {
return confirm( mensaje );
} 
</script>



<script languaje="javascript">
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = [8,37,39,46];

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>
<!--SCRIPTs PARA MANEJO DE OPERACIONES -->
<script languaje ="javascript">
		function validarNro(e) {
		var key;
		if(window.event) // IE
		{
		key    = e.keyCode;
		}
		else if(e.which) // Netscape/Firefox/Opera
		{
		key    = e.which;
		}
		
		if (key < 48 || key > 57)
		{
		if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
		{ return true; }
		else 
		{ return false; }
		}
		return true;
		}
</script>


<!--
	SCRIPTS DE VALIDACION DE CAMPOS   ---FIN---
-->
