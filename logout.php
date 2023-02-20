<?php
	# Inicio la sessió
	session_start();

	# Elimina la sessió
	session_destroy(); 

?>

<!-- Poso un alert que mostri que ha sortit l'usuari i torni a la pàgina index -->
<script>
alert("-> Has sortit de la sessió!!");
	location.href='index.php';
</script>