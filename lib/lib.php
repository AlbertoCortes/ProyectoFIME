<?php
require_once("../config.php");
/*
 * VALIDACIONES PARA INSERTAR EN LA BASE DE DATOS ---INICIO---
 */
function valid_docente($empleado){
	$sql = "SELECT num_empleado FROM sflbf4.docente WHERE num_empleado = '$empleado' ";
	$result = mysql_query($sql);
	$existe = mysql_num_rows($result);
	if($existe > 0){
		echo'<script type="text/javascript">alert("ERROR. El docente ya existe");window.location.href="javascript:window.history.back()";</script>';
		die();
	}
}
function valid_alumno($matricula){
	$sql = "SELECT matricula FROM sflbf4.alumno WHERE matricula = '$matricula' ";
	$result = mysql_query($sql);
	$existe = mysql_num_rows($result);
	if($existe > 0){
		echo'<script type="text/javascript">alert("ERROR. El alumno ya esta inscrito");window.location.href="javascript:window.history.back()";</script>';
		die();
	}
}
function valid_brigada($brigada){
	$sql = "SELECT idbrigadas FROM brigadas WHERE idbrigadas = '$brigada' ";
	$result = mysql_query($sql);
	$existe = mysql_num_rows($result);
	if($existe > 0){
		echo'<script type="text/javascript">alert("ERROR. La brigada ya existe");window.location.href="javascript:window.history.back()";</script>';	
		die();
	}
}
function valid_hora($dia, $hora){
	$result = mysql_query("SELECT idbrigadas FROM sflbf4.brigadas WHERE dia = '$dia' AND hora = '$hora' ");
	$existe = mysql_num_rows($result);
	if($existe > 0){
		echo'<script type="text/javascript">alert("ERROR: El dia y la hora seleccionada ya esta ocupada por otra birgada");window.location.href="javascript:window.history.back()";</script>';
		die();
	}
}
function valid_brigada_real($brigada){
	$sql = "SELECT * FROM sflbf4.brigada_real WHERE idbrigada_real = '$brigada'";
	$result = mysql_query($sql);
	$existe = mysql_num_rows($result);
	if($existe > 0){
		echo'<script type="text/javascript">alert("ERROR: La brigada ya existe");window.location.href="javascript:window.history.back()";</script>';
		die();
	}
}
/*
 * VALIDACIONES PARA INSERTAR EN LA BASE DE DATOS ---FIN---
 */

 
 /*
  * INSERCIONES EN BASE DE DATOS  ---INICIO---
  */
function insert_docente($num_empleado, $nombre, $pass, $telefono, $email, $permisos){
	$sql = "INSERT INTO sflbf4.docente (num_empleado, nombre, pass, telefono, email, privilegios) 	
			VALUES('$num_empleado', '$nombre', '$pass', '$telefono', '$email', '$permisos')";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("El docente ha sido dado de alta correctamente");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
	}
}
function insert_alumno($matricula, $nombre, $plan, $pass, $email, $brigada_real){
	$sql = "INSERT INTO sflbf4.alumno (matricula, nombre, plan, pass, email, privilegios, brigada, brigadaP) 
			VALUES('$matricula', '$nombre', '$plan', '$pass', '$email', '0', '$brigada_real', NULL)";
	$result = mysql_query($sql);
	if($result > 0){
		insert_asistencia($matricula);
		insert_calificacion($matricula);
		echo'<script type="text/javascript">alert("El alumno ha sido dado de alta correctamente");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
	}
}
function insert_asistencia($matricula){
	$sql = "INSERT INTO sflbf4.asistencia (matricula) 
			VALUES('$matricula')";
	$result = mysql_query($sql);
}
function insert_calificacion($matricula){
	$sql = "INSERT INTO sflbf4.calificaciones (matricula) 
			VALUES('$matricula')";
	$result = mysql_query($sql);
}
function insert_brigada($brigada, $dia, $hora, $salon, $cupo, $disponibilidad, $encargado){
	$sql = "INSERT INTO sflbf4.brigadas (idbrigadas, dia, hora, salon, cupo, disponibilidad, empleado) 
			VALUES('$brigada', '$dia', '$hora', '$salon', '$cupo', '$disponibilidad', '$encargado')";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("La brigada ha sido dado de alta correctamente");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
	}
}
function insert_brigada2($brigada, $docente){
	$sql = "INSERT INTO sflbf4.brigadas (idbrigadas,disponibilidad, empleado) 
			VALUES('$brigada','0', '$docente')";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("La brigada ha sido dado de alta correctamente");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
	}
}
function inser_bigada_real($brigada, $docente){
	$sql = "INSERT INTO sflbf4.brigada_real (idbrigada_real, empleado) 
			VALUES('$brigada', '$docente')";
	$result = mysql_query($sql);
	if($result > 0){
		//echo'<script type="text/javascript">alert("La brigada ha sido dado de alta correctamente");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
	}
}
function select_admin(){
	$sql = "SELECT practica FROM administrador LIMIT 1";
	$result = mysql_query($sql);
	$admin = null;
	while($row = mysql_fetch_object($result)){
		$admin = $row;
	}
	return $admin;
}
function select_alumno($alumno){
	$sql = "SELECT status FROM alumno WHERE matricula = '$alumno'";
	$result = mysql_query($sql);
	$alumno = null;
	//echo $result;
while($row = mysql_fetch_object($result)){
		$alumno = $row;
}
	return $alumno;
}

