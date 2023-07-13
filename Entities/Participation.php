<?PHP
class Participation{
    private $id_part;
    private $id_evenement;
    private $id_user;
    private $placesDemandees;

	
	function __construct($id_evenement,$id_user,$placesDemandees){
		$this->id_evenement=$id_evenement;
		$this->id_user=$id_user;
        $this->placesDemandees=$placesDemandees;

	}
	
	function getid_evenement(){
		return $this->id_evenement;
	}
	function getid_part(){
		return $this->id_part;
	}
	function getid_user(){
		return $this->id_user;
	}
    function getplacesDemandees(){
		return $this->placesDemandees;
	}
	
	function setid_evenement($id_evenement){
		$this->id_evenement=$id_evenement;
	}
	function setid_part($id_part){
		$this->id_part;
	}
	function setid_user($id_user){
		$this->id_user=$id_user;
	}
	function setplacesDemandees($placesDemandees){
		$this->placesDemandees=$placesDemandees;
	}
}

?>