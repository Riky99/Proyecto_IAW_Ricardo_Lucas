<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Editar Animal</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="./indexstyle.css" type="text/css">
	</head>
	<body>
		
		<?php
		$connection = new mysqli("localhost", "root", "Admin2015", "zoo", "3316" );
			if ($connection->connect_errno) {
				printf("Connection failed: %s\n", $connection->connect_error);
			exit();
		}
		?>
		<div class="container-fluid" id="index">
			<div class="row " id="cabecera">
				<div class="col-md-12">
					<nav class="navbar navbar-nav">
						<div class="container-fluid">
							<div class="navbar-header">
								<a class="navbar-brand" href="">Inicio</a>
							</div>
							<div class="navbar-header">
								<a class="navbar-brand" href="">Itinerario</a>
							</div>
							<div class="navbar-header">
								<a class="navbar-brand" href="">Animales</a>
							</div>
							<div class="navbar-header">
								<a class="navbar-brand" href="">Reserva</a>
							</div>
							
						</div>
					</nav>
					
				</div>
				
			</div>
			<div class="row justify-content-center" id="contenedor">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-body">
							<?php if (!isset($_POST['idAnimal'])) : ?>
							<form action="" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Animales" value="<?php echo $_GET['nombreAnimal'] ?>" name="nombreAnimal" required>
									<input type="submit" name="Editar" value="Editar">
									<input type="hidden" name="idAnimal" value="<?php echo $_GET['idAnimal'] ?>">
								</div>
							</form>
							<?php else: ?>
							<?php
								$nombre=$_POST['nombreAnimal'];
								$animal=$_POST['idAnimal'];
								$consulta2="UPDATE animal SET nombre = '$nombre' WHERE idAnimal = '$animal' ";
								$result2 = $connection->query($consulta2);
								if (!$result2) {
									echo "error";
								} else {
									echo "Especie Actualizada";
									header('Location: location.php');
								}
								
									echo "<p><b>Nombre de la especie:</b>".$_POST['nombreEspecie']."</p>";
							?>
							<?php endif ?>
							<?php
								
								
							?>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
			
		</div>
		
	</body>
</html>