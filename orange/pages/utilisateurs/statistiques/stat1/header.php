<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../../../../css/style.css" rel="stylesheet" type="text/css" />
<script src="../../../../scripts/jquery.min.js"></script>
<link rel="icon" href="../../../../favicon.ico" />
 <?php session_start(); ?>
</head>

<body align="center" id="wimax">
<title>Alarmes par domaines par mois</title>
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
 
			<a href="../index.php"><img src="../../../../images/logo.jpg" /></a>

		  </div><!-- .logo /-->
			
		
		</div>	
			<div id="main-nav-anchor"></div>
			<nav id="main-nav" align="center">
				<table width="100%" align="center">
                          <tr>
                            <td width="10%" align="center"><a href="../../../../index.php">ACCUEIL</a></td>
                            
                            
                            <td width="22%" align="center"><a href="../../gestionequipements-index.php">GESTION DES EQUIPEMENTS</a></td>
                                              
                            <td width="22%" align="center"><a href="../../rechercherouteur-index.php">RECHERCHE DE ROUTEUR</a></td>
                            <td width="12%" align="center"><a href="../index.php">STATISTIQUES</a></td>
                            
                            <td width="12%" align="center"><a href="../../profil-index.php">PROFIL </a></td>
                    </tr>
                        </table>

		  </nav><!-- .main-nav /-->
	
		</header><!-- #header /-->
	
<center>
</center>
	



	
<div id="megacontainer" class="megacontainer">

	<div id="main-content" class="container">

<nav id="low-nav" align="center">
				<table width="100%" align="center">
                          <tr style="line-height:30px;border-spacing:10px;">
                            <td align="center" id="wimaxnav"><a id="wimaxnav" href="index.php">ALARMES/NE/MOIS</a></td>
                            
                            <td align="center" style="background-color:rgba(199, 186, 186, 0.5);width:0px; box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.6);"></td>
                            
                            <td align="center"><a href="../stat2/index.php">ALARMES/NE</a></td>
                            
                            <td align="center" style="background-color: rgba(199, 186, 186, 0.5); width: 0px; box-shadow: 1px 3px 5px rgba(51,51,51,0.6);"></td>
                            
                            <td align="center"><a href="../stat3/index.php">ALARMES CRITIQUES/NOEUDS</a></td>
                            
                            <td align="center" style="background-color:rgba(199, 186, 186, 0.5);width:0px; box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.6);"></td>
                            
                            <td align="center"><a href="../stat4/index.php">ACQUITTEMENT/SHIFT/NE</a></td>
                            
                          
                        
                  </table>

		  </nav><!-- .main-nav /-->