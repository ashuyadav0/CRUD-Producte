<!DOCTYPE HTML>
<html>
<head>
    <title>Llistat Productes</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
    <!-- custom css -->
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
		.form-inline{float: right;}
    </style>
 
</head>
<body>
 
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Llistat Productes</h1>
			<a href="nouProducte.php" class="btn btn-success">Nou Producte</a>
			<a href="./?operacio=logout" class="btn btn-danger">Logout</a>
			<form class="form-inline" action="./?operacio=busqueda" method="post">
			  <div class="form-group mx-sm-3 mb-2">
				<input type="text" class="form-control" name="busqueda" placeholder="Busca.." required>
			  </div>
			  <button type="submit" class="btn btn-primary mb-2">Buscar</button>
			</form>
        </div>
        <?php
            # Comprova el missatge de l'operació
           if (isset($_SESSION['missatge'])) {                
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['missatge'] ?>
                    </div>
                <?php
                # Desactiva el flag eliminat la variable
                unset($_SESSION['missatge']);
            }
        ?>
            <table class='table table-hover table-responsive table-bordered'>
            <!-- Primera fila amb les capçaleres de les columnes -->
		<tr>
                    <th>ID</th>
                    <th>NOM</th>
					<th>MARCA</th>
                    <th>STOCK</th>
                    <th>PREU&nbsp;
					<a href="./?operacio=ordenar&col=preu">&#x2191;</a> &nbsp;
					<a href="./?operacio=desordenar&col=preu">↓</a>
					</th>
					<th>ACCIÓ</th>
		</tr>
			 <?php

                # Compruebo que la array no está vacía
                if(empty($produc)){
                    echo "¡¡¡No hi ha productes!!!";

                } else {
					
					foreach($produc as $producte){
                        extract($producte);
                ?> 
                        <tr>
                            <td><?php echo $id?></td>
                            <td><?php echo $nom ?></td>
                            <td><?php echo $descripcio?></td>
                            <td><?php echo $stock?>&nbsp;&nbsp;
								<a href="./?id=<?php echo $id ?>&nom=<?php echo $nom?>&operacio=suma" class="btn btn-primary btn-xs">+</a>
								<a href="./?id=<?php echo $id ?>&nom=<?php echo $nom?>&operacio=resta" class="btn btn-primary btn-xs">-</a>
							</td>
							<td><?php echo $preu?>€</td>
                            <td>
                                <a href="./?operacio=dadesProducte&id=<?php echo $id?>" class="btn btn-success m-r-1em">Veure</a>
                                <a href="./?operacio=editarProducte&id=<?php echo $id?>" class="btn btn-success m-r-1em">Modificar</a>
								<a href="./?operacio=eliminarProducte&id=<?php echo $id ?>" class="btn btn-danger">Eliminar</a>
                        </td>
						<?php 
					}
				}
					?>
			
		</table>
    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>