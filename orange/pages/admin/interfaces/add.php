<?php require_once('../../../connexion/connexion.php'); ?>


<?php
// on teste si les variables du formulaire sont bien d�clar�es
if (isset($_POST['node']) && isset($_POST['name']) && isset($_POST['type']) && isset($_POST['descr'])){

reset ($_POST);
while (list ($key, $val) = each ($_POST))
{  
 if (trim($val)=="")
     {
		require 'index.php';
       $string= "Le champs " . $key . " n'a pas �t� rempli!";
	   echo "<center><font color=\"red\"> $string </font>";
       exit;
     }
}

		// on ins�re le tuple (mysql_query) et au cas o�, on �crira un petit message d'erreur si la requ�te ne se passe pas bien (or die)
		$sql = 'INSERT INTO interface VALUES(NULL, "'.$_POST['node'].'", "'.$_POST['name'].'", "'.$_POST['type'].'", "'.$_POST['descr'].'")';

		// on ins�re le tuple (mysql_query) et au cas o�, on �crira un petit message d'erreur si la requ�te ne se passe pas bien (or die)
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion � la base
		mysql_close();

		echo 'Nous venons d\'ins�rer une nouvelle ligne : '.$_POST['node'].' '.$_POST['name'].' '.$_POST['type'].' .';
header("Location:index.php");
}
else {
		echo 'Les variables du formulaire ne sont pas d�clar�es';
}
?>
