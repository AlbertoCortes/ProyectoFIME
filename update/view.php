<?php
require_once("../update/lib.php");
//require_once("../../lib/lib.php");
function modificar_docente(){
	$num_docente = seleccionar_docente($_POST['id']);
	echo"<table>";
	echo"<form name ='new_docente' action='../update/update_docente.php' method='POST' >";
	//echo"<tr><th>Numero de empleado:</th><td><input type='text' name='Noempleado' value='".$num_docente->num_empleado."' maxlength='7' onkeypress='javascript:return validarNro(event)'/></td></tr>"; 
	echo"<tr><th>Nombre:</th><td><input type='text' name='nombre' value='".$num_docente->nombre."' onkeypress='return soloLetras(event)'/></td></tr>";
	echo"<tr><th>Telefono:</th><td><input type='text' name='telefono' value='".$num_docente->telefono."' maxlength='10' onkeypress='javascript:return validarNro(event)'/></td></tr>";
	echo"<tr><th>Email:</th><td><input type='text' name='email' value='".$num_docente->email."'></td></tr>";
	echo "<input type='hidden' name ='docente' value='".$num_docente->num_empleado."''>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Actualizar Datos'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}
function modificar_mis_datos_docente($usuario){
	echo"<table>";
	echo"<form name ='new_docente' action='../update/update_docenteD.php' method='POST' >";
	echo"<tr><th>Nombre:</th><td><input type='text' name='nombre' readonly='readonly' value='".$usuario->nombre."' onkeypress='return soloLetras(event)'/></td></tr>";
	echo"<tr><th>Telefono:</th><td><input type='text' name='telefono' value='".$usuario->telefono."' maxlength='10' onkeypress='javascript:return validarNro(event)'/></td></tr>";
	echo"<tr><th>Email:</th><td><input type='text' name='email' value='".$usuario->email."'></td></tr>";
	echo "<input type='hidden' name ='docente' value='".$usuario->num_empleado."''>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Actualizar Datos'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}
function modificar_contra($usuario){
	echo"<table>";
	echo"<form name ='new_docente' action='../update/update_contraD.php' method='POST' >";
	echo"<tr><th>Password actual:</th><td><input type='text' name='c1' value=''></td></tr>";
	echo"<tr><th>Nuevo Password:</th><td><input type='text' name='c2' value=''></td></tr>";
	echo"<tr><th>Repita nuevo password:</th><td><input type='text' name='c3' value=''></td></tr>";
	echo "<input type='hidden' name ='docente' value='".$usuario->num_empleado."''>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Actualizar Password'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}
function modificar_contraAl($usuario){
	echo"<table>";
	echo"<form name ='new_docente' action='../update/update_contraAl.php' method='POST' >";
	echo"<tr><th>Password actual:</th><td><input type='text' name='c1' value=''></td></tr>";
	echo"<tr><th>Nuevo Password:</th><td><input type='text' name='c2' value=''></td></tr>";
	echo"<tr><th>Repita nuevo password:</th><td><input type='text' name='c3' value=''></td></tr>";
	echo "<input type='hidden' name ='alumno' value='".$usuario->matricula."''>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Actualizar Password'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}
function modificar_alumno(){
	$matricula = seleccionar_alumno($_POST['id']);
	echo"<table>";
	echo"<form name ='new_alumno' action='../update/update_alumno.php' method='POST' >";
	echo"<tr><th>Nombre:</th><td><input type='text' name='nombre' value='".$matricula->nombre."' onkeypress='return soloLetras(event)'/></td></tr>";
	echo "<tr><th>Brigada:</th><td>";
	echo "<select name='brigada'>";
	echo "<option value = '".$matricula->brigada."'>".$matricula->brigada."</option>";
		$pro = drop_brigada_real();
			foreach($pro as $key =>$prv){
				echo "<option value ='{$prv->idbrigada_real}'>{$prv->idbrigada_real}</option>";
					}
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo"<tr><th>Email:</th><td><input type='text' name='email' value='".$matricula->email."'></td></tr>";
	echo "<input type='hidden' name ='alumno' value='".$matricula->matricula."''>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Actualizar Datos'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}
function modificar_brigada_real(){
	$brigada = seleccionar_brigada($_POST['id']);
	$docente = select_docente($brigada->docente_num_empleado);
	echo "<table>";
	echo "<form name = 'new_brigada_real' action = '../update/update_brigada.php' method = 'POST'>";
	echo"<tr><th>Brigada Oficial:</th><td><input type='text' readonly='readonly' name='Nobrigada' maxlength='3' value='".$brigada->idbrigada_real."'/></td></tr>"; 
	echo "<tr><th>Maestro:</th><td>";
	echo "<select name='Maestro'>";
	echo "<option value = '".$docente->num_empleado."'>".$docente->nombre."</option>";
		$pro = drop_docentes();
			foreach($pro as $key =>$prv){
						echo "<option value ='{$prv->num_empleado}'>{$prv->nombre}</option>";}
	echo"</select>";
	echo"</td>";
	echo"</tr>";
	echo "<input type='hidden' name ='brigada' value='".$brigada->idbrigada_real."''>";
	echo"<tr><td colspan='2'><center><input type='submit' value='Actualizar'> <input type='button' name='cancelar' value='Cancelar' onClick = 'self.location.href='../main/adminIndex.php'></center></td>";
	echo"</table>";
}

function modificar_brigada(){
	$brigada = seleccionar_brigadaP($_POST['id']);
	echo"<table>";
	echo"<form name ='new_brigada' action='../update/update_brigadaP.php' method='POST'>";
	//echo"<tr><th>Numero de brigada:</th><td><input type='text' name='Nobrigada' maxlength='3' onkeypress='return validarNro(event)'/></td></tr>"; 
	//echo "<tr><th>Maestro:</th><td>";
	//echo "<select name='Maestro'>";
	//echo "<option value = '-1'></option>";
		//$pro = drop_docentes();
			//foreach($pro as $key =>$prv){
				//if ($prv->num_empleado == $prv->num_empleado){
					//	echo "<option value ='{$prv->num_empleado}' selected>{$prv->nombre}</option>";}
		//		else{
			//			echo "<option value ='{$prv->num_empleado}'>{$prv->nombre}</option>";}
				//	}// esto nos ayuda e elegir el proveedor... de manera automatizada
//	echo"</select>";
	//echo"</td>";
	//echo"</tr>";
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
	//echo"<tr><th>Salon:</th><td><input type='text' name='Salon' value='6204' /></td></tr>";
	echo"<tr><th>Cupo:</th><td><input type='text' name='NAlumnos' value='".$brigada->cupo."' maxlength='2' onkeypress='return validarNro(event)'/></td></tr>";
	echo"<tr><th>Disponible:</th><td>Si<input type='radio' checked='true' name='disp' value='1'>No<input type='radio' name='disp' value='0'></td></tr>";
	echo "<input type='hidden' name ='brigada' value='".$brigada->idbrigadas."''>";?>
	<tr><td colspan='2'><center><input type='submit' value='Aceptar'>   <input type='button' name='cancelar' value='Cancelar' onClick = "self.location.href='admin_brigadas.php'"></center></td>
	<?php
	echo"</table>";
}

//modificar_docente();
//modificar_alumno();
//modificar_brigada_real();
//modificar_docente();				
?>