/*
 * INSERCIONES EN BASE DE DATOS   ---FIN---
 */
 
 
 /*
  * LISTAS DE TABLAS   ---INICIO---
  */
function listar_docentes(){
	$sql = "SELECT * FROM sflbf4.docente";
	$result = mysql_query($sql);
	$docente = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$docente[$i] = $row;
		$i++;
	}
	return $docente;
}
function listar_practicasL(){
	$sql = "SELECT * FROM sflbf4.practicas";
	$result = mysql_query($sql);
	$practicas = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$practicas[$i] = $row;
		$i++;
	}
	return $practicas;
}
function listar_alumnos(){
	$sql = "SELECT * FROM sflbf4.alumno";
	$result = mysql_query($sql) ;
	$alumno = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$alumno[$i] = $row;
		$i++;
	}
	return $alumno;
}
function listar_brigadas(){
	//$sql = "SELECT * FROM sflbf4.brigadas";
	$sql = "SELECT brigadas.idbrigadas, brigadas.dia, brigadas.hora, brigadas.cupo, brigadas.disponibilidad, docente.nombre FROM docente INNER JOIN brigadas ON brigadas.empleado = num_empleado ";
	$result = mysql_query($sql) ;
	$brigada = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$brigada[$i] = $row;
		$i++;
	}
	return $brigada;
}
function listar_brigadas_oficiales(){
	$sql = "SELECT brigada_real.idbrigada_real, docente.nombre FROM docente INNER JOIN brigada_real ON brigada_real.empleado = num_empleado ";
	$result = mysql_query($sql) ;
	$brigada = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$brigada[$i] = $row;
		$i++;
	}
	return $brigada;
}
/*
 * LISTAS DE TABLAS   ---FIN---
 */
 
 

/*
 * BUSQUEDAS DE ADMINISTRADOR   ---INICIO--- 
 */
