<?php
session_start();
if(!isset($_SESSION['myusername'])){
header("location:../../index.php");
}
?> 


<?php include 'header.php'; ?>

<div class="content">
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
        
        <h3> Vous �tes sur l'interface de Gestion des Equipements et Pannes de la Direction R�seaux et Services d'Orange. Nous �sp�rons que vous passez une agr�able journ�e :) !</h3>
</div><!-- .content /-->
	
<!--?php include 'sidebar.php'; ?>-->
<?php include 'footer.php'; ?>