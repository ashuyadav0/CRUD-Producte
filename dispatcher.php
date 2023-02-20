<?php
    # Controlador
    # Punt d'entrada de l'aplicació
    # Inclou fitxer de configuració i utilitats
    include_once 'configBD.php';
    include_once 'utilsBD.php';
    include_once 'utils.php';
    
    #Operació per defecte
    $operacio = "llistatProductes";

    #Comprova si s'envia alguna operació
    if (isset($_REQUEST['operacio'])){
        $operacio = $_REQUEST['operacio'];
    }
    
    try {
        # Crea la connexió
        connectarBD();
        
        switch ($operacio){
			# Mostra el llistatProducte
            case "llistatProductes":
                # Obté el llistat
                $produc = llistatProductes();
        
                # Crida a la vista que mostra el llistat
                require_once './llistatProducte.php';
                break;
            
			# Afegiex +1 a stock
			case "suma": 
				# Obté id del producte
				$id = $_REQUEST['id'];
				# Augmenta les stocks amb 1
				canviarStock($id, 1);
				# Missatge OK per a llistat
				$_SESSION['missatge'] = "S'ha augmentat 1 stock!!";
				# Tornar a mostrar el llistat
				header("location: ./");
				break;
				
			# Resta -1 a stock
			case "resta":
				 # Obté id del producte
				$id = $_REQUEST['id'];
				
				if(numStock($id)==0){
					alertJS("No es pot restar més el stock!", "./");
				} else {
				# Augmenta les tones amb 1
				canviarStock($id, -1);
				# Missatge OK per a llistat
				$_SESSION['missatge'] = "S'ha restat 1 stock!!";
				# Tornar a mostrar el llistat
				header("location: ./");
				}
				break;
				
			# Mostra les dades
			case "dadesProducte":
				if(!isset($_REQUEST['id'])){
					
					# Mostri l'error quan no hagi cap id a la sessió
					alertJS("No hi ha producte!", "index.php");

				} else {
					$idProducte = $_REQUEST['id'];

					$resultat = dadesProducte($idProducte);

					require_once './dadesProducte.php';
				}
				break;
			
			# Eliminar Producte	
			case "eliminarProducte":
				if($_REQUEST['id']){
			
					$idProducte = $_REQUEST['id'];

					# Elimino alumno de la BD
					eliminarProducte($idProducte);
					
					 # Guardem missatge
                    $_SESSION['missatge'] = 'Producte eliminat correctament!';
					
					# Tornar a mostrar el llistat
					header("location: ./");
					
				} else {
					#No hay alumno en la petición
					alertJS("No hi ha producte!", "./");                  
				}
				break;
			
			# Afegir un nou Producte	
			case "nouProducte":
				if($_POST['nom'] && $_POST['preu']){
					$nom = getFormValue('nom');
					$descripcio = getFormValue('descripcio');
					$stock = getFormValue('stock');
					$preu = getFormValue('preu');
				}
				$resultat = nouProducte($nom, $descripcio, $stock, $preu);
				header("location: ./");
				$_SESSION['missatge'] = 'Producte afegit correctament!';
				break;
			
			# Editar Producte	
			case "editarProducte":
				# Llamar a la pagina que muestra los datos
				if(!isset($_REQUEST['id'])){

					#No hay producte en la petición
					alertJS("No hi ha producte!!", "./");

				} else {

					# Hay alumno
					$idProducte = $_REQUEST['id'];

					# Consultar datos alumno
					$resultat = dadesProducte($idProducte);

					require_once 'modificarProducte.php';
				}
				break;
				
			# Modificar Producte	
			case "modificarProducte":
				if( isset($_POST['nom']) && isset($_POST['preu']) ){    
                    
					$id = $_REQUEST['id'];
					$nom = getFormValue('nom');
					$descripcio = getFormValue('descripcio');
					$stock = getFormValue('stock');
					$preu = getFormValue('preu');

					}
					$resultat = modificarProducte($id, $nom, $descripcio, $stock, $preu);

					# Missatge
					$_SESSION['missatge'] = 'Producte '.$nom.' editat correctament!<br>';
					
					header("location: ./");
				
				break;
			
			# Per fer la busqueda de producte	
			case "busqueda":
				if(isset($_REQUEST['busqueda'])){
			   	$busqueda = $_REQUEST['busqueda'];
				}
				$produc = busqueda($busqueda);
				
				require_once "llistatProducte.php";
				break;
			
			# Desordenar Producte
			case "ordenar":
    			if(isset($_REQUEST['col'])){
        
                $col = $_REQUEST['col'];
				}
				$produc = ordenar($col);
		
					
				# Tornar a mostrar el llistat
				include_once 'llistatProducte.php';
				break;

			# Ordenar Producte	
			case "desordenar":
				if(isset($_REQUEST['col'])){
        
                $col = $_REQUEST['col'];
				}
				$produc = desordenar($col);
				# Guardem missatge
					
				# Tornar a mostrar el llistat
				include_once 'llistatProducte.php';
				break;
			
			# Tanca la sessió
			case "logout":
				header("location:logout.php");
				break;
			
            
			# Erorr quan les operacions no son certes	
            default:
                # Operació no vàlida
                alertJS("Operació no vàlida", "index.php");
        }
        
        
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }

?>