function buscar_docentes($arg){
	//$sql = "SELECT * FROM docente WHERE num_empleado LIKE '%$arg' OR nombre LIKE '%$arg' OR telefono LIKE '%$arg' OR email LIKE '%$arg'";
	$sql = "SELECT * FROM docente WHERE num_empleado = '$arg' OR nombre = '$arg' OR telefono = '$arg' OR email = '$arg'";
	$result = mysql_query($sql);
	$docente = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$docente[$i] = $row;
		$i++;	
	}
	return $docente;
}
function buscar_alumnos($arg){
	$sql = "SELECT * FROM alumno WHERE matricula = '$arg' OR nombre = '$arg' OR email = '$arg' OR brigada = '$arg'";
	$result = mysql_query($sql);
	$alumno = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$alumno[$i] = $row;
		$i++;	
	}
	return $alumno;
}
function buscar_alumnos_reasig($arg, $practica){
	$brigada = "brigada".$practica;
	$status = "a".$practica;
	$sql = "SELECT alumno.matricula, alumno.nombre, asistencia.".$brigada.", asistencia.".$status." FROM asistencia INNER JOIN alumno ON alumno.matricula = asistencia.matricula WHERE alumno.matricula = '$arg' OR nombre = '$arg'";
	//echo $sql;
	$result = mysql_query($sql);
	$alumno = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$alumno[$i] = $row;
		$i++;	
	}
	return $alumno;
}
function buscar_alumnos_docente($arg, $docente){
	//$sql = "SELECT * FROM alumno WHERE matricula = '$arg' OR nombre = '$arg' OR email = '$arg' OR brigada = '$arg'";
	//$sql = "SELECT alumno.*, calificaciones.promedioF FROM calificaciones INNER JOIN alumno ON alumno.matricula = calificaciones.alumno_matricula WHERE ";
	$sql = "SELECT alumno.*, calificaciones.promedioF FROM calificaciones INNER JOIN alumno ON alumno.matricula = calificaciones.matricula WHERE 
 brigada = ANY(SELECT idbrigada_real FROM brigada_real WHERE brigada_real.empleado =  '$docente') AND alumno.matricula = '$arg'";
	$result = mysql_query($sql);
	//echo $sql;
	$alumno = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$alumno[$i] = $row;
		$i++;	
	}
	return $alumno;
}
function buscar_brigadas($arg){
	//$sql = "SELECT * FROM brigadas WHERE idbrigadas = '$arg' OR dia = '$arg' OR hora = '$arg' OR salon = '$arg' OR cupo = '$arg' OR docente_num_empleado = '$arg'";
	$sql = "SELECT brigadas.idbrigadas, brigadas.dia, brigadas.hora, brigadas.cupo, brigadas.disponibilidad, docente.nombre FROM docente INNER JOIN brigadas ON brigadas.empleado = num_empleado WHERE 
	idbrigadas = '$arg' OR dia = '$arg' OR hora = '$arg' OR salon = '$arg' OR cupo = '$arg' OR empleado = '$arg' OR docente.nombre = '$arg'
	ORDER BY idbrigadas DESC";
	$result = mysql_query($sql);
	$brigada = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$brigada[$i] = $row;
		$i++;	
	}
	return $brigada;
}
function buscar_brigadas_reales($arg){
	//$sql = "SELECT * FROM brigadas WHERE idbrigadas = '$arg' OR dia = '$arg' OR hora = '$arg' OR salon = '$arg' OR cupo = '$arg' OR docente_num_empleado = '$arg'";
	$sql = "SELECT brigada_real.idbrigada_real, docente.nombre FROM docente INNER JOIN brigada_real ON brigada_real.empleado = num_empleado WHERE
	idbrigada_real = '$arg' OR empleado = '$arg' OR docente.nombre = '$arg'";
	$result = mysql_query($sql);
	$brigada = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$brigada[$i] = $row;
		$i++;	
	}
	return $brigada;
}
function buscar_brigadas_historial($fecha, $practica){
	$brigada="brigada".$practica;
	$dia="dia".$practica;
	$hora="hora".$practica;
	$fecha1="fecha".$practica;
	$maestro="maestro".$practica;
	$prac="a".$practica;
	
	/*$sql = "SELECT asistencia.".$brigada.", asistencia.".$dia.", asistencia.".$hora.", asistencia.".$fecha1.", asistencia.".$maestro.", docente.nombre FROM docente 
	INNER JOIN asistencia ON asistencia.".$maestro." = 'num_empleado' WHERE
	".$fecha1." = '$fecha' ";*/
	$sql = "SELECT Distinct asistencia.".$brigada.", asistencia.".$fecha1.", brigadas.*, docente.* FROM brigadas INNER JOIN asistencia ON ".$brigada." = idbrigadas 
			INNER JOIN docente ON asistencia.".$maestro." = docente.num_empleado 
			WHERE ".$fecha1." = '$fecha'";
	//echo $sql;
	$result = mysql_query($sql);
	$brigada = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$brigada[$i] = $row;
		$i++;	
	}
	//$brigadas = array_values($brigada);
	//$brigadas = array_unique($brigadas);
	return $brigada;
}
function maestro_historial($docente){
	$sql = "SELECT nombre FROM  docente WHERE num_empleado='$docente'";
	$result = mysql_query($sql);
	$docente = null;
	while($row = mysql_fetch_object($result)){
		$docente = $row;
	}
	return $docente;
}




