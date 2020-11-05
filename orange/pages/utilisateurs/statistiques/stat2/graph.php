<?php require_once('../../../../connexion/connexion.php'); ?>
<?php

include ("../mois.php");


$debut= $annee."-".$m."-01";
$fin= $annee."-".$m."-".$j;
$critic=$_POST['crit'];

$requete=mysql_query('SELECT Last_Occurrence_Time,Noeud_OSS AS node,COUNT(*) AS critic FROM statistique WHERE Severity LIKE "'.$critic.'" AND Last_Occurrence_Time BETWEEN "'.$debut.'" AND "'.$fin.'" GROUP BY Noeud_OSS');


  while($row=mysql_fetch_array($requete)){

		$tableau[]=array('n'=>$row['node'],'v'=>$row['critic']);

   }

session_start();
$_SESSION['tab']=serialize($tableau);

header ("Location:index.php" .SID);

?>