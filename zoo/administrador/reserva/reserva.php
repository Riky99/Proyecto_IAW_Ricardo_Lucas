<?php include("../include/sesion.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Admin Reserva</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<link rel="stylesheet" href="./indexstyle.css" type="text/css">
		</head>
	</head>
	<body>
	<?php include("../include/conexion.php"); ?>

		<div class="container-fluid" id="index">

			<?php include("../include/header.php"); ?>
			<?php include("../include/imgcerrarsesion.php"); ?>

			<div class="row justify-content-center" id="contenedor">
				<div class="col-sm-12">
					<div class="panel panel-success">
						<div class="panel-body">
							<?php if (!isset($_POST['fecha'])) : ?>
							<form method="POST" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										<div class="mx-auto">
											<h3>Administrador de Reservas</h3>
										</div>
										
									</div>
									
								</div>
								<div class="form-group">
									<div class="row" id="reserva">
										<div class="col-sm-3">
											<h5>Fecha: </h5>
											
										</div>
										<div class="col-sm-6">
											<input type="date" class="form-control" placeholder="Fecha de entrada" name="fecha" required>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row" id="reserva">
										<div class="col-sm-3">
											<h5>Hora: </h5>
											
										</div>
										<div class="col-sm-6 col-md-offset-6">
											<input type="time" class="form-control" placeholder="Hora" name="hora" required>
											
										</div>
										
									</div>
									
								</div>
								
								<div class="form-group">
									<div class="row" id="reserva">
										<div class="col-sm-3">
											<h5>Nº Personas: </h5>
											
										</div>
										<div class="col-sm-6 col-sm-offset-6">
											<input type="number" class="form-control" placeholder="Número de personas"
											name="n_personas" min="1" max="10" required>
											
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
										<div class=" col-sm-3">
											<h5>Usuario: </h5>
										</div>
										<div class="col-sm-6 col-sm-offset-6">
											<?php
											
											if ($result = $connection->query("SELECT * FROM usuarios;")) {
											
											echo "<select  class='browser-default custom-select' name='idUsuario'>";
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
									<div class="row">
										<div class="col-sm-4 col-sm-offset-3" >
											<input type="submit" class="form-control btn btn-primary" value="Reservar">
										</div>
									</div>
								</div>
								
							</form>
							<table class="table">
								<thead>									
									<tr>
										<th>idReserva</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Nº de Personas</th>
										<th>Itinerario</th>
										<th>Usuario</th>										
										<th></th>
										<th></th>
									</tr>
								</thead>

								<?php else: ?>
								<?php
								
								$fecha=$_POST['fecha'];
								$hora=$_POST['hora'];
								$n_personas=$_POST['n_personas'];							
								$idUsuario=$_POST['idUsuario'];
								$idItinerario=$_POST['idItinerario'];								
								$consulta="INSERT INTO reserva VALUES(null, '$fecha','$hora','$n_personas','$idUsuario', '$idItinerario')";
								$result = $connection->query($consulta);
								if (!$result) {
								echo "error";								
								} else {
								echo "Reserva Realizada";
								header('Location: reserva.php');
								}
								
								?>
								<?php endif ?>
								<?php								
								
								if ($result = $connection->query("SELECT r.idReserva, r.fecha, r.hora, r.n_personas, i.nombre as i_nombre, u.nombre as u_nombre from reserva r inner join itinerario i on r.idItinerario=i.idItinerario inner join usuarios u on r.idUsuario=u.idUsuario;")) {	
									echo "<tbody>";
											while ($obj = $result->fetch_object()) {
												echo "<tr>";
														echo "<td><span class='badge badge-secondary'>".$obj->idReserva."</span></td>";
														echo "<td>".$obj->fecha."</span></td>";
														echo "<td>".$obj->hora."</span></td>";
														echo "<td>".$obj->n_personas."</span></td>";
														echo "<td>".$obj->i_nombre."</td></span>";
														echo "<td>".$obj->u_nombre."</td></span>";
							echo "<td>"."<a href='editarreserva.php?idReserva=".$obj->idReserva."'>
														<img id='editar' src='../imagenes/editar.png'></a>
														</td>";
														echo "<td>"."<a href='borrarreserva.php?idReserva=".$obj->idReserva."'>
														<img id='borrar' src='../imagenes/borrar.png'></a>
														</td>";
												echo "</tr>";
								}
								echo "</tbody>";							
							
							$result->close();
							unset($obj);
							unset($connection);
							}
							?>
							</table>
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</body>
</html>