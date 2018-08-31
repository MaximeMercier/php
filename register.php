<?php
$titre = 'Inscription';
$page = 'register'; //Verification de la classe active sur le menu
include 'inc/header.php';
?>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">Inscription</h1>
            </div>
            <div class="col-md-5">

            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="box">
                    <h2 class="text-uppercase">Nouveau Compte</h2>
                    <p class="lead">Vous n'avez pas de compte? Inscrivez-Vous !</p>
                    <hr>
                    <form action="account.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pseudo" name="pseudo">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="mail">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Mot de passe" name="pass">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Mot de passe - Vérification"
                                   name="pass2">
                        </div>
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LchG18UAAAAAKMgnK1HnTCOqag1mgHkEGwB-qjD"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-template-outlined"><i class="fa fa-user-md"></i>
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box">
                    <h2 class="text-uppercase">Connexion</h2>
                    <p class="lead">Vous avez déja un compte ? Connectez-vous !</p>
                    <hr>
                    <form action="account.php" method="POST">
                        <div class="form-group">
                            <input id="email" type="text" class="form-control" placeholder="Email" name="login">
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control" placeholder="Mot de passe" name="pwd">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-template-outlined"><i class="fa fa-sign-in"></i>
                                Connexion
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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