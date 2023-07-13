<?PHP
class Like{
    private $id_like;
    private $id_evenement;
    private $id_user;

	
	function __construct($id_like,$id_evenement,$id_user){
		$this->id_evenement=$id_evenement;
		$this->id_user=$id_user;
        $this->id_like=$id_like;

	}
	function getid_like(){
		return $this->id_like;
	}
	function getid_evenement(){
		return $this->id_evenement;
	}
	
	function getid_user(){
		return $this->id_user;
	}
 
	function setid_like($id_like){
		$this->id_like;
	}
	function setid_evenement($id_evenement){
		$this->id_evenement=$id_evenement;
	}
	
	function setid_user($id_user){
		$this->id_user=$id_user;
	}
	
}

?>