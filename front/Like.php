<?PHP
include "../Core/LikeC.php";
include "../Entities/Like.php";
include "../Core/EvenementC.php";
include "../Entities/Evenement.php";
include "../Core/DislikeC.php";
include "../Entities/Dislike.php";
session_start ();


$likeC=new LikeC();
$evenementC=new EvenementC();

	$like=new Like(1,$_GET["id_evenement"],$_SESSION["id"]);
	$idEvent=$_GET['id_evenement'];

	$likeC->Like($like);
	$dislikeC=new DislikeC();
$test2=$dislikeC->verifierDislike($idEvent,$_SESSION["id"]);

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
	$evenement=new Evenement($id_evenement,$name,$date,$nb_places,$image,$description,$nb_places,$nb_like,$dislikeC);
	if($test2){
		$dislikeC->supprimerDislike($idEvent,$_SESSION["id"]);
		$evenementC->modifierEvenementNbdislike1($evenement,$idEvent);
	}
	$evenementC->modifierEvenementNblike($evenement,$idEvent);
	header("Location: DetailEvenement.php?id_evenement=$idEvent");


?>