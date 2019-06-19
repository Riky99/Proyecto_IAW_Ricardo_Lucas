<?php include("../include/sesion.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Editar Usuario</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./indexstyle.css" type="text/css">
</head>
<body>	
	<?php include("../include/conexion.php"); ?>
	<div class="container-fluid" id="index">
		<?php include("../include/header.php"); ?>
		<div class="row justify-content-center" id="contenedor">
			<div class="col-sm-12">
				<div class="panel panel-success">
					<div class="panel-body">
						<?php if (!isset($_POST['nombre'])) : ?>
							<div class="form-group">
								<div class="row">
									<div class="mx-auto">
										<h3>Administrador de Usuarios</h3>
									</div>
									
								</div>
								
							</div>
							<form action="" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<h5>Usuario: </h5>
											
										</div>
										<div class="col-sm-6">
										<input type="text" class="form-control" value="<?php echo $_GET['nombreUsuario'] ?>" name="nombre" required>
										</div>
									</div>								
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<h5>Email: </h5>
											
										</div>
										<div class="col-sm-6">
										<input type="text" class="form-control" value="<?php echo $_GET['email'] ?>" name="email" required>
										</div>
									</div>								
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<input type="submit" class="form-control btn btn-primary" name="Editar" value="Actualizar">
										</div>
										
									</div>									
								</div>
								
								<input type="hidden" name="idUsuario" value="<?php echo $_GET['idUsuario'] ?>">
							</form>

							<?php else: ?>
							<?php
								$idUsuario=$_POST['idUsuario'];
								$nombre=$_POST['nombre'];
								$email=$_POST['email'];								
								$consulta2="UPDATE usuarios SET nombre = '$nombre', email='$email' WHERE idUsuario = '$idUsuario' ";
								$result2 = $connection->query($consulta2);
								if (!$result2) {
									echo "error";
								} else {
									echo "Usuario Actualizado";
									header('Location: usuarios.php');
								}
								
							?>
							<?php endif ?>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
</body>
</html>