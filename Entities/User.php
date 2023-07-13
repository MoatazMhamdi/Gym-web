<?PHP
class User{
    private $id;
    private $username;
    private $password;
    private $confirm_password;
	private $role;
	private $email;
	private $random;

	
	function __construct($id,$username,$password,$confirm_password,$role,$email,$random){
		$this->username=$username;
		$this->password=$password;
        $this->id=$id;
        $this->confirm_password=$confirm_password;
        $this->role=$role;
        $this->email=$email;
        $this->random=$random;


	}
	function getid(){
		return $this->id;
	}
	function getusername(){
		return $this->username;
	}
	
	function getpassword(){
		return $this->password;
	}
    function getrole(){
		return $this->role;
	}
	
	function getconfirm_password(){
		return $this->confirm_password;
	}
	function getemail(){
		return $this->email;
	}
	
	function getrandom(){
		return $this->random;
	}
 
	function setid($id){
		$this->id;
	}
	function setusername($username){
		$this->username=$username;
	}
	
	function setpassword($password){
		$this->password=$password;
	}
	function setrole($role){
		$this->role=$role;
	}
	
	function setconfirm_password($confirm_password){
		$this->confirm_password=$confirm_password;
	}
	function setemail($email){
		$this->email=$email;
	}
	
	function setrandom($random){
		$this->random=$random;
	}
	
}

?>