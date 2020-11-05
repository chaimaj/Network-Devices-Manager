<div id="add" style="float:left; width:100%; margin-top:20px;">
<div id="one" style="float:left; width:45%;">
<center><h2> Nouveau<br />
</h2></center>
<form name="ajout" method="post" action="add.php" style="margin-top:10px;">
  <table border="0" width="100%">
<tr>
<td width="40%">Zone : </td>
<td width="60%"><center>
  <input type="text" name="zone"/></td>
</tr>
<tr>
<td>Secteur : </td>
<td><center>   
  <input type="text" name="secteur"
/></center></td>
</tr>
<tr>
<td>Nom : </td>
<td><center><input type="text" name="nom"/><center></td>
</tr>
<tr>
<td>
Nombre de clients : 
</td>
<td><center><input type="number" name="nbclient"/><center></td>
</tr>
<tr>
<td>Criticite : </td>
<td><center>
		<select name="criticite" onChange="combo(this,'criticite')">
            <option>high</option>
            <option>low</option>
            </select>
            
      <center></td>
</tr>

</table><br /><br />
<input type="submit" value="Valider" />
</form>
</div>

<div id="file" style="width: 50%;
height: 250px;
float: right;
vertical-align: middle;
border-left-color: rgba(0, 0, 0, 0.3);
border-left-style: solid;
border-left-width: 3px;
margin: auto;">
<center>
<h2> Ajout &agrave; partir d'un fichier (*.csv).<br />
</h2>
</center>
<form action="loadcsv.php" method="post" enctype="multipart/form-data" style="
    margin-top: 100px; margin-left: 100px;">
<label for="file">Fichier:</label>
<input type="file" name="file" id="file"></br></br></br>
<center><input type="submit" name="submit" value="Envoyer"> </center>
</form>
</div>
</div>

<div style="height:20px;"></div>

<div id="wrap" style="float:left;">
<?php include 'liste.php';?>
		 </div>

