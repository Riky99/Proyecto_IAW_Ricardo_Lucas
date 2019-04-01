<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Registro</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="./registrostyle.css" type="text/css">
	</head>
	<body>
		
		<div class="container-fluid" id="registro">
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
							<?php if (!isset($_POST["email"])) : ?>
							<form action="" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Nombre" value="" name="nombre" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Apellidos" value="" name="apellidos" required>
								</div>
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Correo electronico" value="" name="email" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Contraseña" name="password" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" placeholder="Confirmar contraseña" required>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6 col-md-offset-3" >
											<input type="submit" class="form-control btn btn-primary" value="Crear cuenta">
										</div>
									</div>
								</div>
							</form>
							<?php else: ?>
							<?php
							echo "<h3>hola</h3>";
							var_dump($_POST);
							//CREATING THE CONNECTION
								$connection = new mysqli("localhost", "root", "Admin2015", "zoo", "3316" );
							//TESTING IF THE CONNECTION WAS RIGHT
							if ($connection->connect_errno) {
								printf("Connection failed: %s\n", $connection->connect_error);
								exit();
								}
								$codigo=$_POST['nombre'];
								$consulta= "INSERT INTO usuarios VALUES(null, '".$_POST['nombre']."', '".$_POST['apellidos']."',
								md5('".$_POST['password']."'),'".$_POST['email']."' )";
								var_dump($consulta);
								$result = $connection->query($consulta);
								if (!$result) {
									echo "Query Error";
							} else {
									echo "Usuario Registrado";
								}
							?>
							<?php endif ?>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			<div class="row" id="footer">
				<div class="col-md-12">
					
				</div>
				
			</div>
			
			
		</div>
		
		
		
	</body>
</html>