<?php
	$connection = new mysqli("localhost", "root", "Admin2015", "zoo", "3316" );
		if ($connection->connect_errno) {
			printf("Connection failed: %s\n", $connection->connect_error);
		exit();
}
$consulta = "DELETE FROM animal WHERE idAnimal = ".$_GET['idAnimal'];
echo $consulta;
$result = $connection->query($consulta);
if (!$result) {
	echo "error";
} else {
	header('Location: animales.php');
}

?>