<?php require_once('../../../connexion/connexion.php'); ?>


<?php
// on teste si les variables du formulaire sont bien déclarées
if (isset($_POST['name']) && isset($_POST['ip'])){

reset ($_POST);
while (list ($key, $val) = each ($_POST))
{  
 if (trim($val)=="")
     {
		require 'index.php';
       $string= "Le champs " . $key . " n'a pas été rempli!";
	   echo "<center><font color=\"red\"> $string </font>";
       exit;
     }
}

		// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
		$sql = 'INSERT INTO ip_adsl VALUES(NULL, "'.$_POST['name'].'", "'.$_POST['ip'].'")';

		// on insère le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base
		mysql_close();

		echo 'Nous venons d\'insérer une nouvelle ligner : '.$_POST['name'].' '.$_POST['ip'].' .';
header("Location:index.php");
}
else {
		echo 'Les variables du formulaire ne sont pas déclarées';
}
?>
