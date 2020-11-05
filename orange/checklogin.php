<?php require_once('connexion/connexion.php'); ?>


<?php

$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
// username and password sent from form 




// To protect MySQL injection 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM utilisateurs WHERE login='".$_POST['myusername']."' and password='".$_POST['mypassword']."'";
$result=mysql_query($sql);



// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
$data = mysql_fetch_array ($result);
mysql_free_result ($result);
mysql_close ();
if ($data[6]==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
	session_start();
	$_SESSION['myusername']=$myusername;
	header("location:pages/admin/index.php".SID);
}
else {
	session_start();
	$_SESSION['myusername']=$myusername;
	header("location:pages/utilisateurs/index.php".SID);
}
}
else {
	require 'index.php';
	$string= "Mauvais login ou password!";
	echo "<Span style=\"position: absolute; margin-top:-400px; margin-left: -150px;\"><font color=\"red\"> $string </font></span>";
}
?>

