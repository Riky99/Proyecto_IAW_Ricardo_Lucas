<?php include("../include/sesion.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Especies</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./indexstyle.css" type="text/css">
	</head>

	<body>
	<?php include("../include/conexion.php"); ?>

		<div class="container-fluid" id="index">

			<?php include("../include/header.php"); ?>
			<?php include("../include/imgcerrarsesion.php"); ?>

			<div class="row justify-content-center" id="contenedor">
				
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-body">
							<?php if (!isset($_POST['nombre'])) : ?>
							<form action="" method="POST" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										<div class="mx-auto">
											<h3>Administrador de Especies</h3>
										</div>
										
									</div>
									
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<h5>Especie: </h5>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Añadir Especie" value="" name="nombre" required>
										</div>
										
									</div>
									
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-3" >
											<input type="submit" class="form-control btn btn-primary" value="Añadir Especie">
										</div>
									</div>
								</div>
							</form>
							<table class="table">
								<thead>
									<tr>
										<th>idEspecie</th>
										<th>Especie</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
							<?php else: ?>
							<?php
							
								$codigo=$_POST['nombre'];
								$consulta="INSERT INTO especie VALUES(null, '$codigo')";
								
								$result = $connection->query($consulta);
								if (!$result) {
									echo "error";
								} else {
									echo "Especie Registrada";
									header('Location: especies.php');
								}
							?>
							<?php endif ?>
							<?php
							
								if ($result = $connection->query("SELECT * FROM especie;")) {
								
								echo "<tbody>";
									while ($obj = $result->fetch_object()) {
											echo "<tr>";
													echo "<td><span class='badge badge-secondary'>".$obj->idEspecie."<span></td>";
													echo "<td>".$obj->nombre."</td>";
													echo "<td>"."
															<a href='editarespecie.php?idEspecie=".$obj->idEspecie."&nombreEspecie=".$obj->nombre."'>
															<img id='editar' src='../imagenes/editar.png'></a>
															</td>";
													echo "<td>"."<a href='borrarespecie.php?idEspecie=".$obj->idEspecie."'>
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