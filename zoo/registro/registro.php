<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Registro</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./registrostyle.css" type="text/css">
	</head>
	<body>
		
		<div class="container-fluid" id="registro">
			<?php include("../administrador/include/header.php"); ?>

			<div class="row justify-content-center" id="contenedor">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-body">
							<?php if (!isset($_POST["nombre"])) : ?>
							<form action="" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Nombre de usuario" value="" name="nombre" required>
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
							
							$connection = new mysqli("localhost", "root", "Admin2015", "zoo", "3316" );
							
							if ($connection->connect_errno) {
							printf("Connection failed: %s\n", $connection->connect_error);
							exit();
							}
							
							$consulta= "INSERT INTO usuarios VALUES(null, '".$_POST['nombre']."',
							md5('".$_POST['password']."'),'".$_POST['email']."','normal' )";
							$result = $connection->query($consulta);
							if (!$result) {
							echo "Error";
							} else {
							echo "Usuario Registrado";
							header('Location: /zoo/index.php');
							}
							?>
							
							<?php endif ?>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			<?php include("../administrador/include/footer.php"); ?>
			
			
		</div>
		
		
		
	</body>
</html>