<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="./loginstyle.css" type="text/css">
	</head>
	<body>
		
		<div class="container-fluid" id="login">
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
							
							<form action="" method="POST" accept-charset="utf-8">
								
								<label>Email: </label>
								<input type="text" class="form-control" placeholder="email" name="email" value="" required>
								<label>Contraseña</label>
								<input type="password" class="form-control" placeholder="Contraseña" name="password" value="" required>
								
								
							</div>
							<div class="panel-footer">
								<input class="btn btn-primary" type="submit" name="" value="Inciar Sesion">
								<input class="btn btn-warning" type="submit" name="" value="Registrarse">
							</div>
						</form>
						
						<?php
						//FORM SUBMITTED
						if (isset($_POST["email"])) {
						//CREATING THE CONNECTION
						$connection = new mysqli("localhost", "root", "Admin2015", "zoo", "3316");
						//TESTING IF THE CONNECTION WAS RIGHT
						if ($connection->connect_errno) {
						printf("Connection failed: %s\n", $connection->connect_error);
						exit();
						}
						//MAKING A SELECT QUERY
						//Password coded with md5 at the database. Look for better options
						$consulta="select * from usuarios where
						email='".$_POST["email"]."' and password=md5('".$_POST["password"]."');";
						//Test if the query was correct
						//SQL Injection Possible
						//Check http://php.net/manual/es/mysqli.prepare.php for more security
						if ($result = $connection->query($consulta)) {
						//No rows returned
						if ($result->num_rows===0) {
						echo "LOGIN INVALIDO";
						} else {
						//VALID LOGIN. SETTING SESSION VARS
						$_SESSION["email"]=$_POST["email"];
						$_SESSION["language"]="es";
						header("Location: ../index.php");
						}
						} else {
						echo "Wrong Query";
						}
						}
						?>
						
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