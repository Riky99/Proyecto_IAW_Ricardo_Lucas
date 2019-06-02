<?php 
	session_start();
	if ($_SESSION["tipo"]!='admin') {
		session_destroy();
		header("Location: ../../login/login.php");
	}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Itinerario</title>
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
								<a class="navbar-brand" href="../itinerario/itinerario.php">Itinerario</a>
							</div>
							<div class="navbar-header">
								<a class="navbar-brand" href="../animales/animales.php">Animales</a>
							</div>
							<div class="navbar-header">
								<a class="navbar-brand" href="../especies/especies.php">Especies</a>
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
							<?php if (!isset($_POST['nombre'])) : ?>
							<form method="POST" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										<div class="col-md-6 col-md-offset-6">
											<input type="text" class="form-control" placeholder="Añadir itinerario" name="nombre" required>
											
										</div>
										
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6 col-md-offset-3" >
											<input type="submit" class="form-control btn btn-primary" value="Añadir Itinerario">
										</div>
									</div>
								</div>
								
							</form>
							<table>
								<tbody>
									<tr>
										<td>Lista de itinerarios</td>
									</tr>
								</tbody>
							</table>
							<?php else: ?>
							<?php
								$codigo=$_POST['nombre'];
								$consulta="INSERT INTO itinerario VALUES(null, '$codigo')";
								$result = $connection->query($consulta);
								if (!$result) {
									echo "error";
									} else {
										echo "Itinerario Registrado";
										echo "<a id='recargar' href='location.php' ><button class='btn-primary'>Recargar</button></a>";
											}
							?>
							
							<?php endif ?>
							<?php
								if ($result = $connection->query("SELECT * FROM itinerario;")) {
									printf("<p></p>", $result->num_rows);
									echo "<table>";
									echo "<tbody>";
									while ($obj = $result->fetch_object()) {
									echo "<tr>";
									echo "<td>".$obj->idItinerario."</td>";
									echo "<td>".$obj->nombre."</td>";
									echo "<td>" ."<a href='editaritinerario.php?idItinerario=".$obj->idItinerario."&nombreItinerario=".$obj->nombre."'>
										<img id='editar' src='../imagenes/editar.png'></a>
										<a href='borraritinerario.php?idItinerario=".$obj->idItinerario."'>
										<img id='borrar' src='../imagenes/borrar.png'></a> </td>";
									echo "</tr>";
									}
									echo "<tbody>";
									echo "</table>";
									$result->close();
									unset($obj);
									unset($connection);
										}
									?>
									
								</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</body>
		</html>