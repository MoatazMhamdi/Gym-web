



<?php

include '../core/evenementC.php';
include '../entities/evenement.php';

$evenement = null;
$evenementC=new EvenementC();

if (isset($_GET["id_evenement"])) {
    $id      = $_GET["id_evenement"];
	$evenementS=$evenementC->recupererEvenement($id);
	foreach($evenementS as $row){
		$id_evenement=$row['id_evenement'];
		$name=$row['name'];
		$date=$row['date'];
        $image=$row['image'];
        $description=$row['description'];
        $nb_participants=$row['nb_participants'];
        $nb_places=$row['nb_places'];
		$evenement=new Evenement($id_evenement,$name,$date,$nb_places,$image,$description,$nb_places,0,0);

    }
}

?>
<?php
session_start();

if( htmlspecialchars($_SESSION["role"])=="Admin"){?>
<?php include 'Layouts/head.php';?>
<?php include 'Layouts/menu.php';?>
<div class="container">

	<div class="starter-template">
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="UpdateEvenement.php" method="POST" enctype="multipart/form-data">

							
							<legend>Edit [<?php echo $name  ?>]</legend>
							<input type="hidden" name="id_evenement" value="<?php echo $evenement->getid_evenement() ?>">
							

							<div class="form-group">
								<label for="name">Nom</label>
								<input type="text" name="nom" class="form-control"  autofocus required placeholder=" name" value="<?php echo is_null($evenement) ? "" : $name ?>">
							</div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control"  autofocus required placeholder="date" value="<?php echo is_null($evenement) ? "" : $date ?>">
                            </div>
                            <div class="form-group">
                                <label for="nb">Places Disponible</label>
                                <input type="number" name="nb_places" class="form-control"  autofocus required placeholder="places disponibles" value="<?php echo is_null($evenement) ? "" : $nb_places ?>">
                            </div>
							<div class="form-group">
								<label for="image">Image</label>
								<input type="file" name="avatar" class="form-control" value="<?php echo is_null($evenement) ? "" : $image ?>">
							</div>

							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" name="des" class="form-control"  autofocus required placeholder="description" value="<?php echo is_null($evenement) ? "" : $description ?>">
							</div>

                           


							<button type="submit" name='ajouter' class="btn btn-success"> <?php echo is_null($evenement) ? "Create" : "Edit" ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'Layouts/footer.php';?>
<?php } 
     else {
        header("Location: ../front/afficherEvenement.php");

    }
     ?>