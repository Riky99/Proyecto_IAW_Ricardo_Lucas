<?php include("../include/sesion.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Editar Especies</title>
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
							<?php if (!isset($_POST['idEspecie'])) : ?>
								<div class="form-group">
								<div class="row">
									<div class="mx-auto">
										<h3>Administrador de especies</h3>
									</div>
									
								</div>
								
							</div>
							<form action="" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">											
											<h5>Especie: </h5>
											
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Especies" value="<?php echo $_GET['nombreEspecie']?>" name="nombreEspecie" required>
										</div>
										
									</div>
									
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3 col-md-offset-3" >
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
									header('Location: especies.php');

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