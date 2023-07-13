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

     
      
$evenement1=new evenement($_POST['id_evenement'],$_POST['nom'],$_POST['date'],$_POST['nb_places'],$filename,$_POST['des'],0,0,0);
//Partie2

var_dump($evenement1);
//Partie3
$evenement1C=new evenementC();
session_start();

if( htmlspecialchars($_SESSION["role"])=="Admin"){
$evenement1C->modifierEvenement($evenement1,$_POST['id_evenement']);
}
header('Location: index.php');
    





?>