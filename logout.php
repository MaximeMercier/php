<?php
$titre = 'Déconnexion';
$page = 'logout'; //Verification de la classe active sur le menu
include 'inc/header.php';
?>

<div id="content">
    <div class="container">
        <div id="error-page" class="col-md-8 mx-auto text-center">
            <div class="box">
                <h3>Etes vous sus de vouloir vous déconnecter ?</h3>
                <form action="" method="post">
                    <div class="text-center">
                        <button type="submit" class="btn btn-template-outlined" name="oui"><i class="fa fa-home"></i>
                            Oui
                        </button>
                        <button type="submit" class="btn btn-template-outlined" name="non"><i class="fa fa-user"></i>
                            Non
                        </button>
                    </div>
                </form>
                <?php
                if (isset($_POST['oui'])) {
                        $_SESSION['droit'] = 0;
                        $_SESSION['login'] = "";
                    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
                    } if (isset($_POST['non']))
                    echo '<meta http-equiv="refresh" content="0; URL=account.php">';
                ?>
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