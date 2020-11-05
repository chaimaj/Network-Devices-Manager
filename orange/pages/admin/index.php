<?php
session_start();
if(!isset($_SESSION['myusername'])){
header("location:../../index.php");
}
?> 
<title>Accueil</title>
<?php include 'header.php'; 
?>

<div class="content">
<center>
			 <?php 
	require_once('../../connexion/connexion.php');	 
	$username=$_SESSION['myusername'];
	
	$sql = "SELECT nom, prenom FROM utilisateurs WHERE login='$username'";
	
	$result=mysql_query($sql);
	
	
	?>
    
	<h2><?php $row= mysql_fetch_assoc($result);
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		echo 'Bonjour '.$nom.' '.$prenom;
		?></h2>
        
        <h3> Vous êtes sur l'interface de Gestion des Equipements et Pannes de la Direction Réseaux et Services d'Orange.</br> Nous éspérons que vous passez une agréable journée :) !</h3>
        
        
        
        </center>
        </br></br></br></br>
        <center><img src="../../images/teaser-solutions-internet.14810.31.jpg"/></center>
        </br></br></br></br>
</div><!-- .content /-->
	
<!--?php include 'sidebar.php'; ?>-->
<?php include 'footer.php'; ?>