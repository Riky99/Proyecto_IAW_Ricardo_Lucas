<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<?php
        var_dump($_GET);
        
        // $_GET is always set. We check if it contains anything
        // If $_GET is empty (does not contains anything)
       if (empty($_GET)) {
         //Showing a message telling the user that $_GET is empty
         //probably because the user doesn't came from get_source.php
         echo "NOTHING HAS BEEN SENT";
       } else {
         //If $_GET contains anything (probably coming from get_source.php)
         //I dump the variable into the screen showing the content
         echo "nombre:".$_GET['nombre'];
         
       }
      ?>
	
</body>
</html>