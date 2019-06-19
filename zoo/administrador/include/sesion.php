<?php
	session_start();
	if ($_SESSION["tipo"]!='admin') {
		session_destroy();
		header("Location: ../../login/login.php");
	}
?>