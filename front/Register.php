<?php
require_once "../config.php";
include "../Core/UserC.php";
include "../Entities/User.php";

 
$username = $password = $confirm_password =$email= "";
$username_err = $password_err = $confirm_password_err =$email_err= "";
$db = config::getConnexion();

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        
            $param_username = trim($_POST["username"]);
            $userC=new UserC();
            $num=$userC->verifierUsername($param_username);
            
                if($num == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
         

           
        
    }
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } else{
        
            $param_email = trim($_POST["email"]);
            $userC=new UserC();
            $num1=$userC->verifierEmail($param_email);
            
                if($num1 == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
         

           
        
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please enter a confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)&&empty($email_err)){
        
      
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $user=new User(1,$param_username,$param_password,$param_password,"",$param_email,"");
            $userC=new UserC();
            $userC->register($user);
            
            
                header("location: login.php");
           

    }
    
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>

    <title>Inscription</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../css/tooplate-gymso-styleMariem.css">
    <!--
    Tooplate 2119 Gymso Fitness
    https://www.tooplate.com/view/2119-gymso-fitness
    -->
</head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50">










<!-- ABOUT -->
<section class="about section" id="about">
    <div class="container">
        <div >
          <h1 style="color: orangered"> Inscription :</h1>
            <table class="connexion" width="90%">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <tbody>
                <tr>
                    <td><label for="ident">Nom</label></td>
                    <td><input type="text" name="username" value="" size="50" maxlength="100" id="nom" autofocus/><br> </td>
                   

                </tr>
                <tr>
                <td></td>
                 <td> <span class="help-block"><?php echo $username_err; ?></span></td>
                 </tr>


                <tr>
                    <td><label for="ident">Prenom</label></td>
                    <td><input type="text" name="prenom" value="" size="50" maxlength="10" id="prenom" autofocus/></td>
                <tr>
                    <td><label for="ident">Date de naissance</label></td>
                    <td><input type="date" name="dn" value="" size="50" maxlength="100" id="dn" autofocus/></td>
                </tr>
                <tr>
                    <td><label for="ident">Profession</label></td>
                    <td><input type="text" name="p" value="" size="50" maxlength="100" id="ident" autofocus/></td>



                </tr>


                <tr>
                    <td><label for="ident">Sexe</label></td>
                    <td><label for="ident">Femme</label><input type="radio" name="choice" value="" checked>
                    <label for="ident">Homme</label>
                    <input type="radio" name="choice" value="l" checked></td>
                </tr>
                <tr>
                    <td><label for="ident">Poids</label></td>
                    <td><input type="text" name="poid" value="" size="50" maxlength="10" id="poid" autofocus/></td>


                <tr>
                    <tr>
                    <td><label for="ident">Taille</label></td>
                    <td><input type="text" name="taille" value="" size="50" maxlength="10" id="taille" autofocus/></td>
                </tr>
                <tr>
                <tr>
                    <td><label for="E-mail">E-mail</label></td>
                    <td><input type="email" name="email" value="" size="50" maxlength="100" id="E-mail" autofocus/></td>
                   

                <tr> 
                <td></td>

                <td> <span class="help-block"><?php echo $email_err; ?></span></td></tr>
                <tr>
                    <td><label for="password">Mot de passe</label></td>
                    <td><input type="password" name="password" value="" size="50" maxlength="10" id="password" autofocus/></td>
                    

                </tr>
                <tr>
                <td></td>

                 <td> <span class="help-block"><?php echo $password_err; ?></span></td>
                 </tr>

                <tr>
                    <td><label for="password">Confirmer</label></td>
                    <td><input type="password" name="confirm_password" value="" size="50" maxlength="10" id="password" autofocus/><br>
</td>

                </tr>
                <tr> 
                <td></td>

                <td> <span class="help-block"><?php echo $password_err; ?></span></td></tr>


                </center>
                </tbody>
                <tr>

                    <td> <input type="submit" value="S'inscrire"/></td>

                </form>
                   
                <td><a href="login.php" style="color:#FFFFF5">Login ?</a></td>


</tr>
            </table>

        </div>
    </div>
</section>







<!-- SCRIPTS -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/aos.js"></script>
<script src="../js/smoothscroll.js"></script>
<script src="../js/custom.js"></script>

</body>
</html>