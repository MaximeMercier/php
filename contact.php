<?php
$titre = 'Contact';
$page = 'contact'; //Verification de la classe active sur le menu
include 'inc/header.php';
?>

<div id="heading-breadcrumbs" class="brder-top-0 border-bottom-0">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">Contact</h1>
            </div>
            <div class="col-md-5">

            </div>
        </div>
    </div>
</div>
<div id="content">
    <div id="contact" class="container">
        <br>
        <section class="bar pt-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading text-center">
                        <h2>Contact form</h2>
                    </div>
                </div>
                <div class="col-md-8 mx-auto">
                    <form action ="" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nom" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Prénom" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input id="subject" type="text" class="form-control" placeholder="Sujet" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Message" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-template-outlined"><i class="fa fa-envelope-o"></i>
                                    Envoyer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script src="js/gmaps.js"></script>
<script src="js/gmaps.init.js"></script>
<script src="js/front.js"></script>
</body>
</html>