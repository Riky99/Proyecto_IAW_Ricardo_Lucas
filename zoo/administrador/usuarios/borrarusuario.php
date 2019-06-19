<?php
	$connection = new mysqli("localhost", "root", "Admin2015", "zoo", "3316" );
		if ($connection->connect_errno) {
			printf("Connection failed: %s\n", $connection->connect_error);
		exit();
}
$consulta = "DELETE FROM usuarios WHERE idUsuario = ".$_GET['idUsuario'];
echo $consulta;
$result = $connection->query($consulta);
if (!$result) {
	echo "error";
} else {
	header('Location: usuarios.php');
}

?>