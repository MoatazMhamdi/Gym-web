<?PHP
class Dislike{
    private $id_dislike;
    private $id_evenement;
    private $id_user;

	
	function __construct($id_dislike,$id_evenement,$id_user){
		$this->id_evenement=$id_evenement;
		$this->id_user=$id_user;
        $this->id_dislike=$id_dislike;

	}
	function getid_dislike(){
		return $this->id_dislike;
	}
	function getid_evenement(){
		return $this->id_evenement;
	}
	
	function getid_user(){
		return $this->id_user;
	}
 
	function setid_dislike($id_dislike){
		$this->id_dislike;
	}
	function setid_evenement($id_evenement){
		$this->id_evenement=$id_evenement;
	}
	
	function setid_user($id_user){
		$this->id_user=$id_user;
	}
	
}

?>