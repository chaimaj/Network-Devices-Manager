<?php
 
/*
 * examples/mysql/loaddata.php
 * 
 * This file is part of EditableGrid.
 * http://editablegrid.net
 *
 * Copyright (c) 2011 Webismymind SPRL
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://editablegrid.net/license
 */
      
require_once('../../connexion/connexion.php');         

                      
// Get all parameters provided by the javascript
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$mail = $_POST['mail'];
$password = $_POST['password1'];
                               

// This very generic. So this script can be used to update several tables.
		if ($nom!=""){
	$sql="UPDATE utilisateurs SET nom = '$nom' WHERE login = '$login' ";
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		}

	if ($prenom!="") {
	$sql="UPDATE utilisateurs SET prenom = '$prenom' WHERE login = '$login'";
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		}
		
			if ($mail!=""){
	 $sql="UPDATE utilisateurs SET mail = '$mail' WHERE login = '$login' ";
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		}
		
			if ($password!=""){ $sql="UPDATE utilisateurs SET password = '$password' WHERE login = '$login'";
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		}

          
mysql_close();        



header('Location:profil-index.php');