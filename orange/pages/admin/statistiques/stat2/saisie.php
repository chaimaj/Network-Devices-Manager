

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

<a style="display:inline">Choisir la Criticite:</a>
<select name="crit" size"1">
<?php 
 require_once('../../../../connexion/connexion.php');

$requete=mysql_query("SELECT Distinct Severity  AS crit FROM statistique");
 while($row=mysql_fetch_array($requete)) {?>
	<option><?php echo $row['crit']; }?>

</select> 
  

<input  type="submit" value="Valider" />
</form>
</div>

