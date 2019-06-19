<?php include("../include/sesion.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Admin Usuarios</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./indexstyle.css" type="text/css">
	</head>
	<body>
		<?php include("../include/conexion.php"); ?>
		<div class="container-fluid" id="index">
			<?php include("../include/header.php"); ?>
			<?php include("../include/imgcerrarsesion.php"); ?>
			<div  class="row justify-content-center" id="contenedor">
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
							<form  method="POST" accept-charset="utf-8">
								<div class="form-group">
									<div class="row" id="reserva">
										<div class="col-sm-3">
											<h5>Usuario: </h5>
											
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Nombre Usuario" name="nombre" required>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row" id="reserva">
										<div class="col-sm-3">
											<h5>Contraseña: </h5>
											
										</div>
										<div class="col-sm-6">
											<input type="password" class="form-control" placeholder="Contraseña" name="password" required>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row" id="reserva">
										<div class="col-sm-3">
											<h5>Email: </h5>
											
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" placeholder="Email" name="email" required>
											
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="row">
										<div class="col-md-6 col-md-offset-3" >
											<input type="submit" class="form-control btn btn-primary" value="Crear Usuario">
										</div>
									</div>
								</div>
							</form>
							<table class="table">
								<thead>									
									<tr>
										<th>idUsuario</th>
										<th>Nombre de Usuario</th>
										<th>Contraseña</th>
										<th>Email</th>
										<th>Tipo</th>
										<th></th>
										<th></th>									
									</tr>
								</thead>
							<?php else: ?>
							<?php
							
							$codigo=$_POST['nombre'];
													
							$consulta= "INSERT INTO usuarios VALUES(null, '".$_POST['nombre']."',
							md5('".$_POST['password']."'),'".$_POST['email']."','normal' )";

							$result = $connection->query($consulta);
							if (!$result) {
							echo "Error";
							} else {
							echo "Usuario Registrado";
							header('Location: usuarios.php');
							}
							?>
							<?php endif ?>
							<?php 
							if ($result = $connection->query("SELECT * FROM usuarios;")) {
								
								echo "<tbody>";
									while ($obj = $result->fetch_object()) {
									echo "<tr>";
										echo "<td><span class='badge badge-secondary'>".$obj->idUsuario."<span></td>";
										echo "<td>".$obj->nombre."</td>";
										echo "<td>".$obj->password."</td>";
										echo "<td>".$obj->email."</td>";
										echo "<td>".$obj->tipo."</td>";
										echo "<td>".
					"<a href='editarusuario.php?idUsuario=".$obj->idUsuario."&nombreUsuario=".$obj->nombre."&email=".$obj->email."'>

											<img id='editar' src='../imagenes/editar.png'></a>
											</td>";

										echo "<td>".
										"<a href='borrarusuario.php?idUsuario=".$obj->idUsuario."'>
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