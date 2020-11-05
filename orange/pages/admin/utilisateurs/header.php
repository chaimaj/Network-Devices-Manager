<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../../../css/style.css" rel="stylesheet" type="text/css" />
<script src="../../../scripts/jquery.min.js"></script>
<link rel="icon" href="../../../favicon.ico" />
</head>

<body align="center" >
<a href="../../../logout.php" class="return">&laquo; Logout</a>
	<div class="top-black"></div>
    
	<div class="wrapper">
		<header style="width:1000px; margin:auto;">
        	<div id="top-nav-anchor"></div>
			<div id="top-nav" class="top-nav">
				
					

			</div><!-- .top-menu /-->

<script>
function sticky_relocate() {
 
  var window_top = $(window).scrollTop();
  var div_top = $('#main-nav-anchor').offset().top;
  if (window_top > div_top) {
    $('#main-nav').addClass('stick');
	
	//document.getElementById('menu-item-4653').style.display = "block";
	//document.getElementById('menu-item-4653').style.width = "30px";
  } else {
    $('#main-nav').removeClass('stick');
	
	//document.getElementById('menu-item-4653').style.display = "none";
  }
}

$(function() {
  $(window).scroll(sticky_relocate);
  sticky_relocate();
});
</script>


            
		<div class="header-content">
        
		  <div align="center" class="logo"><!-- logo--> 
 
			<a href="index.php"><img src="../../../images/logo.jpg" /></a>

		  </div><!-- .logo /-->
			
		
		</div>	
			<div id="main-nav-anchor"></div>
			<nav id="main-nav" align="center">
				<table width="100%" align="center">
                          <tr>
                            <td width="10%" align="center"><a href="../index.php">ACCUEIL</a></td>
                            
                            
                            <td width="22%" align="center"><a href="../gestionequipements-index.php">GESTION DES EQUIPEMENTS</a></td>
                            <td width="22%" align="center"><a href="index.php">GESTION DES UTILISATEURS </a></td>
                            
                            <td width="22%" align="center"><a href="../rechercherouteur-index.php">RECHERCHE DE ROUTEUR</a></td>
                            <td width="12%" align="center"><a href="../statistiques">STATISTIQUES</a></td>
                            
                            <td width="12%" align="center"><a href="../profil-index.php">PROFIL </a></td>
                    </tr>
                        </table>

		  </nav><!-- .main-nav /-->
	
		</header><!-- #header /-->
	
<center>
</center>
	



	
<div id="megacontainer" class="megacontainer">

	<div id="main-content" class="container">

