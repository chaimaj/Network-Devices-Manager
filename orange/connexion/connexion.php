<?php

$bdd="orange"; //nom de la base
$host="localhost";
$user="root";
$pass="";

mysql_connect($host,$user,$pass) or die ("impossible de se connecter à la base de données");
mysql_select_db($bdd);

?>