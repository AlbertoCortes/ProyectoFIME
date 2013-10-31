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
function insert_docente($num_empleado, $nombre, $pass, $telefono, $email){
	$sql = "INSERT INTO sflbf4.docente (num_empleado, nombre, pass, telefono, email, privilegios) 	
			VALUES('$num_empleado', '$nombre', '$pass', '$telefono', '$email', '1')";
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
		echo'<script type="text/javascript">alert("El alumno ha sido dado de alta correctamente");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
	}
}
function insert_brigada($brigada, $dia, $hora, $salon, $cupo, $disponibilidad, $encargado){
	$sql = "INSERT INTO sflbf4.brigadas (idbrigadas, dia, hora, salon, cupo, disponibilidad, docente_num_empleado) 
			VALUES('$brigada', '$dia', '$hora', '$salon', '$cupo', '$disponibilidad', '$encargado')";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("La brigada ha sido dado de alta correctamente");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
	}
}
function inser_bigada_real($brigada, $docente){
	$sql = "INSERT INTO sflbf4.brigada_real (idbrigada_real, docente_num_empleado) 
			VALUES('$brigada', '$docente')";
	$result = mysql_query($sql);
	if($result > 0){
		echo'<script type="text/javascript">alert("La brigada ha sido dado de alta correctamente");window.location.href="javascript:window.history.back()";</script>';
	}else{
		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
	}
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
	$sql = "SELECT brigadas.idbrigadas, brigadas.dia, brigadas.hora, brigadas.cupo, brigadas.disponibilidad, docente.nombre FROM docente INNER JOIN brigadas ON brigadas.docente_num_empleado = num_empleado ";
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
	$sql = "SELECT brigada_real.idbrigada_real, docente.nombre FROM docente INNER JOIN brigada_real ON brigada_real.docente_num_empleado = num_empleado ";
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
function buscar_alumnos_docente($arg, $docente){
	//$sql = "SELECT * FROM alumno WHERE matricula = '$arg' OR nombre = '$arg' OR email = '$arg' OR brigada = '$arg'";
	//$sql = "SELECT alumno.*, calificaciones.promedioF FROM calificaciones INNER JOIN alumno ON alumno.matricula = calificaciones.alumno_matricula WHERE ";
	$sql = "SELECT alumno.*, calificaciones.promedioF FROM calificaciones INNER JOIN alumno ON alumno.matricula = calificaciones.alumno_matricula WHERE 
 brigada = ANY(SELECT idbrigada_real FROM brigada_real WHERE brigada_real.docente_num_empleado =  '$docente') AND matricula = '$arg'";
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
	$sql = "SELECT brigadas.idbrigadas, brigadas.dia, brigadas.hora, brigadas.cupo, docente.nombre FROM docente INNER JOIN brigadas ON brigadas.docente_num_empleado = num_empleado WHERE 
	idbrigadas = '$arg' OR dia = '$arg' OR hora = '$arg' OR salon = '$arg' OR cupo = '$arg' OR docente_num_empleado = '$arg' OR docente.nombre = '$arg'
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
	$sql = "SELECT brigada_real.idbrigada_real, docente.nombre FROM docente INNER JOIN brigada_real ON brigada_real.docente_num_empleado = num_empleado WHERE
	idbrigada_real = '$arg' OR docente_num_empleado = '$arg' OR docente.nombre = '$arg'";
	$result = mysql_query($sql);
	$brigada = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$brigada[$i] = $row;
		$i++;	
	}
	return $brigada;
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
	$sql = "SELECT * FROM sflbf4.brigadas WHERE brigadas.docente_num_empleado = '$docente'";
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
	$sql = "SELECT * FROM sflbf4.brigada_real WHERE docente_num_empleado = '$docente'";
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
	$sql = "SELECT alumno.*, calificaciones.promedioF FROM calificaciones INNER JOIN alumno ON alumno.matricula = calificaciones.alumno_matricula WHERE 
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
function lista_brigada($brigada){
	$sql = "SELECT * FROM sflbf4.alumno  WHERE brigadaP = '$brigada'";
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
	$sql = "SELECT alumno.*, calificaciones.promedioF FROM calificaciones INNER JOIN alumno ON alumno.matricula = calificaciones.alumno_matricula WHERE 
	alumno.brigada = ANY (SELECT idbrigada_real FROM sflbf4.brigada_real where brigada_real.docente_num_empleado = '$docente')";
	
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
		$sql = "SELECT calificaciones.* , alumno.* FROM alumno INNER JOIN calificaciones ON calificaciones.alumno_matricula = matricula WHERE
	alumno_matricula = '$alumno' OR matricula = '$alumno'";
 	//$sql = "SELECT * FROM sflbf4.calificaciones, sflbf4.alumno WHERE alumno_matricula = '$alumno' , matricula = '$alumno'";
	$result = mysql_query($sql);
	$calif = null;
	while($row = mysql_fetch_object($result)){
		$calif = $row;
	}
	return $calif;
}
function update_calif($matricula, $datos){
	$total = 0;
	foreach ($datos as $key => $dato) {
		$total = $total	+ $dato;	
	}
	$prom = $total / 9;
	 $sql = "UPDATE sflbf4.calificaciones SET cal1='$datos[0]', cal2='$datos[1]', cal3='$datos[2]', cal4='$datos[3]', cal5='$datos[4]', cal6='$datos[5]',
	 cal7='$datos[6]', cal8='$datos[7]', cal9='$datos[8]', promedioF='$prom'  WHERE alumno_matricula = '$matricula'";
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
	$sql = "SELECT brigadas.*, docente.nombre FROM docente INNER JOIN brigadas ON brigadas.docente_num_empleado = docente.num_empleado WHERE brigadas.disponibilidad = '1'	";	
	$result = mysql_query($sql);
	$brigada = array();
	$i = 0;
	while ($row = mysql_fetch_object($result)){
		$brigada[$i] = $row;
		$i++;	
	}
	return $brigada;
}
 
 
 
 
/*
 * FUNCTIONES ALUMNO   ---FIN---
 */
?>