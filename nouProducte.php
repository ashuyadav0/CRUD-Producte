<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Nou Producte</title>
  </head>
  <body>
    <div class="container">
      
      <h1>Formulari Creació Nou Producte</h1>
      <form action="./?operacio=nouProducte" method="post">
            <table class='table table-hover table-responsive table-bordered'>
						<tr>
						   <td><label>Nom</label></td>
						   <td><input type="text" class="form-control" name="nom" required></td>
					   </tr>
					   <tr>
						   <td><label>Descripcio</label></td>
						   <td><input type="text" class="form-control" name="descripcio" ></td>
					   </tr>
					   <tr>
						   <td><label>Stock</label></td>
						   <td><input type="text" class="form-control" name="stock"></td>
					   </tr>
					   <tr>
						   <td><label>Preu</label></td>
						   <td><input type="number" class="form-control" name="preu" required></td>
					   </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="submit" value="Afegir Producte">
						<a href="./" class="btn btn-danger">Torna</a>
                    </td>
                </tr>
            </table>
        </form>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>