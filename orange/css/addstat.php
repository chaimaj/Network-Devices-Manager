<?php require_once('../connexion.php'); ?>
<html>
<head>

</head>
<body>
<?php

		
	
		// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
		$sql = 'INSERT INTO statistique VALUES("a", "a", "a", "a", "a","a","a","a","a", "a","a","a","a","a")';

		// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base
		mysql_close();
		
	

		
		//$err= "Les variables du formulaire ne sont pas declarees";
	//	echo "<center><font color=\"red\"> $err </font>";

?>
</body>
</html>