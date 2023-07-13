<?php
include "../Core/UserC.php";
$password = "";
$confirm_password="";
$password_err=$confirm_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirmpassword"]))){
        $confirm_password_err = "Please enter a confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirmpassword"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if( empty($password_err)&&empty($confirm_password_err)){

$userC=new UserC();
$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

$userC->modifierUserPassword($param_password,$_GET['random']);
header("location: login.php");

    }
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
            <div>
                <h1 style="color: orangered"> Change Password</h1>
                <table class="connexion" width="90%">

                    <form action="" method="post">

                        <tr>
                            <td><label for="password">Password</label></td>
                            <td><input type="password" name="password" value="" size="50" maxlength="100" id="password"
                                    autofocus />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><span class="help-block" style="color:#FFFFFF"><?php echo $password_err; ?></span></td>

                        </tr>
                        <tr>
                            <td><label for="confirmpassword">Confirm Password</label></td>
                            <td><input type="password" name="confirmpassword" value="" size="50" maxlength="100" id="confirmpassword"
                                    autofocus />
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><span class="help-block" style="color:#FFFFFF"><?php echo $confirm_password_err; ?></span></td>

                        </tr>



                        <tr>

                            <td><input type="submit" value="envoyer Mail" /></td>

                        </tr>
                    </form>
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