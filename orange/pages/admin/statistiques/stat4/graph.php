<?php require_once('../../../../connexion/connexion.php'); ?>
<?php

include ("../mois.php");


$debut= $annee."-".$m."-01";
$fin= $annee."-".$m."-".$j;
$ne=$_POST['domaine'];
$matin="Matin";
$midi="A-Midi";
$nuit="Nuit";
$supp="%Support%";
echo $ne;
if ($ne=="Tout"){
	$requete=mysql_query('SELECT (@date:=Last_Occurrence_Time)  AS date, COUNT(*) AS matin FROM statistique WHERE  Assigned_To LIKE "'.$supp.'" AND Shift LIKE "'.$matin.'" AND Last_Occurrence_Time BETWEEN "'.$debut.'" AND "'.$fin.'" GROUP BY Last_Occurrence_Time');

$requete1=mysql_query('SELECT (@date:=Last_Occurrence_Time)  AS date, COUNT(*) AS midi FROM statistique WHERE  Assigned_To LIKE "'.$supp.'" AND Shift LIKE "'.$midi.'" AND Last_Occurrence_Time BETWEEN "'.$debut.'" AND "'.$fin.'" GROUP BY  Last_Occurrence_Time');

$requete2=mysql_query('SELECT (@date:=Last_Occurrence_Time)  AS date, COUNT(*) AS nuit FROM statistique WHERE  Assigned_To LIKE "'.$supp.'" AND Shift LIKE "'.$nuit.'" AND Last_Occurrence_Time BETWEEN "'.$debut.'" AND "'.$fin.'" GROUP BY  Last_Occurrence_Time');
}else{
	
$requete=mysql_query('SELECT (@date:=Last_Occurrence_Time)  AS date, COUNT(*) AS matin FROM statistique WHERE  Assigned_To LIKE "'.$supp.'" AND Shift LIKE "'.$matin.'"  AND Noeud_OSS LIKE "'.$_POST['domaine'].'" AND Last_Occurrence_Time BETWEEN "'.$debut.'" AND "'.$fin.'" GROUP BY  Last_Occurrence_Time');
	
$requete1=mysql_query('SELECT (@date:=Last_Occurrence_Time)  AS date, COUNT(*) AS midi FROM statistique WHERE  Assigned_To LIKE "'.$supp.'" AND Shift LIKE "'.$midi.'"  AND Noeud_OSS LIKE "'.$_POST['domaine'].'" AND Last_Occurrence_Time BETWEEN "'.$debut.'" AND "'.$fin.'" GROUP BY  Last_Occurrence_Time');

$requete2=mysql_query('SELECT (@date:=Last_Occurrence_Time)  AS date, COUNT(*) AS nuit FROM statistique WHERE  Assigned_To LIKE "'.$supp.'" AND Shift LIKE "'.$nuit.'"  AND Noeud_OSS LIKE "'.$_POST['domaine'].'" AND Last_Occurrence_Time BETWEEN "'.$debut.'" AND "'.$fin.'" GROUP BY  Last_Occurrence_Time');
	
}
while($row=mysql_fetch_array($requete)){
$tableau[$row['date']]= $row['matin'];
}
while($row=mysql_fetch_array($requete1)){
$tableau1[$row['date']]= $row['midi'];
}
while($row=mysql_fetch_array($requete2)){
$tableau2[$row['date']]= $row['nuit'];
}
$date = $debut;

$fusion = array();
while (strtotime($date) <= strtotime($fin)) {

	if( isset( $tableau[$date]) ) $m = $tableau[$date] ; else $m = 0;
	if( isset( $tableau1[$date]) ) $a = $tableau1[$date] ; else $a = 0;
	if( isset( $tableau2[$date]) ) $n = $tableau2[$date] ; else $n = 0;
	
	$fusion[] = array('d'=> $date,'m' => $m, 'a' => $a , 'n' => $n);
	
	$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
}


session_start();
$_SESSION['tab']=serialize($fusion);

//print_r($nouveauTab); 
header ("Location:index.php" .SID);

?>