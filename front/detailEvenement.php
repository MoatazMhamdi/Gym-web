<?PHP
include "../Core/ParticipationC.php";
include "../Core/LikeC.php";
include "../Core/DislikeC.php";
include "../Core/UserC.php";

session_start ();
if ($_SESSION["loggedin"]){

if (isset($_GET['id_evenement'])){
	$evenementC=new evenementC();
    $result=$evenementC->recupererEvenement($_GET['id_evenement']);
	foreach($result as $row){
		$id_evenement=$row['id_evenement'];
		$name=$row['name'];
		$date=$row['date'];
        $image=$row['image'];
        $description=$row['description'];
        $nb_participants=$row['nb_participants'];
        $nb_places=$row['nb_places'];
        $nb_like=$row['nb_like'];
        $nb_dislike=$row['nb_dislike'];


    }
    $result=$evenementC->verifierNbplaces($_GET['id_evenement']);
	foreach($result as $row){
		
        $nb_place=$row['nb_places'];
       


    }


}
}else{
  header("location: login.php");

}

?>
<?php include 'Layouts/head.php';?>




<!-- ABOUT -->
<section class="about section" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                <div class="class-thumb">

                    <img src="../back/Images/<?PHP echo $image ?>" class="img-fluid" alt="Entraîneur">

                    <div class="team-info d-flex flex-column">

                        <h3>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Date de l'evenement:
                                    <?PHP echo $date ?>
                                </font>
                            </font>
                        </h3>
                        <span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Places restantes :
                                    <?PHP echo $nb_places ?>
                                </font>
                            </font>
                        </span>
                        <span>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Nombre de participants :
                                    <?PHP echo $nb_participants ?>
                                </font>
                            </font>
                        </span>


                        <ul class="social-icon mt-3">
                            <?php


$likeC=new LikeC();
$like=$likeC->RecupererLike($id_evenement);
$test1=$likeC->verifierLike($id_evenement,$_SESSION["id"]);
if(!$test1){?>
                            <li><a href="Like.php?id_evenement=<?php echo $id_evenement ?>" class="fa fa-thumbs-up">
                                   
                                </a>
                                <a href="#" data-toggle="modal" data-target="#like"><?php echo $nb_like ?></a>                            </li>

                            </li>
                            <?PHP

}

else {?>
                            <li><a href="SupprimerLike.php?id_evenement=<?php echo $id_evenement ?>"
                                    class="fa fa-thumbs-up" style="color:blue"></a>
                                    <a href="#" data-toggle="modal" data-target="#like"><?php echo $nb_like ?></a>                            </li>
                            <?PHP
                                    }
                                    ?>
                            <?php


$dislikeC=new DislikeC();
$dislike=$dislikeC->RecupererDislike($id_evenement);

$test2=$dislikeC->verifierDislike($id_evenement,$_SESSION["id"]);
if(!$test2){?>
                            <li><a href="Dislike.php?id_evenement=<?php echo $id_evenement ?>"
                                    class="fa fa-thumbs-down">
                                </a>
                                <a href="#" data-toggle="modal" data-target="#dislike"><?php echo $nb_dislike ?></a>


                            </li>
                            <?PHP

}

else {?>
                            <li><a href="SupprimerDislike.php?id_evenement=<?php echo $id_evenement ?>"
                                    class="fa fa-thumbs-down" style="color:red">
                                </a>
                               
                        <a href="#" data-toggle="modal" data-target="#dislike"><?php echo $nb_dislike ?></a>

                            </li>
                            <?PHP
                                    }
                                    ?>
                        </ul>
                        <?php


$participationC=new ParticipationC();
$test=$participationC->verifierParticipation($id_evenement,$_SESSION["id"]);
if(!$test){
  if($nb_place!=0){
  ?>
                        <a href="#" class="btn custom-btn bg-color mt-3 aos-init aos-animate" data-aos="fade-up"
                            data-aos-delay="300" data-toggle="modal" data-target="#membershipForm">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Participer</font>
                            </font>
                        </a>
                        <?PHP

}}

else {?>
                        <a href="AnnulerParticipation.php?id_evenement=<?PHP echo $id_evenement ?>"
                            class="btn custom-btn bg-color mt-3 aos-init aos-animate" data-aos="fade-up"
                            data-aos-delay="300">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Annuler Participation</font>
                            </font>
                        </a>
                        <?PHP
                                    }
                                    ?>
                    </div>

                </div>

            </div>
            <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                <h2 class="mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Bienvenue à
                            <?PHP echo $name ?>
                        </font>
                    </font>
                </h2>

                <p data-aos="fade-up" data-aos-delay="400" class="aos-init aos-animate">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                            <?PHP echo $description ?>
                        </font>
                </p>



            </div>





        </div>
    </div>
</section>


<!-- CLASS -->



<!-- SCHEDULE -->





<!-- FOOTER -->

<!-- Modal -->
<div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title" id="membershipFormLabel">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Reservation</font>
                    </font>
                </h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="proche">
                    <span aria-hidden="true">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">×</font>
                        </font>
                    </span>
                </button>
            </div>

            <div class="modal-body">
                <form class="membership-form webform" role="form" method="POST" action="participer.php">

                    <input class="form-control" type="number" name="placesdemandees" placeholder="Nombre des Places">

                    <input type="hidden" class="form-control" name="id_evenement" value="<?PHP echo $id_evenement ?>">


                    <button type="submit" class="form-control" id="submit-button" name="submit">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Bouton de soumission</font>
                        </font>
                    </button>


                </form>
            </div>

            <div class="modal-footer"></div>

        </div>
    </div>
</div>
<div class="modal fade" id="dislike" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title" id="membershipFormLabel">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Dislike</font>
                    </font>
                </h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="proche">
                    <span aria-hidden="true">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">×</font>
                        </font>
                    </span>
                </button>
            </div>
            <div style=" overflow:hidden;
    -webkit-border-radius:50px;
    -moz-border-radius:50px;
    border-radius:50px;
    width:250px;
    height:500px;">

<?php
foreach($dislike as $row3){
    

?>

<img src="images/profile1.jpg" ><?PHP
$userC=new UserC();
$u1=$userC->recupererUser($row3['id_user']);
	foreach($u1 as $row4){
		$nom1=$row4['username'];
	
        echo $nom1;


    } ?></img>

<?php }?>
</div>
    

            <div class="modal-footer"></div>

        </div>
    </div>
</div>
<div class="modal fade" id="like" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">

                <h2 class="modal-title" id="membershipFormLabel">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Like</font>
                    </font>
                </h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="proche">
                    <span aria-hidden="true">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">×</font>
                        </font>
                    </span>
                </button>
            </div>
            <div style=" overflow:hidden;
    -webkit-border-radius:50px;
    -moz-border-radius:50px;
    border-radius:50px;
    width:250px;
    height:500px;">
            <?PHP
foreach($like as $row1){
    

?>


<img src="images/profile1.jpg" ><?PHP
$user1C=new UserC();

$u=$user1C->recupererUser($row1['id_user']);
	foreach($u as $row2){
		$nom=$row2['username'];
	
        echo $nom;


    } ?></img>

<?php }?>
</div>


            <div class="modal-footer"></div>

        </div>
    </div>
</div>

<?php include 'Layouts/footer.php';?>