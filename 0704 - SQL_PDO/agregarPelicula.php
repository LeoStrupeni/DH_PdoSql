<?php

require_once "../GLOBAL/config.php";
require_once "../GLOBAL/conexion.php";
require_once "../GLOBAL/funciones.php";

if($_POST){
	$title=$_POST['title'];
	$query = $pdo->prepare("SELECT title FROM movies");
	$query->execute();
	$resultado = $query->fetchall(PDO::FETCH_ASSOC);

	$temp="Puede Agregar la Pelicula";

 	foreach ($resultado as $key => $value) {

		if($value['title']==$title){
			
			$temp="La pelicula ya se encuentra en la Base";
			
		}
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Agregar Pelicula</title>
</head>

<body>
	<div class="container">
		<a href="series.php">Volver a Listado</a>
		<br>

		<?php if (!empty($temp)) :?>
			<div class="alert alert-warning" role="alert">
				<?=$temp?>
			</div>
		<?php endif;?>




		<div class="col h3">
			3 - Formulario
		</div>
		<?php $series=consultaTablasSQL($pdo, 'Genres') ?>

		<div class="row">
			<div class="col-4 border m-auto">
				<form method="post" action="">
					<div class="form-group">
						<label for="title">Titulo: </label>
						<input type="text" class="form-control" name="title">
					</div>
					<div class="form-group">
						<label for="rating">Rating: </label>
						<input type="text" class="form-control" name="rating">
					</div>
					<div class="form-group">
						<label for="awards">Premios: </label>
						<input type="text" class="form-control" name="awards">
					</div>
					<div class="form-group">
						<label for="fecha">Fecha de Estreno: </label><br>
						<input type="date" name="fecha" min="1950-01-01" class="text-center">
					</div>
					<div class="form-group">
						<label for="length">Duracion: </label>
						<input type="text" class="form-control" name="length">
					</div>
					<div class="form-group">
						<label for="genre">Genero</label>
    					<select class="form-control" name="genre">
							<?php foreach ($series as $key => $value) :?>
								<option><?= $value['name']?></option>		
							<?php endforeach; ?>					
						</select>
					</div>
					<button class="btn btn-primary" type="submit">Enviar</button>
					<br>
					<br>
				</form>    
			</div>
			

	
	<hr>
	</div>
</body>

</html>
