<?PHP
require_once "../config.php";


class DislikeC {

	function dislike($dislike){
        $sql="insert into dislike (id_evenement,id_user) values (:id_evenement,:id_user )";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id_user=$dislike->getid_user();
        $id_evenement=$dislike->getid_evenement();
		$req->bindValue(':id_user',$id_user);
        $req->bindValue(':id_evenement',$id_evenement);
        $req->execute();
           }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
    function supprimerDislike($id_evenement,$id_user){
		$sql="DELETE FROM dislike where id_evenement= :id_evenement and id_user= :id_user";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id_evenement',$id_evenement);
        $req->bindValue(':id_user',$id_user);

		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}/***/
    function verifierDislike($id_evenement,$id_user){
		$sql="SELECT * from dislike where id_evenement=$id_evenement and id_user=$id_user";
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
    function RecupererDislike($id_evenement){
		$sql="    SELECT *  FROM dislike WHERE id_evenement=$id_evenement";
		$db = config::getConnexion();
		try{
        $liste=$db->query($sql);
       
        
        return $liste;
       
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    
}

?>