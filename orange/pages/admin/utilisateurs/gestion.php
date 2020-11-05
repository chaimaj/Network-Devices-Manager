<div id="add" style="float:left; width:100%; margin-top:20px;">
<div id="one" style="float:left; width:45%;">
<center><h2> Nouveau compte<br />
</h2></center>

<form name="ajoutUser" method="post" action="add.php" style="margin-top:10px;">
  <table border="0" width="100%">
<tr>
<td width="40%">Nom d'utilisateur : </td>
<td width="60%"><center>
  <input type="text" name="login"/></td>
</tr>
<tr>
<td>Mot de passe : </td>
<td><center>   
  <input type="password" name="password"
/></center></td>
</tr>
<tr>
<td>Nom : </td>
<td><center><input type="text" name="nom"/><center></td>
</tr>
<tr>
<td>
Prenom : 
</td>
<td><center><input type="text" name="prenom"/><center></td>
</tr>
<tr>
<td>Mail : </td>
<td>
    <center>
    <input type="email" name="mail"/></td>
</tr>
<tr>
<td>Role : </td>
<td><center>
		<select name="num" onChange="combo(this,'num')">
            <option>administrateur</option>
            <option>utilisateur</option>
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

