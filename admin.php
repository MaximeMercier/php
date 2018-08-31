<?php
$titre = 'Administration';
$page = 'admin'; //Verification de la classe active sur le menu
include 'inc/header.php';
?>

<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">Administration</h1>
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
<section class="bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- MENUS AND WIDGETS -->
                <div class="panel panel-default sidebar-menu with-icons">
                    <div class="panel-heading">
                        <h3 class="h4 panel-title">Catégories</h3>
                    </div>
                    <div class="panel-body">
                        <ul id="pills-tab" role="tablist" class="nav nav-pills flex-column text-sm">
                            <li class="nav-item"><a id="pills-tab-user" data-toggle="pill" href="#pills-user" role="tab"
                                                    aria-controls="pills-user" aria-selected="true"
                                                    class="nav-link active">Liste des utilisateurs</a></li>
                            <li class="nav-item"><a id="pills-tab-news" data-toggle="pill" href="#pills-news"
                                                    role="tab" aria-controls="pills-news" aria-selected="false"
                                                    class="nav-link">News</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <h3 class="mt-4">Administration</h3>
                <div id="pills-tabContent" class="tab-content">
                    <div id="pills-user" role="tabpanel" aria-labelledby="pills-tab-user"
                         class="tab-pane fade show active">
                        <h2>Liste des utilisateurs</h2>
                        <?php
                        $reqtotal_us = "SELECT COUNT(id) as NbUsers FROM user;";
                        $reponse_tus = $bdd->query($reqtotal_us);
                        $donnees_us = $reponse_tus->fetch();
                        ?>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Nombre total d'utilisateurs
                                <span class="badge badge-info badge-pill"><?php echo $donnees_us['NbUsers']; ?></span>
                            </li>
                        </ul>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Identifiant</th>
                                <th>Email</th>
                                <th>Avatar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $req = "SELECT * FROM user";
                            $reponse = $bdd->query($req);
                            while ($donnees = $reponse->fetch()) {
                                $id = $donnees['login'];
                                $mail = $donnees['mail'];
                                $avatar = $donnees['avatar'];
                                echo '<tr>
        <td>' . $id . '</td>
    <td>' . $mail . '</td>
    <td><img src="' . $avatar . '" alt="logo" style="width: 100px;"></td>
    </tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="pills-news" role="tabpanel" aria-labelledby="pills-tab-news" class="tab-pane fade">
                        <?php
                        $reqtotal_news = "SELECT COUNT(id) as NbNews FROM news;";
                        $reponse_tnews = $bdd->query($reqtotal_news);
                        $donnees = $reponse_tnews->fetch();
                        ?>

                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Nombre total de news
                                <span class="badge badge-primary badge-pill"><?php echo $donnees['NbNews']; ?></span>
                            </li>
                        </ul>
                        <br>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Date</th>
                                <th>Gen</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $req_news = "SELECT * FROM news ORDER BY id DESC LIMIT 5;";
                            $reponse_news = $bdd->query($req_news);
                            while ($donnees1 = $reponse_news->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $donnees1['titre']; ?></td>
                                    <td><?php echo $donnees1['contenu']; ?></td>
                                    <td><?php echo $donnees1['date']; ?></td>
                                    <td><?php echo $donnees1['gen']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                        <h3>Créer une news</h3>
                        <p>Veuillez remplir les champs ci-dessous pour créer une news</p>
                        <form action="" method="post">
                            <div class="form-group">
                                <input placeholder="GenRandom" class="form-control" type="text"
                                       value="<?php echo rand(); ?>" name="GenRandom" required hidden>
                            </div>
                            <div class="form-group">
                                <input placeholder="Date" class="form-control" type="text"
                                       value="<?php echo date("d/m/Y"); ?>" name="Date" required hidden>
                            </div>
                            <div class="form-group">
                                <input placeholder="Titre" class="form-control" type="text" name="titre"
                                       required>
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Entrez le contenu de la news" class="form-control" rows="3"
                                          name="content" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" style="width: 100%;"
                                       value="Publier">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['titre']) && isset($_POST['content'])) {
                            $reqinsert = "INSERT INTO news (titre,contenu,gen,date) VALUES ('" . $_POST['titre'] . "','" . $_POST['content'] . "' ,'" . $_POST['GenRandom'] . "','" . $_POST['Date'] . "');";
                            $reponse = $bdd->exec($reqinsert);
                            echo '<p class="text-success">La news a bien été créé avec succès</p>';
                        } ?>

                        <?php
                        if (isset($_POST['searchgen'])) {
                            $query = $bdd->prepare('SELECT * FROM news WHERE gen=:gen');
                            $query->execute(array('gen' => $_POST['searchgen']));
                            $data = $query->fetch();
                            if ($data['gen']) {
                                $modif_new = "SELECT * FROM news WHERE gen='" . $_POST['searchgen'] . "'";
                                $reponse_mnew = $bdd->query($modif_new);
                                while ($donnees = $reponse_mnew->fetch()) {
                                    $titre = $donnees['titre'];
                                    $contenu = $donnees['contenu'];
                                    $gen = $donnees['gen'];
                                    ?>
                                    <p>Veuillez remplir les champs ci-dessous pour modifier la news</p>
                                    <span class="badge badge-warning"><?php echo 'News : ' . $_POST['searchgen'] ?></span>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input placeholder="Titre" class="form-control" type="text"
                                                   value="<?php echo $titre; ?>" name="titre"
                                                   required>
                                        </div>
                                        <div class="form-group">
                                <textarea placeholder="Entrez le contenu de la news" class="form-control" rows="3"
                                          name="content" required><?php echo $contenu; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" style="width: 100%;"
                                                   value="Modifier">
                                        </div>
                                    </form>
                                    <?php
                                }
                            } else {
                                echo 'existe pas';
                            }
                        } else {
                            ?>
                            <h3>Modifier une news</h3>
                            <p>Entrez le gen de la news à modifier</p>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input placeholder="Entrer le gen" class="form-control" type="text"
                                           name="searchgen"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" style="width: 100%;"
                                           value="Vérifier et modifier">
                                </div>
                            </form>
                        <?php } ?>

                    </div>
                    </div>
                    <div id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" class="tab-pane fade">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                        Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four
                        loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk
                        aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                        aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente
                        labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard
                        ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher
                        vero sint qui sapiente accusamus tattooed echo park.
                    </div>
                    <div id="pills-marketing" role="tabpanel" aria-labelledby="pills-marketing-tab"
                         class="tab-pane fade">Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party
                        before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny
                        pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl
                        keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby
                        sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf
                        salvia freegan, sartorial keffiyeh echo park vegan.<br>Raw denim you probably haven't heard of
                        them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                        cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh
                        dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                        placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate
                        nisi qui.
                    </div>
                </div>
            </div>
        </div>
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