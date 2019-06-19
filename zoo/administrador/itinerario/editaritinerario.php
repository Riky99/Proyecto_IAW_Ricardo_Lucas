<?php include("../include/sesion.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Editar Itinerario</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./indexstyle.css" type="text/css">
	</head>
	<body>
<?php include("../include/conexion.php"); ?>
		<div class="container-fluid" id="index">
			<?php include("../include/header.php"); ?>
			<div class="row justify-content-center" id="contenedor">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-body">
							<?php if (!isset($_POST['idItinerario'])) : ?>
							<form action="" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">											
											<h5>Itinerario: </h5>
											
										</div>
										<div class="col-sm-6 col-sm-offset-6">
											<input type="text" class="form-control" placeholder="Itinerario" value="<?php echo $_GET['nombreItinerario'] ?>" name="nombreItinerario" required>
										</div>
										
										
									</div>
									
								</div>
								
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3 col-sm-offset-6">
											<input type="submit" class="form-control btn btn-primary" name="Editar" value="Editar">
										
										</div>
										
									</div>
									
								</div>
								<input type="hidden" name="idItinerario" value="<?php echo $_GET['idItinerario'] ?>">
							</form>
							<?php else: ?>
							<?php
							$nombre=$_POST['nombreItinerario'];
							$itinerario=$_POST['idItinerario'];
							$consulta1="UPDATE itinerario SET nombre = '$nombre' WHERE idItinerario = '$itinerario' ";
							$result2 = $connection->query($consulta1);
							if (!$result2) {
								echo "error";
							} else {
								echo "Itinerario Actualizado";
								header('Location: itinerario.php');
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