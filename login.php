<?php
	// Sessió
    session_start();

	// Llibreria utils
    include_once "utils.php";

    // Comprovo si el usuari està set o no
    if(!isset($_POST['usuari'])){
		alertJS("No hi ha usuari", "index.php");
       
    } else {
		// Comprovo que els camps no estiguin vuits
        if(empty($_POST['usuari'] && $_POST['contrassenya'])){
			// alert quan els camps estiguin vuits
			alertJS("Els camps estàn vuits", "index.php");
           
        } else {
			// Comprovo que l'usuari no sigui difernet que l'admin
            if($_POST['usuari']!="admin" && $_POST['contrassenya'] != "admin"){
				alertJS("Les dades no són correctes!", "index.php");
                
            } else {
                    $_SESSION['usuari'] = $_POST['usuari'];
                    header("location:index.php");
            }
        }
    }
    
?>