<?php require_once('../../../connexion/connexion.php'); ?>


<?php
// on teste si les variables du formulaire sont bien d�clar�es
if (isset($_POST['name']) && isset($_POST['ip']) && isset($_POST['interface']) && isset($_POST['nomclient']) &&
 isset($_POST['ls'])&&
 isset($_POST['fr'])){

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


if($_POST['ls']=="Oui")
{
	
	$_POST['ls']=1;
	
	}
	else	
	{
	
	$_POST['ls']=0;
	
	}
	
	if($_POST['fr']=="Oui")
{
	
	$_POST['fr']=1;
	
	}
	else	
	{
	
	$_POST['fr']=0;
	
	}
		// on ins�re le tuple (mysql_query) et au cas o�, on �crira un petit message d'erreur si la requ�te ne se passe pas bien (or die)
		$sql = 'INSERT INTO ls_fr VALUES(NULL, "'.$_POST['name'].'", "'.$_POST['ip'].'", "'.$_POST['interface'].'", "'.$_POST['nomclient'].'", "'.$_POST['ls'].'", "'.$_POST['fr'].'")';

		// on ins�re le tuple (mysql_query) et au cas o�, on �crira un petit message d'erreur si la requ�te ne se passe pas bien (or die)
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion � la base
		mysql_close();

		echo 'Nous venons d\'ins�rer une nouvelle ligne : '.$_POST['name'].' '.$_POST['ip'].' '.$_POST['interface'].' '.$_POST['nomclient'].' .';
header("Location:index.php");
}
else {
		echo 'Les variables du formulaire ne sont pas d�clar�es';
}
?>
