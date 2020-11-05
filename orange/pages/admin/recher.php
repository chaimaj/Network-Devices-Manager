<?php include 'header.php'; ?>

<title>Résultats</title>
<div style="font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;">

<?php


	
	
try
{
    $bdd = mysql_connect("localhost","root","");
	mysql_select_db("orange",$bdd);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$a=$_POST['filtre'];

$total=0;

// on teste si les variables du formulaire sont bien déclarées
if (isset($_POST['filtre']) && isset($_POST['type1']) && isset($_POST['type2']) && trim($a)!=""){

$a=$_POST['filtre'];


//------------------------------------------------------------------
//CAS RECHERCHE DE CLIENT ET ROUTEUR PAR NOM DANS TOUT LES DOMAINES
//------------------------------------------------------------------
if($_POST['type1']=="all" && $_POST['type2']=="nom")
{


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE WIMAX
$reponse = mysql_query("SELECT * FROM wimax where Zone Like '%$a%' OR Nom Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Wimax </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Zone</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Secteur</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Nombre de clients</font></th>
	    <th height='50' bgcolor='#F87731'><font size='4'>Criticité</font></th>
		
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Zone']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Secteur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nombre_de_clients']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Criticite']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE VSAT
$reponse = mysql_query("SELECT * FROM vsat where ST Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Vsat </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>ST</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Debit</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Type</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ST']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['DEBIT']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['type_vsat']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE IPADSL
$reponse = mysql_query("SELECT * FROM ip_adsl where Name Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine IP-ADSL </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>	
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE LS/FR
$reponse = mysql_query("SELECT * FROM ls_fr where Name Like '%$a%' OR Nom_Client Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine LS/FR </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Interface</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Client</font></th>
	    <th height='50' bgcolor='#F87731'><font size='4'>LS</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>FR</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Interface']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_Client']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['LS']==1){echo "Oui";}elseif($donnees['LS']==0){echo "Non";}else{echo"-";}
echo "</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['FR']==1){echo "Oui";}elseif($donnees['FR']==0){echo "Non";}else{echo"-";}
echo "</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE ROUTEURBB
$reponse = mysql_query("SELECT * FROM routeurbb where nom_routeur Like '%$a%' ",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Routeur Backbone </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Criticite</font></th>	
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['nom_routeur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ip_address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['criticite']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE INTERFACE
$reponse = mysql_query("SELECT * FROM interface where Hosted_On_Node Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Interfaces </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Interface</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Type</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Description</font></th>
		
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Hosted_On_Node']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ifName']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ifType']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ifDescr']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE ADSLPRO
$reponse = mysql_query("SELECT * FROM adslpro where Nom_client Like '%$a%' OR Centrale Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine ADSL PRO </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Numero</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Debit</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Centrale</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_client']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['N']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['D']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Centrale']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE ADSL ENTREPRISE
$reponse = mysql_query("SELECT * FROM adsl_entreprise where Nom_routeur Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine ADSL Entreprise </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>		
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_routeur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Adresse_IP']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE BOUTIQUE OTN
$reponse = mysql_query("SELECT * FROM boutiques_otn where Name Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Boutiques OTN </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE ENTREPRISE GLOB
$reponse = mysql_query("SELECT * FROM entreprise_glob where Name Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Entreprise Globale </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
";

}
echo"</table>";
}



}
//------------------------------------------------------------------
//CAS RECHERCHE DE ROUTEUR UNIQUEMENT PAR NOM DANS TOUT LES DOMAINES
//------------------------------------------------------------------
elseif($_POST['type1']=="routeur" && $_POST['type2']=="nom")
{
	
	//RECHERCHE DE ROUTEUR DANS LA TABLE WIMAX
$reponse = mysql_query("SELECT * FROM wimax where Nom Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Wimax </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Zone</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Secteur</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Nombre de clients</font></th>
	    <th height='50' bgcolor='#F87731'><font size='4'>Criticité</font></th>
		
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Zone']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Secteur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nombre_de_clients']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Criticite']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE IPADSL
$reponse = mysql_query("SELECT * FROM ip_adsl where Name Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine IP-ADSL </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>	
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE LS/FR
$reponse = mysql_query("SELECT * FROM ls_fr where Name Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine LS/FR </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Interface</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Client</font></th>
	    <th height='50' bgcolor='#F87731'><font size='4'>LS</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>FR</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Interface']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_Client']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['LS']==1){echo "Oui";}elseif($donnees['LS']==0){echo "Non";}else{echo"-";}
echo "</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['FR']==1){echo "Oui";}elseif($donnees['FR']==0){echo "Non";}else{echo"-";}
echo "</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE ROUTEURBB
$reponse = mysql_query("SELECT * FROM routeurbb where nom_routeur Like '%$a%' ",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Routeur Backbone </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Criticite</font></th>	
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['nom_routeur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ip_address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['criticite']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE INTERFACE
$reponse = mysql_query("SELECT * FROM interface where Hosted_On_Node Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Interfaces </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Interface</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Type</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Description</font></th>
		
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Hosted_On_Node']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ifName']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ifType']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ifDescr']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE ADSLPRO
$reponse = mysql_query("SELECT * FROM adslpro where Centrale Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine ADSL PRO </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Numero</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Debit</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Centrale</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_client']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['N']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['D']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Centrale']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE ADSL ENTREPRISE
$reponse = mysql_query("SELECT * FROM adsl_entreprise where Nom_routeur Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine ADSL Entreprise </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>		
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_routeur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Adresse_IP']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE BOUTIQUE OTN
$reponse = mysql_query("SELECT * FROM boutiques_otn where Name Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Boutiques OTN </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE ENTREPRISE GLOB
$reponse = mysql_query("SELECT * FROM entreprise_glob where Name Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Entreprise Globale </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
";

}
echo"</table>";
}

	
	
	
	
	
}
//------------------------------------------------------------------
//CAS RECHERCHE DE CLIENT PAR NOM DANS TOUT LES DOMAINES
//------------------------------------------------------------------
if($_POST['type1']=="client" && $_POST['type2']=="nom")
{




//RECHERCHE DE CLIENT DANS LA TABLE VSAT
$reponse = mysql_query("SELECT * FROM vsat where ST Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Vsat </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>ST</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Debit</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Type</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ST']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['DEBIT']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['type_vsat']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT DANS LA TABLE LS/FR
$reponse = mysql_query("SELECT * FROM ls_fr where Nom_Client Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine LS/FR </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Interface</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Client</font></th>
	    <th height='50' bgcolor='#F87731'><font size='4'>LS</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>FR</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Interface']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_Client']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['LS']==1){echo "Oui";}elseif($donnees['LS']==0){echo "Non";}else{echo"-";}
echo "</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['FR']==1){echo "Oui";}elseif($donnees['FR']==0){echo "Non";}else{echo"-";}
echo "</b></td>
</tr>
";

}
echo"</table>";
}




//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE INTERFACE
$reponse = mysql_query("SELECT * FROM interface where Hosted_On_Node Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Interfaces </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Interface</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Type</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Description</font></th>
		
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Hosted_On_Node']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ifName']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ifType']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ifDescr']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT DANS LA TABLE ADSLPRO
$reponse = mysql_query("SELECT * FROM adslpro where Nom_client Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine ADSL PRO </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Numero</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Debit</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Centrale</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_client']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['N']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['D']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Centrale']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE ENTREPRISE GLOB
$reponse = mysql_query("SELECT * FROM entreprise_glob where Name Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Entreprise Globale </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
";

}
echo"</table>";
}



}
//------------------------------------------------------------------
//CAS RECHERCHE DE CLIENT ET ROUTEUR PAR IP DANS TOUT LES DOMAINES
//------------------------------------------------------------------
elseif($_POST['type1']=="all" && $_POST['type2']=="ip")
{

//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE IPADSL
$reponse = mysql_query("SELECT * FROM ip_adsl where IP_Address Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine IP-ADSL </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>	
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE LS/FR
$reponse = mysql_query("SELECT * FROM ls_fr where IP_Address Like '%$a%' OR Nom_Client Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine LS/FR </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Interface</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Client</font></th>
	    <th height='50' bgcolor='#F87731'><font size='4'>LS</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>FR</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Interface']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_Client']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['LS']==1){echo "Oui";}elseif($donnees['LS']==0){echo "Non";}else{echo"-";}
echo "</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['FR']==1){echo "Oui";}elseif($donnees['FR']==0){echo "Non";}else{echo"-";}
echo "</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE ROUTEURBB
$reponse = mysql_query("SELECT * FROM routeurbb where ip_address Like '%$a%' ",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Routeur Backbone </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Criticite</font></th>	
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['nom_routeur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ip_address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['criticite']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE ADSL ENTREPRISE
$reponse = mysql_query("SELECT * FROM adsl_entreprise where Adresse_IP Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine ADSL Entreprise </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>		
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_routeur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Adresse_IP']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE BOUTIQUE OTN
$reponse = mysql_query("SELECT * FROM boutiques_otn where IP_Address Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Boutiques OTN </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE ENTREPRISE GLOB
$reponse = mysql_query("SELECT * FROM entreprise_glob where IP_Address Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Entreprise Globale </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
";

}
echo"</table>";
}



}
//------------------------------------------------------------------
//CAS RECHERCHE DE ROUTEUR UNIQUEMENT PAR IP DANS TOUT LES DOMAINES
//------------------------------------------------------------------
elseif($_POST['type1']=="routeur" && $_POST['type2']=="ip")
{
	


//RECHERCHE DE ROUTEUR DANS LA TABLE IPADSL
$reponse = mysql_query("SELECT * FROM ip_adsl where IP_Address Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine IP-ADSL </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>	
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE LS/FR
$reponse = mysql_query("SELECT * FROM ls_fr where IP_Address Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine LS/FR </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Interface</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Client</font></th>
	    <th height='50' bgcolor='#F87731'><font size='4'>LS</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>FR</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Interface']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_Client']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['LS']==1){echo "Oui";}elseif($donnees['LS']==0){echo "Non";}else{echo"-";}
echo "</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['FR']==1){echo "Oui";}elseif($donnees['FR']==0){echo "Non";}else{echo"-";}
echo "</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE ROUTEURBB
$reponse = mysql_query("SELECT * FROM routeurbb where ip_address Like '%$a%' ",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Routeur Backbone </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Criticite</font></th>	
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['nom_routeur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['ip_address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['criticite']."</b></td>
</tr>
";

}
echo"</table>";
}




//RECHERCHE DE ROUTEUR DANS LA TABLE ADSL ENTREPRISE
$reponse = mysql_query("SELECT * FROM adsl_entreprise where Adresse_IP Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine ADSL Entreprise </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>		
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_routeur']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Adresse_IP']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE BOUTIQUE OTN
$reponse = mysql_query("SELECT * FROM boutiques_otn where IP_Address Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Boutiques OTN </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
</tr>
";

}
echo"</table>";
}


//RECHERCHE DE ROUTEUR DANS LA TABLE ENTREPRISE GLOB
$reponse = mysql_query("SELECT * FROM entreprise_glob where IP_Address Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Entreprise Globale </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
";

}
echo"</table>";
}

	
	
	
	
	
}
//------------------------------------------------------------------
//CAS RECHERCHE DE CLIENT PAR IP DANS TOUT LES DOMAINES
//------------------------------------------------------------------
if($_POST['type1']=="client" && $_POST['type2']=="ip")
{




//RECHERCHE DE CLIENT DANS LA TABLE LS/FR
$reponse = mysql_query("SELECT * FROM ls_fr where IP_Address Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine LS/FR </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Interface</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Client</font></th>
	    <th height='50' bgcolor='#F87731'><font size='4'>LS</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>FR</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Interface']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Nom_Client']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['LS']==1){echo "Oui";}elseif($donnees['LS']==0){echo "Non";}else{echo"-";}
echo "</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>";
if($donnees['FR']==1){echo "Oui";}elseif($donnees['FR']==0){echo "Non";}else{echo"-";}
echo "</b></td>
</tr>
";

}
echo"</table>";
}






//RECHERCHE DE CLIENT ET ROUTEUR DANS LA TABLE ENTREPRISE GLOB
$reponse = mysql_query("SELECT * FROM entreprise_glob where IP_Address Like '%$a%'",$bdd);
$nbre = mysql_num_rows($reponse);
if ($nbre>0){
$total=$total+$nbre;
echo "</br></br><h2> Résultat(s) dans le domaine Entreprise Globale </h2></br>";

echo "<table width='100%' style='border-collapse:collapse;'>
	<tr>
		<th height='50' bgcolor='#F87731'><font size='4'>Nom</font></th>
		<th height='50' bgcolor='#F87731'><font size='4'>Adresse IP</font></th>
	</tr>";
while ($donnees = mysql_fetch_assoc($reponse))
{
	
	echo "
<tr>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['Name']."</b></td>
<td height='40' width='123' bgcolor='#f6ba9a' align='center'> <b><font size='4'>".$donnees['IP_Address']."</b></td>
";

}
echo"</table>";
}



}

if($total==0)
{
	echo "<center>Aucun résultat! Vérifiez votre entrée, sinon peut-être devriez vous mettre à jour la base</center>";
	header('Refresh: 3; URL=http://localhost/orange/pages/admin/rechercherouteur-index.php');
	
}
	
	
}

if(trim($a)=="")
{
	echo "<center>Veuillez saisir un mot-clef!</center>";
	header('Location:rechercherouteur-index.php');
}

?>
</div>
<?php include 'footer.php'; ?>