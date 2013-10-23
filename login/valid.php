<?php
	if (empty($_SESSION['usuario'])) {
		echo'<script type="text/javascript">alert("ERROR: No tienes autorizacion para estar en esta pagina");window.location.href="javascript:window.history.back()";</script>'; 
	die();
}
?>