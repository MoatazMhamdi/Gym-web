<?PHP
include "../Core/EvenementC.php";
session_start ();
if ($_SESSION["loggedin"]){
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
  }else{
    $currentPage = 1;
  }
   // On détermine le nombre d'articles par page
  $parPage = 3;
  $evenment1C=new EvenementC();
  
  $nbEvents=$evenment1C->NbEvents();
  // On calcule le nombre de pages total
  $pages = ceil($nbEvents / $parPage);
  $premier = ($currentPage * $parPage) - $parPage;   
    
$listeEvenments=$evenment1C->afficherEvenements1($premier, $parPage);
}else{
    header("location: login.php");

}


?>
<?php include 'Layouts/head.php';?>

<!-- HERO -->
<!-- CLASS -->
<section class="class section" id="class">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center mb-5">

                <h2 data-aos="fade-up" data-aos-delay="200">let's breathe together</h2>
            </div>

            <tbody>

                <?PHP
foreach($listeEvenments as $row){
    
if (date('Y-m-d')>$row['date']) {
    $evenment1C->modifierEvenementDelai($row,$row['id_evenement']);
    //header('Location: afficherEvenement.php');
    echo '<meta http-equiv="refresh" content="1;url=afficherEvenement.php" />';

}
?>
                <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="../back/Images/<?PHP echo $row['image']; ?>" class="img-fluid" alt="Evenement">

                        <div class="class-info">
                            <h3 class="mb-1"><a
                                    href="detailEvenement.php?id_evenement=<?PHP echo $row['id_evenement']; ?>">
                                    <?PHP echo $row['name']; ?>
                                </a></h3>

                            <span><strong>Date:</strong>
                                <?PHP echo $row['date']; ?>
                            </span>

                            <span class="class-price">
                                <?PHP echo $row['nb_participants']; ?>
                            </span>

                        </div>
                    </div>
                </div>

                <?PHP

}
?>

            </tbody>

          

        </div>
        <br>
        <br>
        
        <nav>
<center>
<div class="col-sm-1">
    <div class="pagination-content">
        <ul class="pagination">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? " disabled" : "" ?>">
                <a href="./afficherEvenement.php?page=<?= $currentPage - 1 ?>" class="page-link">
                    << </a>
            </li>
            <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? " active" : "" ?>">
                <a href="./afficherEvenement.php?page=<?= $page ?>" class="page-link">
                    <?= $page ?>
                </a>
            </li>
            <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? " disabled" : "" ?>">
                <a href="./afficherEvenement.php?page=<?= $currentPage + 1 ?>" class="page-link">>></a>
            </li>
        </ul>
    </div>
</div>
            </center>
</nav>
    </div>
</section>



<!-- FOOTER -->


<!-- Modal -->

<?php require_once('Layouts/footer.php') ;?>