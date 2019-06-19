<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./loginstyle.css" type="text/css">
	</head>
	<body>
		
		<div class="container-fluid" id="login">
			<?php include("../administrador/include/header.php"); ?>
			
			<div class="row justify-content-center" id="contenedor">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-body">							
							<form method="post" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										
											<label>Nombre de usuario: </label>
											<input type="text" class="form-control" placeholder="Nombre de usuario" name="nombre" required>
											<label>Contraseña</label>
											<input type="password" class="form-control" placeholder="Contraseña" name="password" required>
																			
										
									</div>
									
								</div>
								<div class="input-group">
									<div class="row">										
										<div class="mx-auto">
											<div class="panel-footer" class="pepe" >
												<input class="btn btn-dark" type="submit" name="" value="Inciar Sesion">
												
											</div>
										</div>
										
									</div>
									
								</div>								
								
							</div>
							
						</form>
						
						<?php
						
						if (isset($_POST["nombre"])) {
						
						$connection = new mysqli("localhost", "root", "Admin2015", "zoo", "3316");
						
						if ($connection->connect_errno) {
						printf("Connection failed: %s\n", $connection->connect_error);
						exit();
						}
						
						$consulta="select * from usuarios where
						nombre='".$_POST["nombre"]."' and password = md5('".$_POST["password"]."');";
						
						if ($result = $connection->query($consulta)) {
						
						if ($result->num_rows===0) {
						echo "LOGIN INVALIDO";
						} else {
						
						$_SESSION["nombre"]=$_POST["nombre"];
								$user=$result->fetch_object();
						$_SESSION["tipo"]=$user->tipo;
						if ($user->tipo=="admin") {
						header("Location: ../administrador/reserva/reserva.php");
						}else {
						header("Location: ../administrador/reserva/reserva.php");
						}
						}
						} else {
						echo "Wrong Query";
						}
						}
						?>
						
					</div>
					
				</div>
				
			</div>
			<?php include("../administrador/include/footer.php"); ?>
			
			
		</div>
		
		
	</body>
</html>