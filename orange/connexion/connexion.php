<?php

$bdd="orange"; //nom de la base
$host="localhost";
$user="root";
$pass="";

mysql_connect($host,$user,$pass) or die ("impossible de se connecter � la base de donn�es");
mysql_select_db($bdd);

?>