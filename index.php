<?php
  session_start();
  # Primero, si he ha iniciado sesión voy directamente al dispatcher
  if(isset($_SESSION['usuari'])){
    require_once 'dispatcher.php';

  } else { 
    
    # No se ha iniciado sesión. Muestro el login.
    
    ?>
    <!doctype html>
    <html lang="en">
      <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <title>APP Web Ashu</title>
      </head>
      <body>
		  <h1 align="center">Projecte CRUD Ashu</h1>
       <div class="container">
	<form action="login.php" method="post">
    <div class="mb-3">
      <label for="usuari" class="form-label">Usuari:</label>
      <input type="text" id="usuari" class="form-control" name="usuari" value="admin">
    </div>
    <div class="mb-3">
      <label for="contrassenya" class="form-label">Contrasseña:</label>
      <input type="password" id="contrassenya" class="form-control" name="contrassenya" value="admin">
    </div>
	<button type="submit" class="btn btn-primary">Login</button>
	</form>
	</div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </body>
    </html>
    <?php
  }
?> 

