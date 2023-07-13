<?php
include "../Core/UserC.php";

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: afficherEvenement.php");
    exit;
}
 
// Include config file
require_once "../config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
$pdo = config::getConnexion();

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
      
            $param_username = trim($_POST["username"]);
            $userC=new UserC();
            $users=$userC->Login($param_username);
            $nbrCol=$users->rowCount();
            
                if($nbrCol == 1){
                    foreach($users as $row){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        $role= $row["role"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            $_SESSION["role"] = $role;                            

                            // Redirect user to welcome page
                            if($_SESSION["role"]=="client"){
                                header("location: afficherEvenement.php");

                            }
                            else{
                                header("location: ../back/index.php");

                            }

                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
           

            // Close statement
        
    }
    
    // Close connection
    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Connexion</title>

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
            <h1 style="color: orangered"> Connexion :</h1>
            <table class="connexion" width="90%">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">



                <tr>
                    <td><label for="E-mail">Username</label></td>
                    <td><input type="text" name="username" value="" size="50" maxlength="100" id="E-mail" autofocus/><br>

</td>
                </tr><tr>                <td></td>          <td>
              <span class="help-block" style="color:#FF0000"><?php echo $username_err; ?></span>              </td>
 </tr>
                <tr>
                    <td><label for="password">Mot de passe</label></td>
                    <td><input type="password" name="password" value="" size="50" maxlength="100" id="password" autofocus/><br>

</td>

                </tr>
                <tr>             <td></td>               <td>
              <span class="help-block" style="color:#FF0000"><?php echo $password_err; ?></span>              </td>
 </tr>



                <tr>

                    <td><input type="submit" value="Se connecter"/></td>  

              
</form>


<td><a href="resetPassword.php" style="color:#FFFFF5">Mot de passe oublié ?</a></td></tr>
<tr>
<td></td>  
<td><a href="Register.php" style="color:#FFFFF5">Nouveau Compte</a></td>


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
 