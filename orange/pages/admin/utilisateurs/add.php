<?php require_once('../../../connexion/connexion.php'); ?>


<?php
// on teste si les variables du formulaire sont bien d�clar�es
if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['prenom']) &&
 isset($_POST['mail']) && isset($_POST['num'])){

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
if($_POST['num']=="administrateur")
{
	
	$_POST['num']=1;
	
	}
	else	
	{
	
	$_POST['num']=0;
	
	}
		// on ins�re le tuple (mysql_query) et au cas o�, on �crira un petit message d'erreur si la requ�te ne se passe pas bien (or die)
		$sql = 'INSERT INTO utilisateurs VALUES(NULL, "'.$_POST['login'].'", "'.$_POST['password'].'", "'.$_POST['nom'].'", "'.$_POST['prenom'].'", "'.$_POST['mail'].'", "'.$_POST['num'].'")';

		// on ins�re le tuple (mysql_query) et au cas o�, on �crira un petit message d'erreur si la requ�te ne se passe pas bien (or die)
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion � la base
		mysql_close();

		echo 'Nous venons d\'ins�rer un nouvel utilisateur : '.$_POST['nom'].'  '.$_POST['prenom'].'';
header("Location:index.php");
}
else {
		echo 'Les variables du formulaire ne sont pas d�clar�es';
}
?>
