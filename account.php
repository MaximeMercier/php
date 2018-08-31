<?php
$titre = 'Profil';
$page = 'account'; //Verification de la classe active sur le menu
include 'inc/header.php';

/* Inscription */
if (isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['pass2'])) {
    $hashreg = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    /* Google Recaptcha */
    // Ma clé privée
    $secret = "6LchG18UAAAAAGkhwrmC1faDypCExJpl2sV1DUCO";
    // Paramètre renvoyé par le recaptcha
    $response = $_POST['g-recaptcha-response'];
    // On récupère l'IP de l'utilisateur
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
        . $secret
        . "&response=" . $response
        . "&remoteip=" . $remoteip;
    $decode = json_decode(file_get_contents($api_url), true);
    if ($decode['success'] == true) {
        if ($_POST['pass'] == $_POST['pass2']) {
            $reqinsert = "INSERT INTO user (mail,login,mdp) VALUES ('" . $_POST['mail'] . "','" . $_POST['pseudo'] . "','" . $hashreg . "');";
            $reponse = $bdd->exec($reqinsert);
            echo '<div class="container"><p class="text-success">L\'inscription c\'est effectuée avec succès, vous pouvez maintenant vous connecter</p></div>';
            //session_start();
            $_SESSION ['droit'] = 1;
            $_SESSION ['login'] = $_POST['pseudo'];
        } else {//mdp non identique
            echo '<div class="container"><p class="text-danger">Une erreur est survenue lors de l\'inscription, veuillez réessayer : Les mots de passes ne sont pas identiques</p></div>';
            echo '<meta http-equiv="refresh" content="0; URL=register.php">';
        }
    } else {
        echo '<div class="container"><p class="text-danger">Une erreur est survenue lors de l\'inscription, veuillez réessayer : Le captcha est incorrect</p></div>';
        echo '<meta http-equiv="refresh" content="0; URL=register.php">';
    }
}

/* Connexion */
if (isset($_POST['login']) && isset($_POST['pwd'])) {
    $req = "SELECT * FROM user where login='" . $_POST['login'] . "';";
    $reponse = $bdd->query($req);
    while ($donnees = $reponse->fetch()) {
        $id = $donnees['login'];
        $mdp = $donnees['mdp'];
        if (!empty($_POST['pwd']) && !empty($_POST['login']) && $_POST['login'] == $id && password_verify($_POST['pwd'], $mdp)) {
            echo '<div class="container"><p class="text-success">Connexion réussi, patientez quelques instants...</p></div>';
            //session_start();
            if ($_POST['login'] == "admin")
                $_SESSION ['droit'] = 2;
            else
                $_SESSION ['droit'] = 1;
            $_SESSION ['login'] = $_POST['login'];
           // header("refresh:0");
            echo '<meta http-equiv="refresh" content="0; URL=account.php">';

        } else {
            echo '<div class="container"><p class="text-danger">Connexion impossible</p></div>';
        }
    }
}
if (isset($_SESSION['droit']) && $_SESSION['droit'] != 0){
?>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">Mon compte</h1>
            </div>
            <div class="col-md-5">
                <?php if (isset($_SESSION['login'])) {
                    $req = "SELECT * FROM user where login='" . $_SESSION['login'] . "';";
                    $reponse = $bdd->query($req);
                    while ($donnees = $reponse->fetch()) {
                        $id = $donnees['login'];
                        $mail = $donnees['mail'];
                        $avatar = $donnees['avatar'];

                        echo '<ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item">' . $id . ' - ' . $mail . '</li>  
              </ul>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="row bar">
            <div id="customer-account" class="col-lg-9 clearfix">
                <p class="lead">Profil</p>
                <p class="text-muted">Vous pouvez gérer votre espace client ici</p>
                <div class="box mt-5">
                    <div class="heading">
                        <h3 class="text-uppercase">Changez votre mot de passe</h3>
                    </div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_old">Ancien mot de passe</label>
                                    <input id="password_old" type="password" class="form-control" name="password_old">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_1">Nouveau mot de passe</label>
                                    <input id="password_1" type="password" class="form-control" name="password_1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_2">Confrmez votre nouveau mot de passe</label>
                                    <input id="password_2" type="password" class="form-control" name="password_2">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-template-outlined"><i class="fa fa-save"></i> Sauvegarder le nouveau mot de passe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
                <!-- CUSTOMER MENU -->
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="h4 panel-title">Customer section</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-pills flex-column text-sm">
                            <li class="nav-item"><a href="customer-orders.html" class="nav-link active"><i
                                            class="fa fa-list"></i> My orders</a></li>
                            <li class="nav-item"><a href="customer-wishlist.html" class="nav-link"><i
                                            class="fa fa-heart"></i> My wishlist</a></li>
                            <li class="nav-item"><a href="account.php" class="nav-link"><i class="fa fa-user"></i>
                                    My account</a></li>
                            <li class="nav-item"><a href="index.php" class="nav-link"><i class="fa fa-sign-out"></i>
                                    Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
else echo'<div class="container"><p class="text-danger"> Vous n\'avez pas l\'autorisation de voir cette page</p></div>';
include 'inc/footer.php'; ?>
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