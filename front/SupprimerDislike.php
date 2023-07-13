<?PHP
include "../Core/DislikeC.php";
include "../Entities/Dislike.php";
include "../Core/EvenementC.php";
include "../Entities/Evenement.php";
session_start ();


$dislikeC=new DislikeC();
$evenementC=new EvenementC();

	$idEvent=$_GET['id_evenement'];

    $dislikeC->supprimerDislike($idEvent,$_SESSION["id"]);
    $evenementS=$evenementC->recupererEvenement($_GET['id_evenement']);
	foreach($evenementS as $row){
		$id_evenement=$row['id_evenement'];
		$name=$row['name'];
		$date=$row['date'];
        $image=$row['image'];
        $description=$row['description'];
        $nb_participants=$row['nb_participants'];
		$nb_places=$row['nb_places'];
		$nb_like=$row['nb_like'];
        $nb_dislike=$row['nb_dislike'];

    }
	$evenement=new Evenement($id_evenement,$name,$date,$nb_places,$image,$description,$nb_places,$nb_like,$nb_dislike);
	$evenementC->modifierEvenementNbdislike1($evenement,$idEvent);
	
	header("Location: DetailEvenement.php?id_evenement=$idEvent");


?>