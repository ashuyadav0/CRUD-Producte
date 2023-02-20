<?php

# Crea la variable global que representa la connexió
# Inicialment a null per indicar que no hi ha connexió
$conn = null;

# Funció que crea una connexió amb la BD
function connectarBD(){
    
    global $conn;
    
    try{
        # Crea una connexió amb la BD i la guarda a la variable $con.
        # Tècnicament: crea un objecte de la classe PDO
        $conn = new PDO(DSN, USER_NAME, PASSWORD);

        # Opció de la connexió que si hi ha algun error a l'excutar alguna sentència SQL, 
        # PDO llença una PDOException amb el missatge de l'error que s'ha produït.    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
    } catch (PDOException $e) {
        throw new Exception("Error al crear la BD: ". $e->getMessage());
    }
}


	function llistatProductes(){

		global $conn;

		# Codi SQL de la consulta
		$selectProductes ="SELECT id, nom, descripcio, stock, preu
							FROM productes";

		try{
			# Executa la consulta 
			$resultat = $conn->query($selectProductes);

			# Retorna l'array associatiu del resultat de la consulta
			$retorn = $resultat->fetchAll(PDO::FETCH_ASSOC);
			return $retorn;

		} catch (PDOException $e) {
			throw new Exception("Error al llistatProductes: ". $e->getMessage());
		}

	}

	function dadesProducte($idProducte) {

        # Cojo la variable global en php
        global $conn;

        # La consulta puede dar error, por ello:
        try{
             # Código SQL de la consulta al poner :idAlumne, estoy indicando que es un parámetro que añadiré luego.
            $selectProducte ="SELECT *
                            FROM productes
                            WHERE ID = :idProducte"; # En forma :parametro
            # Preparo la consulta
            $preparedSelect = $conn->prepare($selectProducte);
            
            # Executa la consulta 
            $preparedSelect->execute( array( 'idProducte' => $idProducte) );

            # Guardo los array asociativos -- Para evitar errores random --
            $return = $preparedSelect->fetch(PDO::FETCH_ASSOC);
            return $return;

        } catch(PDOException $e){
            throw new Exception("ERROR dades Productes: ". $e->getMessage());
        }
        
    }

	function canviarStock($id, $valor){
		global $conn;

		try {
			# Codi SQL de la consulta. 
			$updateProducte = "UPDATE productes
								 SET stock = stock + :valor                           
								 WHERE id = :id"; 

			# Prepara la sentència
			$update = $conn->prepare($updateProducte);

			# Executa la consulta
			$update->execute(array("id"=>$id, "valor"=>$valor));
		}
		catch(PDOException $e){
			throw new RuntimeException("Error Canviar el Stock " . $e->getMessage(), 1010);
		}
	}  
	
	function numStock($id){
		global $conn;

		# Codi SQL de la consulta
		$selectStock ="SELECT stock
					   FROM productes
					   WHERE id = :id";

		try{
			# Prepara
			$preparedSelect = $conn->prepare($selectStock);

			# Executa la consulta 
			$preparedSelect->execute(array('id'=>$id));

			# Agafem el resultat
			$resultat = $preparedSelect->fetchColumn();

			return $resultat;

		} catch (PDOException $e) {
			throw new Exception("Error al llistatReciclatge: ". $e->getMessage());
		}
	}


	function eliminarProducte($idProducte) {

			global $conn;

			 # Código SQL de la consulta
			$delete ="DELETE FROM productes 
							WHERE ID = :idProducte";

			# La consulta puede dar error
			try{
				# Preparo el delete
				$preparedDelete = $conn->prepare($delete);

				# Executa el delete
				$preparedDelete->execute( array( 'idProducte' => $idProducte) );

			} catch(PDOException $e){
				throw new Exception("ERROR eliminar Producte: ". $e->getMessage());
			}

		}

	function nouProducte($nom, $descripcio, $stock, $preu) {

			# Cojo la variable global en php
			global $conn;

			 # Código SQL de la consulta al poner :idAlumne, estoy indicando que es un parámetro que añadiré luego.
			$insert = "INSERT INTO productes (nom, descripcio, stock, preu)
							VALUES (:nom, :descripcio, :stock, :preu)"; 
							#En forma :parametro

			# La consulta puede dar error
			try{
				# Preparo el insert
				$preparedInsert = $conn->prepare($insert);

				# Ejecuta el insert
				$preparedInsert->execute( array(
												'nom' => $_POST['nom'], 
												'descripcio' => $_POST['descripcio'],
												'stock' => $_POST['stock'],
												'preu' => $_POST['preu'], 
												)  
										);

			} catch(PDOException $e){
				throw new Exception("ERROR dades producte: ". $e->getMessage());
			}

		}

	function modificarProducte ($id, $nom, $descripcio, $stock, $preu) {

			global $conn;

			# Codi SQL de la consulta
			$update ="UPDATE productes
					  SET nom = :nom, descripcio = :descripcio, stock = :stock, preu = :preu
					  WHERE id = :id;";

			try {
				# Preparar update
				$prepareUpdate = $conn->prepare($update);

				# Executa el update
				$prepareUpdate -> execute(array("id"=>$id, "nom"=>$nom, "descripcio"=>$descripcio, "stock"=>$stock, "preu"=>$preu));

			} catch (Exception $ex) {
				throw new Exception("Err editar producte ".$ex->getMessage());
			}
		}


	function ordenar($col){
		global $conn;

		try {
			# Codi SQL de la consulta. 
			$ordenarProducte = "SELECT id, nom, descripcio, stock, preu
								 FROM productes
								 ORDER BY $col"; 
			# Executa la consulta
			$resultat = $conn->query($ordenarProducte);
			
			# Retorna l'array associatiu del resultat de la consulta
			$retorn = $resultat->fetchAll(PDO::FETCH_ASSOC);
			return $retorn;

		}
		catch(PDOException $e){
			throw new RuntimeException("Error Ordenar el preu " . $e->getMessage(), 1010);
		}
	}

	function desordenar($col){
		global $conn;

		try {
			# Codi SQL de la consulta. 
			$ordenarProducte = "SELECT id, nom, descripcio, stock, preu
								 FROM productes
								 ORDER BY $col desc"; 

			# Executa la consulta
			$resultat = $conn->query($ordenarProducte);
			
			# Retorna l'array associatiu del resultat de la consulta
			$retorn = $resultat->fetchAll(PDO::FETCH_ASSOC);
			return $retorn;
		}
		catch(PDOException $e){
			throw new RuntimeException("Error Ordenar el preu " . $e->getMessage(), 1010);
		}
	}

	
	function busqueda($buscar){
		global $conn;

		try {
			# Codi SQL de la consulta. 
			$buscarProducte = "SELECT id, nom, descripcio, stock, preu
								 FROM productes
								 Where nom LIKE '%$buscar'"; 
			#echo "$buscarProducte<hr>";

			# Executa la consulta
			$resultat = $conn->query($buscarProducte);
			# Retorna l'array associatiu del resultat de la consulta
			$retorn = $resultat->fetchAll();
			#print_r($retorn);
			return $retorn;
		}
		catch(PDOException $e){
			throw new RuntimeException("Error Ordenar el preu " . $e->getMessage(), 1010);
		}
	}
	
?>