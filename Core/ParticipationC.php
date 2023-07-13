<?PHP
require_once "../config.php";
include "EvenementC.php";
include "../Entities/Evenement.php";

class ParticipationC {

	function participer($participation){
        $sql="insert into participation (id_evenement,id_user,placesDemandees) values (:id_evenement,:id_user, :placesDemandees)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id_user=$participation->getid_user();
        $id_evenement=$participation->getid_evenement();
        $placesDemandees=$participation->getplacesDemandees();
		$req->bindValue(':id_user',$id_user);
        $req->bindValue(':id_evenement',$id_evenement);
        $req->bindValue(':placesDemandees',$placesDemandees);
        $req->execute();
           }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
    function verifierParticipation($id_evenement,$id_user){
		$sql="SELECT * from participation where id_evenement=$id_evenement and id_user=$id_user";
		$db = config::getConnexion();
		try{
        $liste=$db->query($sql);
        $num_of_rows = $liste->rowCount() ;
        if($num_of_rows!=0)
        return true;
        else 
        return false;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function RecupererPlacesReservees($id_evenement,$id_user){
		$sql="SELECT * from participation where id_evenement=$id_evenement and id_user=$id_user";
		$db = config::getConnexion();
		try{
        $liste=$db->query($sql);
        $num_of_rows = $liste->rowCount() ;
        return $liste;

		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
    function annulerParticipation($id_evenement,$id_user){
		$sql="DELETE FROM participation where id_evenement= :id_evenement and id_user=$id_user";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_evenement',$id_evenement);

		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>