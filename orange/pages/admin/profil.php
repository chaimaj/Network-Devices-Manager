	 <?php 
	require_once('../../connexion/connexion.php');
	session_start();	 
	$username=$_SESSION['myusername'];
	
	$sql = "SELECT * FROM utilisateurs WHERE login='$username'";
	
	$result=mysql_query($sql);
	
	
	?>
    <title>Profil</title>
    <script type="text/javascript">

var fieldalias = "mot de passe"

function verify(element1,element2,element3,element4)
{
	var passed=false
	

	if(element3.value=='')
	{
		alert("Veuillez entrer votre "+fieldalias+"! ")
		
		element3.focus()
		}
		
	else if(element1.value!=element2.value)
	{
		alert("Les deux nouveaux "+fieldalias+" ne concordent pas")
		
		element1.focus()
	}
	else if(element3.value!=element4.value)
	{
		alert("Ancien mot de passe eronne!")
		
		element3.focus()
	}
	else
	passed=true
	return passed
	
}
</script>
	<?php $row= mysql_fetch_assoc($result);
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$login=$row['login'];
		$pass=$row['password'];
		$mail=$row['mail'];
		if($row['admin']==1)
		{
			$role="admin";
		}
		else $role="utilisateur";
		
		?>

<div id="add" style="float:left; width:100%; margin-top:20px;font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;">
<div id="one" style="float:left; width:45%;height:440px; style="margin:20px;"">
        <div style="margin:20px;">
<h2>Infos</h2></br>
Nom : <h3><?php echo $nom ?></h3></br>
Prenom : <h3><?php echo $prenom ?></h3> </br>
<p>Login :<h3> <?php echo $login ?></h3> </p></br>
<p>Mail :<h3> <?php echo $mail ?></h3> </p></br>
<p>Role :<h3> <?php echo $role ?></h3> </p></br>
		</div>


</div>

<div div id="file" style="width: 50%;
height: 440px;
float: right;
vertical-align: middle;
border-left-color: rgba(0, 0, 0, 0.3);
border-left-style: solid;
border-left-width: 3px;
margin: auto;">

<form name="updateprofile" onSubmit="return verify(this.password1,this.password2,this.password0,this.pass)" method="post" action="updateprofile.php" style="margin:20px;">
<p><h2>Modifier :</h2></p>
<p><h3>Nom : </h3><input type="text" value="<?php echo $nom ; ?>" name="nom"> </p> 
<p><h3>Prenom :</h3><input type="text" value="<?php echo $prenom ; ?>" name="prenom"> </p> 
<p><h3>Login :</h3><input type="text" name="login" value="<?php echo $login ; ?>" readonly="readonly"> </p> 
<p><h3>Mail :</h3><input type="text" value="<?php echo $mail ; ?>" name="mail">
<input type="hidden" name="pass" value="<?php echo $pass ; ?>" display="false"/> </p> 
<p><h3>Mot de passe :</h3><input type="password" name="password0"> </p> 
<p><h3>Nouveau mot de passe :</h3><input type="password" name="password1"> </p> 
<p><h3>Confirmez mot de passe :</h3><input type="password" name="password2"> </p>
</br></br>
<p><input type="submit" name="valider"  value="Valider" /></p>
</form>



</div>
</div>