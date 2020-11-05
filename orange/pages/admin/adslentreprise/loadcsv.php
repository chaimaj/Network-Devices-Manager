<?php

require_once('../../../connexion/config.php');  

$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
$mysqli->real_connect($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']);


$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

if ($ext == "csv" && $_FILES["file"]["error"] == 0)
{
	$row=0;
	
    $target = "../../../upload/" . $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], $target);

    if (($handle = fopen($target, "r")) !== FALSE) 
    {
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) 
        {
			if($row == 0){ $row++; continue; }
			
            $sql = "INSERT INTO orange.adsl_entreprise(Nom_routeur,Adresse_IP) values('$data[0]','$data[1]')";

    mysqli_query($mysqli,$sql);
 
	$row++;
	
	}
    fclose($handle);
        

        
    }
}

header("Location:index.php");

?>