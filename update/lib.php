<?php
require_once("../config.php");
function seleccionar_docente($num_empleado){
	$sql = "SELECT * FROM sflbf4.docente WHERE num_empleado = '$num_empleado'";
	$result = mysql_query($sql);
	$docente = null;
	while($row = mysql_fetch_object($result)){
		$docente = $row;
	}
	return $docente;
}
function select_docente($num_empleado){
	$sql = "SELECT * FROM sflbf4.docente WHERE num_empleado = '$num_empleado'";
	$result = mysql_query($sql);
	$docente = null;
	while($row = mysql_fetch_object($result)){
		$docente = $row;
	}
	return $docente;
}
function seleccionar_alumno($matricula){
	$sql = "SELECT * FROM sflbf4.alumno WHERE matricula = '$matricula'";
	$result = mysql_query($sql);
	$alumno = null;
	while($row = mysql_fetch_object($result)){
		$alumno = $row;
	}
	return $alumno;
}
function seleccionar_brigada($brigada){
	$sql = "SELECT * FROM sflbf4.brigada_real WHERE idbrigada_real = '$brigada'";
	$result = mysql_query($sql);
	$alumno = null;
	while($row = mysql_fetch_object($result)){
		$alumno = $row;
	}
	return $alumno;
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
function update_docente($num_empleado, $datos){
	 $sql = "UPDATE sflbf4.docente SET nombre='$datos[0]', telefono ='$datos[1]', email='$datos[2]' WHERE num_empleado = '$num_empleado'";
	 //echo "<br>".$sql;
$result= mysql_query($sql);
        if ($result >0){
                //echo "<script type='text/javascript'>alert('Se ha actualizado la informacion');</script>";  
				echo'<script type="text/javascript">alert("Se ha actualizado la informacion satisfactoriamente");window.location.href="../admin/admin_docentes.php";</script>';
				//header('Location: ../admin/admin_docentes.php');
        }
        else {
        		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
        }  
}
function update_docenteD($num_empleado, $datos){
	 $sql = "UPDATE sflbf4.docente SET nombre='$datos[0]', telefono ='$datos[1]', email='$datos[2]' WHERE num_empleado = '$num_empleado'";
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
function update_contraD($num_empleado, $datos){
		 $sql = "UPDATE sflbf4.docente SET pass='$datos[0]' WHERE num_empleado = '$num_empleado'";
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
function update_passAl($alumno, $newPass){
	 $sql = "UPDATE sflbf4.alumno SET pass='$newPass' WHERE matricula = '$alumno'";
	 //echo "<br>".$sql;
$result= mysql_query($sql);
        if ($result >0){
                //echo "<script type='text/javascript'>alert('Se ha actualizado la informacion');</script>";  
				echo'<script type="text/javascript">alert("Se ha actualizado la informacion satisfactoriamente");window.location.href="../alumno/alumno.php";</script>';
				//header('Location: ../admin/admin_docentes.php');
        }
        else {
        		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
        }  
}
function update_alumno($matricula, $datos){
	 $sql = "UPDATE sflbf4.alumno SET nombre='$datos[0]', email ='$datos[1]', brigada_real_idbrigada_real='$datos[2]' WHERE matricula = '$matricula'";
	// echo "<br>".$sql;
$result= mysql_query($sql);
        if ($result >0){
                //echo "Se ha ingresado la informacion exitosamente";
                echo'<script type="text/javascript">alert("Se ha actualizado la informacion satisfactoriamente");window.location.href="../admin/admin_alumnos.php";</script>';
                
        }
        else {
                //echo  "Existe una inconsistencia en informacion";
                		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
        
        }  
}
function update_alumno_email($alumno, $datos){
	 $sql = "UPDATE sflbf4.alumno SET email='$datos[0]' WHERE matricula = '$alumno'";
	// echo "<br>".$sql;
$result= mysql_query($sql);
        if ($result >0){
                //echo "Se ha ingresado la informacion exitosamente";
                echo'<script type="text/javascript">alert("Se ha actualizado la informacion satisfactoriamente, los cambios se veran reflejados una ves que inicies sesion nuevamente");window.location.href="../alumno/alumno.php";</script>';
                
        }
        else {
                //echo  "Existe una inconsistencia en informacion";
                		echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
        
        }  
}
function update_brigada($brigada, $datos){
	 $sql = "UPDATE sflbf4.brigada_real SET idbrigada_real='$datos[0]', docente_num_empleado ='$datos[1]' WHERE idbrigada_real = '$brigada'";
	// echo "<br>".$sql;
$result= mysql_query($sql);
        if ($result >0){
        	echo'<script type="text/javascript">alert("Se ha actualizado la informacion satisfactoriamente");window.location.href="../admin/admin_oficial.php";</script>';
			
        //        echo "Se ha ingresado la informacion exitosamente";
        }
        else {
        //        echo  "Existe una inconsistencia en informacion";
        	echo'<script type="text/javascript">alert("ERROR. Existe una inconsistencia en la informacion");window.location.href="javascript:window.history.back()";</script>';
        }  
}
function update_brigadaP($brigada, $datos){
	 $sql = "UPDATE sflbf4.brigadas SET dia = '$datos[0]', hora = '$datos[1]', cupo = '$datos[2]', disponibilidad = '$datos[3]' WHERE idbrigadas = '$brigada'";
	// echo "<br>".$sql;
$result= mysql_query($sql);
        if ($result >0){
        	echo'<script type="text/javascript">alert("Se ha actualizado la informacion satisfactoriamente");window.location.href="../admin/admin_brigadas.php";</script>';
                
        }
        else {
                echo  "Existe una inconsistencia en informacion";
        }  
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


?>