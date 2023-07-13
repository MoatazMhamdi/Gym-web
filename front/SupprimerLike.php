<?PHP
include "../Core/LikeC.php";
include "../Entities/Like.php";
include "../Core/EvenementC.php";
include "../Entities/Evenement.php";
session_start ();


$likeC=new LikeC();
$evenementC=new EvenementC();

	$idEvent=$_GET['id_evenement'];

    $likeC->supprimerLike($idEvent,$_SESSION["id"]);
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
		
    }
	$evenement=new Evenement($id_evenement,$name,$date,$nb_places,$image,$description,$nb_places,$nb_like,0);
	$evenementC->modifierEvenementNblike1($evenement,$idEvent);
	
	header("Location: DetailEvenement.php?id_evenement=$idEvent");


?>