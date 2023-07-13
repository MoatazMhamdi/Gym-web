<!DOCTYPE html>
<html class="translated-ltr" lang="fr"><head>

     <title>Modèle HTML Gymso Fitness</title>

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
     <link rel="stylesheet" href="../css/tooplate-gymso-style.css">
<!--
Tooplate 2119 Gymso Fitness
https://www.tooplate.com/view/2119-gymso-fitness
-->
<link type="text/css" rel="stylesheet" charset="UTF-8" href="https://translate.googleapis.com/translate_static/css/translateelement.css"></head>
<body data-spy="scroll" data-target="#navbarNav" data-offset="50" data-aos-easing="ease" data-aos-duration="800" data-aos-delay="0">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
<label style="color:#FFFFFF">Bonjour <?php echo $_SESSION["username"] ;?></label>
            <a class="navbar-brand" href="index.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> <img src="../images/logo.jpg" alt="" class="gys"> </font></font></a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Basculer la navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" color="red">Accueil</font></font></a>
                    </li>

                    <li class="nav-item">
                        <a href="afficherEvenement.php" class="nav-link smoothScroll"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nos Evénements</font></font></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link smoothScroll" href="pages/packs.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nos Packs</font></font></a>
                    </li>

                    <li class="nav-item">
                        <a href="#schedule" class="nav-link smoothScroll"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Blog</font></font></a>
                    </li>

                    <li class="nav-item">
                        <a href="Logout.php" class="nav-link smoothScroll active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" >Log out</font></font></a>
                    </li>
                </ul>

                <ul class="social-icon ml-lg-3">
                    <li><a href="https://fb.com/tooplate" class="fa fa-facebook"></a></li>
                    <li><a href="#" class="fa fa-twitter"></a></li>
                    <li><a href="#" class="fa fa-instagram"></a></li>
                </ul>
            </div>

        </div>
    </nav>
