<?PHP
include "../Core/ParticipationC.php";
include "../Entities/Participation.php";
session_start ();

$participationC=new ParticipationC();
$evenementC=new EvenementC();

	$participation=new Participation($_POST["id_evenement"],$_SESSION["id"],$_POST["placesdemandees"]);
	$placedemandees=$_POST["placesdemandees"];
	$idEvent=$_POST['id_evenement'];

	$participationC->participer($participation);
	$evenementS=$evenementC->recupererEvenement($_POST['id_evenement']);
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
	$evenementC->modifierEvenementPlace($evenement,$idEvent,$placedemandees);
	header("Location: DetailEvenement.php?id_evenement=$idEvent");


?>