<?PHP
include "../Core/ParticipationC.php";
include "../Entities/Participation.php";
session_start ();

    $participationC=new ParticipationC();
    $evenementC=new EvenementC();

	
    $idEvent=$_GET['id_evenement'];
    $participation=$participationC->RecupererPlacesReservees($_GET['id_evenement'],$_SESSION["id"]);

	foreach($participation as $row){
		$placesdemandees=$row['placesDemandees'];
		
		
    }
    $evenementS=$evenementC->recupererEvenement($_GET['id_evenement']);
	foreach($evenementS as $row){
		$id_evenement=$row['id_evenement'];
		$name=$row['name'];
		$date=$row['date'];
        $image=$row['image'];
        $description=$row['description'];
        $nb_participants=$row['nb_participants'];
        $nb_places=$row['nb_places'];
		
    }
	$evenement=new Evenement($id_evenement,$name,$date,$nb_places,$image,$description,$nb_participants,0,0);
	$evenementC->modifierEvenementPlace2($evenement,$idEvent,$placesdemandees);
	$participationC->annulerParticipation($_GET["id_evenement"],$_SESSION["id"]);
	
	header("Location: DetailEvenement.php?id_evenement=$idEvent");


?>