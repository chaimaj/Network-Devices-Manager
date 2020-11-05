<?php
$mois=$_POST['mois'];
$annee=$_POST['annee'];

switch ($mois){
	case "Janvier":
		$m="01";
		$j=31;
		break;
	case "Fevrier":
		$m="02";
		$j=28;
		break;
	case "Mars":
		$m="03";
		$j=31;
		break;
	case "Avril":
		$m="04";
		$j=30;
		break;
	case "Mai":
		$m="05";
		$j=31;
		break;
	case "Juin":
		$m="06";
		$j=30;
		break;
	case "Juillet":
		$m="07";
		$j=31;
		break;
	case "Aout":
		$m="08";
		$j=31;
		break;
	case "Septembre":
		$m="09";
		$j=30;
		break;
	case "Octobre":
		$m="10";
		$j=31;
		break;
	case "Novembre":
		$m="01";
		$j=30;
		break;
	case "Decembre":
		$m="01";
		$j=31;
		break;
}
?>