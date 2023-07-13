<?php
include "../Core/UserC.php";
$email_err=$res= "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty(trim($_POST['email']))){
    $email_err = "Please enter a email.";
} else{
    $userC=new UserC();

    $num1=$userC->verifierEmail(trim($_POST['email']));
            
    if($num1 == 0){
        $email_err = "This email doesn't exist.";
    } else{
        $email = trim($_POST["email"]);
        $random=$userC->random(20);
$userC->modifierUserRandom($random,$_POST['email']);
$userC->EnvoyerMail($_POST['email'],$random);
$res="verify you email";
    }


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
                <h1 style="color: orangered"> Reset Password :</h1>
                <table class="connexion" width="90%">

                    <form action="" method="post">

                        <tr>
                            <td><label for="email">E-mail</label></td>
                            <td><input type="email" name="email" value="" size="50" maxlength="100" id="email"
                                    autofocus />
                            </td>
                            </tr>

                            <tr>
                            <td></td>
                            <?php if ($email_err==""){ ?>
                            <td><span class="help-block" style="color:#FFFFFF"><?php echo $res; ?></span></td>
<?php } else ?>
                            <td><span class="help-block" style="color:#FFFFFF"><?php echo $email_err; ?></span></td>

                        </tr>





                        <tr>

                            <td><input type="submit" value="envoyer Mail" /></td>

                        
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