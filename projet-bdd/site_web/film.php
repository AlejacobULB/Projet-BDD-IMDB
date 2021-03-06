<!--
Jacobs Alexandre, Engelman David, Engelman Benjamin.
INFO-H-303 : Bases de données - Projet IMBD.
-->

<?php
include "tools.php";
session_start();
$id = urldecode($_GET['id']);
$_SESSION['id'] = $id;
$database = new mysqli("localhost", "root", "imdb", "IMDB");
if (!$database) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
} else {
    $id = mysqli_real_escape_string($database, $id);

    //fecth the movie
    $querry = "SELECT Titre, AnneeSortie, Note
                FROM Oeuvre
                WHERE ID = '$id'";
    $movie = $database->query($querry);

    //fecth the roles
    $querry = "SELECT Prenom, Nom, Numero, Role 
                FROM Role
                WHERE OID = '$id'";

    $roles = $database->query($querry);

    //fecth the writers
    $querry = "SELECT Prenom, Nom, Numero 
                FROM EcritPar
                WHERE OID = '$id'";

    $writers = $database->query($querry);

    //fecth the directors
    $querry = "SELECT Prenom, Nom, Numero
                FROM DirigePar
                WHERE OID = '$id'";

    $directors = $database->query($querry);

    //fetch countries
    $querry = "SELECT Pays
                FROM Pays
                WHERE ID = '$id'";

    $pays = $database->query($querry);

    //fetch languages
    $querry = "SELECT Langue
                FROM Langue
                WHERE ID = '$id'";

    $languages = $database->query($querry);

    //fetch genres
    $querry = "SELECT Genre
                FROM Genre
                WHERE ID = '$id'";

    $genres = $database->query($querry);

    //fetch plot
    $querry = "SELECT Plot
               FROM Plots
               WHERE ID = '$id'";

    $plot_res = $database->query($querry);

}

?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="iso-8859-1">
    <title>IMD - International movie database</title>

    <!-- Bootstrap Core CSS -->

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/film.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"
            integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY"
            crossorigin="anonymous"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"
            integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo"
            crossorigin="anonymous"></script>
    <![endif]-->

    <script src="js/dynamic_part.js"></script>


</head>

<body id="page-top" class="index">

<!-- Navigation -->
<?php
include 'menubar.php';
?>

<!-- Header -->
<?php
$movie_infos = mysqli_fetch_array($movie);
$plot_info = mysqli_fetch_array($plot_res);
$titre = utf8_encode($movie_infos['Titre']);
$date = $movie_infos['AnneeSortie'];
$note = $movie_infos['Note'];
$titre_format = '%s (%d)';
$note_fomat = '%g/10';
$plot = $plot_info['Plot'];
$nb_roles = utf8_encode(mysqli_num_rows($roles));
$havePlot = utf8_encode(mysqli_num_rows($plot_res));
?>
<header>
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" style="text-align: center">
                    <img class="poster"
                         src="https://s-media-cache-ak0.pinimg.com/originals/f3/5a/d9/f35ad9427be01af5955e6a6ce803f5dc.jpg">
                </div>
                <div class="col-lg-8">
                    <div class="intro-text" id="intro">
                        <div class="intro-heading-with-no-margin" id="titre"><?php echo $titre; ?></div>
                        <div class="intro-heading" id="date"><?php echo $date; ?></div>
                        <div class=infos><?php extractGenres($genres) ?></div>
                        <div class=intro-lead-in><?php if ($note != -1) echo sprintf($note_fomat, $note); ?></div>
                        <a href="https://twitter.com/share"
                           class="twitter-share-button"
                           data-show-count="false"
                           data-text="Hey jetez un coups d'oeil à ce film"
                           data-hashtags="imdb"
                           data-related="twitterapi,twitter">Tweet</a>
                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </div>

</header>

<script>
    add_navbar([["Trailer", "Trailer"],
        ["Résumé", "Resume"], ["Acteur", "Acteurs"],
        ["Directeur", "Directeurs"], ["Auteurs", "Auteurs"],
        ["Détails", "Details"], ["Commentaires", "Comments"]])
</script>


<section id="Trailer" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center" id=trailer-block>
                <h2 class="section-heading" id="trailer-title">Trailer</h2>
                <div align="center">
                    <iframe id="trailer-video" src="http://www.dlclassifieds.com/admin/photos/no-video-available.jpg"
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include "commonMovieEpisode.php" ?>
<?php include "commentSection.php" ?>


</body>
<!-- jQuery -->

<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"
        integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb"
        crossorigin="anonymous"></script>

<!-- Theme JavaScript -->
<script src="js/agency.min.js"></script>
<script src="js/themoviedb.js"></script>
<script src="js/API.js"></script>

<script>

    var titre = "<?php echo $titre;?>";
    var date = "<?php echo $date;?>";
    $(document).ready(function () {
        $("#intro").fadeIn(2000);
        getImagesMovie(titre, date);
        getTrailersMovie(titre, date);
        $(window).scroll(function () {

            if ($(window).scrollTop() > 892 - 61) {
                $('#nav_bar').addClass('navbar-top');
            }

            if ($(window).scrollTop() < 892 - 60) {
                $('#nav_bar').removeClass('navbar-top');
            }
        });

    });

</script>

<script src="js/dynamic_part.js"></script>

<script>
    var havePlot = "<?php echo $havePlot;?>";
    var number_roles = "<?php echo $nb_roles;?>";
    add_dynamic_part_filmAndEp(havePlot, number_roles, 'hideContent-plot', 'hideContent-actors')
</script>

<?php
$logged = 0;
if (isset($_SESSION['logged'])) {
    $logged = 1;
}

$database->close();
?>

<script>

    var plot = "<?php echo addslashes($plot);?>";
    var logged = <?php echo $logged;?>;
    console.log(logged);
    if (logged == 1) {
        addAdminElementsFilmEpisode(plot);
        modifyRows();
    }
</script>

</html>

<?php
$database->close();
?>