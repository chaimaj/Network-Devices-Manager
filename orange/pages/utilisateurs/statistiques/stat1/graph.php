<?php require_once('../../../../connexion/connexion.php'); ?>

<?php
include ("../mois.php");


$debut= $annee."-".$m."-01";
$fin= $annee."-".$m."-".$j;
$ne=$_POST['domaine'];
$vsat="%VSAT%";
$bb="%BB%";
$ip="%IP%";
$x="%-%";
$otn="%OTN%";

if ($ne=="Tout"){
	$requete=mysql_query('SELECT Last_Occurrence_Time AS date, COUNT(*) AS vsat FROM statistique WHERE Noeud_OSS LIKE "%VSAT%" GROUP BY Last_Occurrence_Time');
	$requete1=mysql_query('SELECT Last_Occurrence_Time AS date, COUNT(*) AS ip FROM statistique WHERE Noeud_OSS LIKE "%IP%" GROUP BY Last_Occurrence_Time');
	$requete2=mysql_query('SELECT Last_Occurrence_Time AS date, COUNT(*) AS bb FROM statistique WHERE Noeud_OSS LIKE "%BB%" GROUP BY Last_Occurrence_Time');
	$requete3=mysql_query('SELECT Last_Occurrence_Time AS date, COUNT(*) AS otn FROM statistique WHERE Noeud_OSS LIKE "%OTN%" GROUP BY Last_Occurrence_Time');
	$requete4=mysql_query('SELECT Last_Occurrence_Time AS date, COUNT(*) AS x FROM statistique WHERE Noeud_OSS LIKE "-" GROUP BY Last_Occurrence_Time');
	
	
while($row=mysql_fetch_array($requete)){
$tableau[$row['date']]= $row['vsat'];
}
while($row=mysql_fetch_array($requete1)){
$tableau1[$row['date']]= $row['ip'];
}
while($row=mysql_fetch_array($requete2)){
$tableau2[$row['date']]= $row['bb'];
}
while($row=mysql_fetch_array($requete3)){
$tableau3[$row['date']]= $row['otn'];
}
while($row=mysql_fetch_array($requete4)){
$tableau4[$row['date']]= $row['x'];
}
$date = $debut;

$nouveauTab = array();
while (strtotime($date) <= strtotime($fin)) {

	if( isset( $tableau[$date]) ) $v = $tableau[$date] ; else $v = 0;
	if( isset( $tableau1[$date]) ) $ip = $tableau1[$date] ; else $ip = 0;
	if( isset( $tableau2[$date]) ) $bb = $tableau2[$date] ; else $bb = 0;
	if( isset( $tableau3[$date]) ) $otn = $tableau3[$date] ; else $otn = 0;
	if( isset( $tableau4[$date]) ) $x = $tableau4[$date] ; else $x = 0;
	
	$nouveauTab[] = array('d'=> $date,'vsat' => $v, 'ip' => $ip , 'bb' => $bb, 'otn'=>$otn, 'x'=>$x);
	
	$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
}


session_start();
$_SESSION['tab']=serialize($nouveauTab);

header ("Location:indexTout.php" .SID);
}
else{
$requete=mysql_query('SELECT Last_Occurrence_Time AS date, COUNT(*) AS ne FROM statistique WHERE Noeud_OSS LIKE "'.$ne.'" GROUP BY Last_Occurrence_Time');

while ($row=mysql_fetch_array($requete)){

		$tableau[]=array('d'=>$row['date'],'ne'=>$row['ne']);

   }

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
	$nouveauTab[]=array('d'=>$parcour,'ne'=>0);
	$f++;
}
$i++;

}

session_start();
$_SESSION['tab']=serialize($nouveauTab);

header ("Location:index.php" .SID);
}

?>