function listar_brigadas_historial($fecha, $practica, $brigada){
	$prac = "a".$practica;
	$brig = "brigada".$practica;
	$fec = "fecha".$practica;
	$sql = "SELECT asistencia.matricula, asistencia.".$prac.", alumno.nombre FROM alumno INNER JOIN asistencia ON asistencia.matricula = alumno.matricula
	WHERE ".$brig." = '$brigada' AND ".$fec." = '$fecha' ";
	//echo $sql;
	$result = mysql_query($sql);
	$alumnos = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$alumnos[$i] = $row;
		$i++;	
	}
	//$brigadas = array_values($brigada);
	//$brigadas = array_unique($brigadas);
	return $alumnos;
}
/*
 * BUSQUEDAS DE ADMINISTRADOR   ---FIN--- 
 */
 
 
 
/*
 * DROPS PARA FORMULARIOS   ---INICIO---
 */
 function drop_docentes(){
	$sql= "SELECT num_empleado, nombre
	FROM  docente " ;
	 	$docentes= array();
		$result= mysql_query($sql);
		$i= 0;
		while ($row=mysql_fetch_object($result)){
			$docentes[$i]= $row;
			$i++;
		}	
		return $docentes;
}
function drop_brigada_real(){
	$sql= "SELECT idbrigada_real FROM  brigada_real " ;
	 	$brigadas= array();
		$result= mysql_query($sql);
		$i= 0;
		while ($row=mysql_fetch_object($result)){
			$brigadas[$i]= $row;
			$i++;
		}	
		return $brigadas;
}
/*
 * DROPS PARA FORMULARIOS   ---FIN---
 */
 
 
