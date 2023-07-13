

<?PHP
include "../Entities/Evenement.php";
include "../Core/EvenementC.php";






$EvenementC=new EvenementC();
$filename="";
$msg = ""; 
  
// If upload button is clicked ... 
if (isset($_POST['ajouter'])) { 

  $filename = $_FILES["avatar"]["name"]; 
  $tempname = $_FILES["avatar"]["tmp_name"];     
      $folder = "Images/".$filename; 
        


        
      // Now let's move the uploaded image into the folder: image 
      if (move_uploaded_file($tempname, $folder))  { 
          $msg = "Image uploaded successfully"; 
      }else{ 
          $msg = "Failed to upload image"; 
    } 
} 

    if ( isset($_POST['nom']) and isset($_POST['date']) and isset($_POST['nb_places'])  and isset($_POST['description']))
    {
        
      
$evenement1=new evenement(1,$_POST['nom'],$_POST['date'],$_POST['nb_places'],$filename,$_POST['description'],0,0,0);
//Partie2

var_dump($evenement1);
//Partie3
$evenement1C=new evenementC();
$evenement1C->ajouterEvenement($evenement1);
header('Location: index.php');

    
}


?>
<?php
session_start();

if( htmlspecialchars($_SESSION["role"])=="Admin"){?>


<?php require_once('Layouts/head.php') ;?>
<?php require_once( 'Layouts/menu.php');?>
<HTML>
    <head>
 <link rel="stylesheet" href="../csss/style1.css" >
 <link rel="stylesheet" href="../css/bootstrap.min.css">
 <link rel="stylesheet" href="../css/font-awesome.min.css">
 <link rel="stylesheet" href="../css/aos.css">
 
 <!-- MAIN CSS -->
 <link rel="stylesheet" href="../css/tooplate-gymso-style.css">
 <meta charset ="utf-8"/>
 <link href="assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
 <link href="assets/libs/jquery-steps/steps.css" rel="stylesheet">
 <link href="dist/css/style.min.css" rel="stylesheet">
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
 <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 <![endif]-->
 
 <script>
 
 function validate()
 {
 var nom = document.getElementById("nom");
 var datee = document.getElementById("datee");
 
 
 
 
 
 
 if(nom.value == "") {
 alert ("Please input your NOM");
 return false;
 }
 
 if(datee.value == "") {
 alert ("Please input your Date");
 return false;
 }
 
 
 alert(" Ajout avec SUCCES , THANKS ");
 return true;
 
 }
 
 
 </script>
 
 
 <title>
 preparation 
 </title>
 </head>
 <style>
 
 body
 {
 background-image:url('../images/hero-bg.jpg');
 background-repeat:no-repeat;
 }
 </style>
 
     <body>
     <center>
     <form method="POST" action=""  enctype="multipart/form-data" >
     <table class="t1">
     <h1>Ajouter Evenement</h1>
    
     <td style="vertical-align: inherit;">name</td>
     <td><input class="form-control" type="text" name="nom" id="nom" "></td>
     </tr>
     <tr>
     <td>Date </td>
     <td><input class="form-control" type="date" name="date" required></td>
     </tr>
     <tr>
     <td>Nombre de places</td>
     <td><input class="form-control" type="number" name="nb_places" required></td>
     </tr>
     <tr>
     <td class="aos-init aos-animate">image</td>
     <td><input class="form-control" type="file" name="avatar"></td>
     </tr>
     <tr>
         <td>description</td>
         <td><input class="form-control" type="text" name="description" required></td>
         </tr>
     <tr>
     <td></td>
     <td><input  class="button" type="submit" name="ajouter" value="ajouter"></td>
     </tr>
     </table>
     </form>
     </center>
     </body>
     </HTMl>
     <?php } 
     else {
        header("Location: ../front/afficherEvenement.php");

    }
     ?>
     
     
