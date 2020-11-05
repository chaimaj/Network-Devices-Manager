

<div style="display:inline">
<a style="display:inline">Choisir le mois:</a>
<form style="display:inline"  method="post" action="graph.php">
<select name="mois" size="1">
<option>Janvier
<option>Fevrier
<option>Mars
<option>Avril
<option>Mai
<option>Juin
<option>Juillet
<option>Aout
<option>Septembre
<option>Octobre
<option>Novembre
<option>Decembre
</select>
<select name="annee" size="1">
<?php for ($k=2010;$k<=2050;$k++) {?>
<option><?php echo $k; }?>
</select>

<a style="display:inline">Choisir le Routeur:</a>
<select name="node" size"1">
<option>Tout
<?php 
 require_once('../../../../connexion/connexion.php');

$requete=mysql_query("SELECT Distinct Source_Node AS node FROM statistique");
 while($row=mysql_fetch_array($requete)) {?>
	<option><?php echo $row['node']; }?>

</select> 
  
<input  type="submit" value="Valider" />
</form>
</div>

