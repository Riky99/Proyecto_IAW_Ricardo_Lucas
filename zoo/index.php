<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Index Admin</title>
		<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="./indexstyle.css" type="text/css">
	</head>
	<body onload="rotar_imagen();">
		<div class="container-fluid" id="index">
			<?php include("./administrador/include/header.php"); ?>
			<div class="row justify-content-center" id="contenedor">
				<div class="col-md-12">
					<div class="panel panel-success">
						<div class="panel-body">
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<div class="mt-5">
											<img class="ml-5" id="imagenes">
										</div>
										
									</div>
									<div class="col-md-6">
										<div class="mt-5" class="ml-5" id="welcome">
											<h1>BIENVENIDOS AL ZOO</h1>
											
										</div>
									</div>
									
								</div>
								
							</div>

							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
									
										
									</div>
									<div class="col-md-6">
										<div class="mt-5" class="ml-5" id="welcome">
											<a href="./login/login.php" ><img src="../zoo/imagenes/iniciarsesion.png" id="iniciarsesion"></a>
											<a href="./registro/registro.php"><img src="../zoo/imagenes/registrarse.png" id="iniciarsesion"></a>
										</div>
									</div>
									
								</div>
								
							</div>							
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
			
			<script>
			function rotar_imagen(){
			var tiempo = 3000;//tiempo en milisegundos
			var arrImagenes = [
			'img_animales/image1.jpeg',
			'img_animales/image2.jpeg',
			'img_animales/image3.jpeg',
			'img_animales/image4.jpeg',
			'img_animales/image5.jpeg',
			'img_animales/image6.jpeg',
			'img_animales/image7.jpeg',
			'img_animales/image8.jpeg',
			'img_animales/image9.jpeg',
			'img_animales/image10.jpeg',
			'img_animales/image11.jpeg',
			'img_animales/image12.jpeg',
			'img_animales/image13.jpeg',
			'img_animales/image14.jpeg',
			];
			
			_img = document.getElementById('imagenes');
			
			//cargar la 1er imagen
			_img.src = arrImagenes[0];
			var i=1;
			setInterval(function(){
			_img.src = arrImagenes[i];
			i = (i == arrImagenes.length-1)? 0 : (i+1);
			}, tiempo);
			}
			</script>
		</div>
		<?php include("./administrador/include/footer.php"); ?>


	</body>
</html>