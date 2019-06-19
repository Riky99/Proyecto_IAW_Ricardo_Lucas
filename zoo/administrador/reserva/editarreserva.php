<?php include("../include/sesion.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Editar Reserva</title>
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
							<?php if (!isset($_POST['idReserva'])) : ?>
								<div class="form-group">
								<div class="row">
									<div class="mx-auto">
										<h3>Administrador de reservas</h3>
									</div>
									
								</div>
								
							</div>
							<form action="" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">											
											<h5>Fecha: </h5>
											
										</div>
										<div class="col-sm-6 col-md-offset-6">
										<input type="date" class="form-control" placeholder="Fecha de entrada" value="<?php echo $_GET['fecha'] ?>" name="fecha" required>
											
										</div>
										
									</div>
								</div>

								<div class="form-group">
									<div class="row" id="reserva">
										<div class="col-sm-3">											
											<h5>Hora: </h5>
											
										</div>
										<div class="col-sm-6 col-md-offset-6">
											<input type="time" class="form-control" placeholder="Hora" value="<?php echo $_GET['hora'] ?>"name="hora" required>
											
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row" id="reserva">
										<div class="col-sm-3">											
											<h5>Nº de Personas: </h5>
											
										</div>
										<div class="col-sm-6 col-md-offset-6">
											<input type="number" class="form-control" placeholder="Número de personas"
											name="n_personas" value="<?php echo $_GET['n_personas'] ?>" min="1" max="10" required>
											
										</div>
										
									</div>
								</div>

								<div class="form-group">
									<div class="row" id="reserva">
										<div class="col-sm-3">
											<h5>Usuario: </h5>											
										</div>
										<div class="col-sm-6 col-md-offset-6">
											<?php
											if ($result = $connection->query("SELECT * FROM usuarios;")) {
											echo "<select class='browser-default custom-select' name='idUsuario'>";
												while ($obj = $result->fetch_object()) {
													echo "<table>";
														echo "<tbody>";
															echo "<tr>";
																echo "<td><option value='".$obj->idUsuario."'>".$obj->nombre."</option> </td>";
															echo "</tr>";
														echo "</tbody>";
													echo "</table>";
											}
											echo "</select></p>";
											}?>
											
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row" id="reserva">
										<div class=" col-sm-3">
											<h5>Itinerario: </h5>
										</div>
										<div class="col-sm-6 col-sm-offset-6">
											<?php
											
											if ($result = $connection->query("SELECT * FROM itinerario;")) {
											
											echo "<select  class='browser-default custom-select' name='idItinerario'>";
												while ($obj = $result->fetch_object()) {
													echo "<table>";
														echo "<tbody>";
															echo "<tr>";
																echo "<td><option value='".$obj->idItinerario."'>".$obj->nombre."</option> </td>";
															echo "</tr>";
														echo "</tbody>";
													echo "</table>";
																		}
											echo "</select></p>";
											}?>
											
										</div>
									</div>									
								</div>

								
								
								<div class="form-group">
									<div class="row" id="reserva">
									<div class="col-sm-6 col-sm-offset-6">
										<input type="submit" class="form-control btn btn-primary" name="Editar" value="Actualizar Reserva">
									</div>
									
								</div>
								</div>								
								
								<input type="hidden" name="idReserva" value="<?php echo $_GET['idReserva'] ?>">
							</form>
							<?php else: ?>
							<?php
							$idReserva=$_POST['idReserva'];
							$fecha=$_POST['fecha'];
							$hora=$_POST['hora'];
							$n_personas=$_POST['n_personas'];
							$idUsuario=$_POST['idUsuario'];
							$idItinerario=$_POST['idItinerario'];
							$consulta2="UPDATE reserva SET fecha ='$fecha', hora='$hora', n_personas='$n_personas', idUsuario='$idUsuario', idItinerario='$idItinerario' WHERE idReserva = '$idReserva'";
								$result2 = $connection->query($consulta2);
								if (!$result2) {
									echo "error";
									var_dump($consulta2);
								} else {
									echo "Reserva Actualizada";
									header('Location: reserva.php');
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