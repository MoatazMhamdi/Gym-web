<?php

include "../core/EvenementC.php";
$evenment1C=new EvenementC();
if(isset($_GET['name'])){
    $listeEvenments=$evenment1C->RechercherEvenement($_GET['name']);

}else{    
    $listeEvenments=$evenment1C->afficherEvenements();
}
?>
<?php
session_start();

if( htmlspecialchars($_SESSION["role"])=="Admin"){?>
<?php require_once('Layouts/head.php') ;?>
<?php require_once( 'Layouts/menu.php');?>
<div class="container">

    <div class="starter-template">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <br>
                <a href="AjouterEvenement.php" class="btn btn-primary"> Ajouter Evenement +</a>
                <br>
                <br>
            </div>
            <div align="right">

                <form method="GET">
                    <input type="search" name="name" placeholder="Recherche..." />
                    <input type="submit" value="Valider" />
                </form>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Nombre Participants</th>
                                    <th>Places Disponibles</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listeEvenments as $evenement) {?>
                                <tr>
                                    <td><img class="rounded-circle" style="width: 50px"
                                            src="Images/<?php echo $evenement["image"] ?>"/></td>
                                    <td>
                                        <?php echo $evenement["name"] ?>
                                    </td>
                                    <td>
                                        <?php echo $evenement["nb_participants"] ?>
                                    </td>
                                    <td>
                                        <?php echo $evenement["nb_places"] ?>
                                    </td>
                                    <td>
                                        <?php echo $evenement["date"] ?>
                                    </td>
                                    <td>
                                        <?php echo $evenement["description"] ?>
                                    </td>
                                    <td>
                                        <a href="EditEvenement.php?id_evenement=<?php echo $evenement["id_evenement"]
                                            ?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="javascript:deleteEvenement(confirm('Etes vous sur ?'),'DeleteEvenement.php?id_evenement=<?php echo $evenement["id_evenement"] ?>');" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- /.container -->

<script type="text/javascript">

    function deleteEvenement(confirmation, url) {
        if (confirmation) {
            window.location.href = url;
        }
    }

</script>

<?php include 'Layouts/footer.php';?>
<?php } 
     else {
        header("Location: ../front/afficherEvenement.php");

    }
     ?>