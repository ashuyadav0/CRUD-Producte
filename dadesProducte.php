<!DOCTYPE HTML>
<html>
    <head>
        <title>PDO - Dades Productes</title>
    
        <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    
    </head>
    <body>    
        <?php
            if(!empty($resultat)){
                extract($resultat); 
        ?>

                 <!-- container -->
				<div class="container">

					<div class="page-header">
						<h1>Dades Producte</h1>
					</div>
				   <table class="table table-hover table-responsive table-bordered">
					   <tr>
						   <td><label>Nom</label></td>
						   <td><input type="text" class="form-control" name="nom" value="<?php echo $nom ?>"></td>
					   </tr>
					   <tr>
						   <td><label>Descripció</label></td>
						   <td><input type="text" class="form-control" name="descripcio" value="<?php echo $descripcio ?>"></td>
					   </tr>
					   <tr>
						   <td><label>Stock</label></td>
						   <td><input type="text" class="form-control" name="stock" value="<?php echo $stock?>"></td>
					   </tr>
					   <tr>
						   <td><label>Preu</label></td>
						   <td><input type="number" class="form-control" name="preu" value="<?php echo $preu ?>"></td>
					   </tr>
					   <tr>
                            <td></td>
                            <td>
                                <a href='index.php' class='btn btn-danger'>Torna a la pàgina principal</a>
                            </td>
                        </tr>
                    </table>
                </div> <!-- end .container -->
                
    <?php   
			} else {
				?>
                <script>
                    alert("¡Producte no valid!"); 
                    location.href="index.php"
                </script>
		<?php
            }
        ?>
                
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    </body>
</html>

