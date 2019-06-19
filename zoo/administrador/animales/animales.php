<?php include("../include/sesion.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Animales</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./indexstyle.css" type="text/css">
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
							<?php if (!isset($_POST['nombre'])) : ?>
								<div class="form-group">
									<div class="row">
										<div class="mx-auto">
											<h3>Administrador de Animales</h3>
										</div>
										
									</div>
									
								</div>
							<form  method="POST" accept-charset="utf-8">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-3">
											<h5>Animal: </h5>
											
										</div>
										<div class="col-sm-6 col-md-offset-3">
											<input type="text" class="form-control" placeholder="Añadir animal" name="nombre" required>			
										</div>													
									</div>

								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6 col-md-offset-3" >
											<input type="submit" class="form-control btn btn-primary" value="Añadir Animal">
										</div>
									</div>
								</div>
							</form>							
							<table class="table">
								<thead>
									<tr>
										<th>idAnimal:</th>
										<th>Animal:</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
							
							<?php else: ?>
							<?php
							
							$codigo=$_POST['nombre'];
							$consulta="INSERT INTO animal VALUES(null, '$codigo' ,null)";
							
							$result = $connection->query($consulta);
							if (!$result) {
							echo "error";
							} else {
							echo "Animal Registrado";
							header('Location: animales.php');
							}						
							
							?>
							<?php endif ?>
							<?php
							
							if ($result = $connection->query("SELECT * FROM animal;")) {
							
								echo "<tbody>";
									while ($obj = $result->fetch_object()) {
									echo "<tr>";
										echo "<td><span class='badge badge-secondary'>".$obj->idAnimal."<span></td>";
										echo "<td>".$obj->nombre."</td>";
										echo "<td>".
										"<a href='editaranimal.php?idAnimal=".$obj->idAnimal."&nombreAnimal=".$obj->nombre."'>
											<img id='editar' src='../imagenes/editar.png'></a>
											</td>";

										echo "<td>".
										"<a href='borraranimal.php?idAnimal=".$obj->idAnimal."'>
											<img id='borrar' src='../imagenes/borrar.png'></a> </td>";
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