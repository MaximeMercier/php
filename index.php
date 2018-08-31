<?php
$titre = 'Accueil';
$page = 'index'; //Verification de la classe active sur le menu
include 'inc/header.php';
?>
<div role="alert" class="alert alert-warning alert-dismissible">
    <button type="button" data-dismiss="alert" class="close"><span aria-hidden="true">×</span><span
                class="sr-only">Close</span></button>
    <p style="text-align: center;">Le projet à été importé sur une template pour le rendre plus joli, le PHP est identique sur les 2 versions,
    la version originale est disponible en cliquant sur
        <a href="..\php-old" target="_blank">ce lien</a></p>
    <span style="text-align: center; display: block;"><strong><a href="register.php">Identifiants : admin - admin</a></strong> pour accéder à l'administration</span>
</div>
<section style="background: url('img/photogrid.jpg') center center repeat; background-size: cover;"
         class="bar background-white relative-positioned">
    <div class="container">
        <!-- Carousel Start-->
        <div class="home-carousel">
            <div class="dark-mask mask-primary"></div>
            <div class="container">
                <div class="homepage owl-carousel">
                    <?php
                    $req = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
                    $reponse = $bdd->query($req);
                    while ($donnees = $reponse->fetch()) {
                        $titre = $donnees['titre'];
                        $contenu = $donnees['contenu'];
                        $gen = $donnees['gen'];
                        $date = $donnees['date'];
                        ?>
                        <div class="item">
                            <div class="row">
                                <div class="col-md-7 text-center"><img src="img/template-mac.png" alt=""
                                                                       class="img-fluid">
                                </div>
                                <div class="col-md-5">
                                    <h2><?php echo $titre . ' - ' . $date; ?></h2>
                                    <ul class="list-unstyled">
                                        <li><?php echo $contenu; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Carousel End-->
    </div>
</section>
<?php include 'inc/footer.php'; ?>
</div>
<!-- Javascript files-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper.js/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"></script>
<script src="vendor/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendor/jquery.counterup/jquery.counterup.min.js"></script>
<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
<script src="js/jquery.parallax-1.1.3.js"></script>
<script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
<script src="vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
<script src="js/front.js"></script>
</body>
</html>