<?PHP
require_once "../config.php";


class UserC {
function verifierUsername($username){
    $sql = "SELECT id FROM user WHERE username='$username'";
    $db = config::getConnexion();
   
		try{
        $liste=$db->query($sql);
        $num_of_rows = $liste->rowCount() ;
        return $num_of_rows ;
        
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }



}
function verifierEmail($email){
    $sql = "SELECT * FROM user WHERE email='$email'";
    $db = config::getConnexion();
   
		try{
        $liste=$db->query($sql);
        $num_of_rows = $liste->rowCount() ;
        return $num_of_rows ;
        
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }



}
function Register($user){
    $sql = "INSERT INTO user (username, password, confirm_password, role,email,random) VALUES (:username, :password, :confirm_password,'client',:email,'')";
    $db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $username=$user->getusername();
        $password=$user->getpassword();
        $confirm_password=$user->getconfirm_password();
        $email=$user->getemail();


		$req->bindValue(':username',$username);
        $req->bindValue(':password',$password);
        $req->bindValue(':confirm_password',$confirm_password);
        $req->bindValue(':email',$email);

        $req->execute();
           }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }



}
function Login($username){
    $sql = "SELECT id, username, password ,role FROM user WHERE username = '$username' ";
    $db = config::getConnexion();
   
    try{
    $liste=$db->query($sql);
    return $liste ;
    
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }


}
function recupererUser($id_user){
    $sql="SELECT * from user where id=$id_user";
    $db = config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
function random($longueur = 20)
{
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < $longueur; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return $chaineAleatoire;
}
function EnvoyerMail($email,$random){
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"Alpha.com"<support@Alpha.com>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    
    $message='
    <html>
        <body>
            <div align="left">
                
    http://localhost/gym-web/front/ChangePassword.php?random='. $random .'			
            </div>
        </body>
    </html>
    ';
    
    mail($email, "Reset Password", $message, $header);
}

function modifierUserRandom($random,$email){
    $sql="UPDATE user SET  random=:random WHERE email=:email";
    
    $db = config::getConnexion();
try{		
   
    $req=$db->prepare($sql);
    $req->bindValue(':random',$random);
    $req->bindValue(':email',$email);


        $s=$req->execute();
        
    }
    catch (Exception $e){
        echo " Erreur ! ".$e->getMessage();
        echo " Les datas : " ;
    }

} 
 function modifierUserPassword($password,$random){
    $sql="UPDATE user SET  password=:password, confirm_password=:confirm_password WHERE random=:random";
    
    $db = config::getConnexion();
try{		
   
    $req=$db->prepare($sql);
    $req->bindValue(':random',$random);
    $req->bindValue(':confirm_password',$password);
    $req->bindValue(':password',$password);


        $s=$req->execute();
        
    }
    catch (Exception $e){
        echo " Erreur ! ".$e->getMessage();
        echo " Les datas : " ;
    }

}  
}

?>