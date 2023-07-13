<?PHP
include "../Core/DislikeC.php";
include "../Entities/Dislike.php";
include "../Core/EvenementC.php";
include "../Entities/Evenement.php";
include "../Core/LikeC.php";
include "../Entities/Like.php";
session_start ();

$likeC=new LikeC();

$dislikeC=new DislikeC();
$evenementC=new EvenementC();

	$dislike=new Dislike(1,$_GET["id_evenement"],$_SESSION["id"]);
	$idEvent=$_GET['id_evenement'];

	$dislikeC->Dislike($dislike);

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
	$likeC=new LikeC();
$test1=$likeC->verifierLike($id_evenement,$_SESSION["id"]);
if($test1){
	$likeC->supprimerLike($idEvent,$_SESSION["id"]);

	$evenementC->modifierEvenementNblike1($evenement,$idEvent);
}
	

	$evenementC->modifierEvenementNbdislike($evenement,$idEvent);
	header("Location: DetailEvenement.php?id_evenement=$idEvent");


?>