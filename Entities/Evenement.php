<?PHP
class evenement{
	private $id_evenement;
	private $name;
	private $date;
	private $nb_participants;
    private $image;
	private $description;
	private $nb_places;
	private $nb_like;
	private $nb_dislike;

	function __construct($id_evenement,$name,$date,$nb_places,$image,$description,$nb_participants,$nb_like,$nb_dislike){
		$this->id_evenement=$id_evenement;
		$this->name=$name;
		$this->date=$date;
		$this->nb_places=$nb_places;
        $this->image=$image;
		$this->description=$description;
		$this->nb_participants=$nb_participants;
		$this->nb_like=$nb_like;
		$this->nb_dislike=$nb_dislike;


	}
	
	function getid_evenement(){
		return $this->id_evenement;
	}
	function getname(){
		return $this->name;
	}
	function getdate(){
		return $this->date;
	}
	function getnb_participants(){
		return $this->nb_participants;
	}
	
	function getnb_places(){
		return $this->nb_places;
	}
	function getimage(){
		return $this->image;
	}
	function getdescription(){
		return $this->description;
	}
	function getnb_like(){
		return $this->nb_like;
	}
	function getnb_dislike(){
		return $this->nb_dislike;
	}
	function setid_evenement($id_evenement){
		$this->id_evenement=$id_evenement;
	}
	function setname($nom_produit){
		$this->nom_produit;
	}
	function setdate($date){
		$this->date=$date;
	}
	function setnb_participants($nb_participants){
		$this->nb_participants=$nb_participants;
	}
	function setimage($image){
		$this->image=$image;
	}
	function setdescription($description){
		$this->description=$description;
	}
	
	function setnb_places($nb_places){
		$this->nb_places=$nb_places;
	}
	function setnb_like($nb_like){
		$this->nb_like=$nb_like;
	}
	function setnb_dislike($nb_dislike){
		$this->nb_dislike=$nb_dislike;
	}
}

?>