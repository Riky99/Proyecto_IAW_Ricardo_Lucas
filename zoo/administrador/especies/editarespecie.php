<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Editar Especies</title>
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
							<?php if (!isset($_POST['idEspecie'])) : ?>
							<form action="" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Especies" value="<?php echo $_GET['nombreEspecie']?>" name="nombreEspecie" required>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-3 col-md-offset-3" >
											<input type="submit" class="form-control btn btn-primary" name="Actualizar" value="Actualizar" required>
											<input type="hidden" name="idEspecie" value="<?php echo $_GET['idEspecie'] ?>" required>											
										</div>
										
									</div>
								</div>
							</form>
							<?php else: ?>
							<?php
								$nombre=$_POST['nombreEspecie'];
								$especie=$_POST['idEspecie'];
								$consulta2="UPDATE especie SET nombre = '$nombre' WHERE idEspecie = '$especie'";
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
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
			
		</div>
		
	</body>
</html>