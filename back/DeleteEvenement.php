<?PHP
include "../Core/EvenementC.php";
include "../Entities/Evenement.php";

$evenementC=new EvenementC();

	
session_start();

if( htmlspecialchars($_SESSION["role"])=="Admin"){
	$evenementC->supprimerEvenement($_GET['id_evenement']);
	
	header("Location: index.php");
}


?>