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
function calificarV(){
	$calif = select_calif($_POST['id']);
	echo "<table>";
	echo "<tr><th>Matricula:</th><td>".$calif->matricula."</td>";
	echo "<tr><th>Nombre:</th><td>".$calif->nombre."</td>";
	echo "<tr><th>Brigada:</th><td>".$calif->brigada."</td>";
	echo "<tr><th>Plan:</th><td>".$calif->plan."</td>";
	echo "<tr><th>Promedio Final:</th><td>".$calif->promedioF."</td>";
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
	echo "<input type='hidden' name ='alumno' value='".$calif->alumno_matricula."''>";?>
	
	<tr><td colspan='2'><center><input type='submit' value='Subir calificaciones'>   <input type='button' name='cancelar' value='Cancelar' onClick = "self.location.href='javascript:history.back(1)'"></center></td>
	<?php
	echo "</table>";
	
}
function lista($alumnos){
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