/*
 * FUNCIONES PARA DOCENTE   ---INICIO---
*/
function mis_brigadas($docente){
	$sql = "SELECT * FROM sflbf4.brigadas WHERE brigadas.empleado = '$docente'";
	//echo $sql;
	$result = mysql_query($sql);
	$mis_brigadas = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$mis_brigadas[$i] = $row;
		$i ++;
	}
	return $mis_brigadas;
}
function mis_brigadas_oficiales($docente){
	$sql = "SELECT * FROM sflbf4.brigada_real WHERE empleado = '$docente'";
	$result = mysql_query($sql);
	$mis_brigadas = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$mis_brigadas[$i] = $row;
		$i++;
	}
	return $mis_brigadas;
}
function lista_brigada_oficial($brigada){
	//$sql = "SELECT * FROM sflbf4.alumno  WHERE brigada = '$brigada'";
	$sql = "SELECT alumno.*, calificaciones.promedioF FROM calificaciones INNER JOIN alumno ON alumno.matricula = calificaciones.matricula WHERE 
	alumno.brigada = '$brigada'";
	$result = mysql_query($sql);
	$alumnos = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$alumnos[$i] = $row;
		$i ++;
	}
	return $alumnos;
}
function seleccionar_brigadaP($brigada){
	$sql = "SELECT * FROM sflbf4.brigadas WHERE idbrigadas = '$brigada'";
	$result = mysql_query($sql);
	$brigada = null;
	while($row = mysql_fetch_object($result)){
		$brigada = $row;
	}
	return $brigada;
}
function lista_brigada($brigada){
	$sql = "SELECT alumno.*, brigadas.* FROM sflbf4.brigadas INNER JOIN sflbf4.alumno ON alumno.brigadaP = brigadas.idbrigadas  WHERE brigadaP = '$brigada'";
	$result = mysql_query($sql);
	$alumnos = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$alumnos[$i] = $row;
		$i ++;
	}
	return $alumnos;
}
function lista_alumnosD($docente){
	//$sql = "SELECT * FROM sflbf4.alumno WHERE alumno.brigada = ANY (SELECT idbrigada_real FROM sflbf4.brigada_real where brigada_real.docente_num_empleado = '$docente')";
	$sql = "SELECT alumno.*, calificaciones.promedioF FROM calificaciones INNER JOIN alumno ON alumno.matricula = calificaciones.matricula WHERE 
	alumno.brigada = ANY (SELECT idbrigada_real FROM sflbf4.brigada_real where brigada_real.empleado = '$docente')";
	
	$result = mysql_query($sql);
	$alumnos = array();
	$i = 0;
	while($row = mysql_fetch_object($result)){
		$alumnos[$i] = $row;
		$i ++;
	}
	return $alumnos;	
}
function select_calif($alumno){
		$sql = "SELECT calificaciones.* , alumno.* FROM alumno INNER JOIN calificaciones ON calificaciones.matricula = alumno.matricula WHERE
	calificaciones.matricula = '$alumno' ";
	//echo $sql;
 	//$sql = "SELECT * FROM sflbf4.calificaciones, sflbf4.alumno WHERE alumno_matricula = '$alumno' , matricula = '$alumno'";
	$result = mysql_query($sql);
	$calif = null;
	while($row = mysql_fetch_object($result)){
		$calif = $row;
	}
	return $calif;
}
function select_asistencias($alumno){
	$sql = "SELECT a1, a2, a3, a4, a5, a6, a7, a8, a9 FROM asistencia WHERE matricula = '$alumno'";
	$result = mysql_query($sql);
	$asist = null;
	while($row = mysql_fetch_object($result)){
		$asist = $row;
	}
	return $asist;
}
function update_calif($matricula, $datos){
	$total = 0;
	foreach ($datos as $key => $dato) {
		$total = $total	+ $dato;	
	}
	$prom = $total / 9;
	 $sql = "UPDATE sflbf4.calificaciones SET cal1='$datos[0]', cal2='$datos[1]', cal3='$datos[2]', cal4='$datos[3]', cal5='$datos[4]', cal6='$datos[5]',
	 cal7='$datos[6]', cal8='$datos[7]', cal9='$datos[8]', promedioF='$prom'  WHERE matricula = '$matricula'";
	 //echo "<br>".$sql;
$result= mysql_query($sql);
        if ($result >0){
                //echo "<script type='text/javascript'>alert('Se ha actualizado la informacion');</script>";  
				echo'<script type="text/javascript">alert("Se ha actualizado la informacion satisfactoriamente");window.location.href="javascript:window.history.back()";</script>';
				//header('Location: ../admin/admin_docentes.php');
        }
        else {
        		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
        }  
}
function activar_brigada($brigada){
	
}


/*
 * FUNCIONES ALUMNO   ---INICIO---
 */
function listar_brigadas_disponibles(){
	$sql = "SELECT brigadas.*, docente.nombre FROM docente INNER JOIN brigadas ON brigadas.empleado = docente.num_empleado WHERE brigadas.disponibilidad = '1'	";	
	$result = mysql_query($sql);
	$brigada = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$brigada[$i] = $row;
		$i++;	
	}
	return $brigada;
}
function select_alumnoB($alumno){
	$sql = "SELECT brigadaP FROM alumno WHERE matricula = '$alumno'";
	//echo $sql;
	$result = mysql_query($sql);
	$alumno = null;
	//echo $result;
while($row = mysql_fetch_object($result)){
		$alumno = $row;
}
	return $alumno;
}
function select_brigada($alumno){
	$brigada;
	foreach ($alumno as $key => $value) {
		$brigada = $value;
	}
	$sql = "SELECT * FROM sflbf4.brigadas WHERE idbrigadas = '$brigada'";
	//echo $sql;
	$result = mysql_query($sql);
	$brigada = null;
	//echo $result;
while($row = mysql_fetch_object($result)){
		$brigada = $row;
}
	return $brigada;
}
 
 
 
/*
 * FUNCTIONES ALUMNO   ---FIN---
 */
?>