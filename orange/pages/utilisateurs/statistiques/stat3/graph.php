<?php require_once('../../../../connexion/connexion.php'); ?>
<?php

include ("../mois.php");


$debut= $annee."-".$m."-01";
$fin= $annee."-".$m."-".$j;


$rout=$_POST['node'];
$critic="Critical";

if ($rout=="Tout"){
$requete=mysql_query('SELECT (@date:=Last_Occurrence_Time) AS date, COUNT(*) AS critic FROM statistique WHERE Severity LIKE "'.$critic.'" AND Last_Occurrence_Time BETWEEN "'.$debut.'" AND "'.$fin.'"  GROUP BY Last_Occurrence_Time');
}

else {
$requete=mysql_query('SELECT (@date:=Last_Occurrence_Time) AS date, COUNT(*) AS critic FROM statistique WHERE Severity LIKE "'.$critic.'" AND Source_Node LIKE "'.$rout.'" AND Last_Occurrence_Time BETWEEN "'.$debut.'" AND "'.$fin.'" GROUP BY Last_Occurrence_Time ');
}

while($row=mysql_fetch_array($requete)){

		$tableau[]=array('d'=>$row['date'],'v'=>$row['critic']);

   }

if($tableau){
$i=1;
$f=0;
while ($i<=$j) {
	if ($i<10)
	$parcour=$annee."-".$m."-0".$i;
	else
	$parcour=$annee."-".$m."-".$i;
	$k=$i-($f+1);
	
	if ($tableau[$k]['d']==$parcour){
		
		$nouveauTab[]=$tableau[$k];// on remplit le tableau intermédiaire
		
	}
	else {
	$nouveauTab[]=array('d'=>$parcour,'v'=>0);
	$f++;
}
$i++;
}
}
session_start();
$_SESSION['tab']=serialize($nouveauTab);
header ("Location:index.php" .SID);

?>