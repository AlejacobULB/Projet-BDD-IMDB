<!--
Jacobs Alexandre, Engelman David, Engelman Benjamin.
INFO-H-303 : Bases de données - Projet IMBD.
Page d'acceuill de site web.
-->

 <?php
    session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <title>IMD - International movie database</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->


</head>

<body style="background-color: #126a9d">

<!-- Navigation -->
<?php

include 'menubar.php';

?>




<!-- Header -->
<header>

    <div class="container">
        <div class="intro-text" id="intro" style="display: none; background-color: ">
            <div class="intro-lead-in" id="bienvenue"  >Bienvenue sur IMDB!</div>
            <div class="intro-heading" id ="sous-titre">Recherchez un film, une série, un acteur et plus</div>

            <!-- search bar -->
            <form action="search_results.php" style="display: inline-block">

                <input type="text2" name="search" placeholder="Tapez ici votre recherche ..." style="display: block; height: 60px; margin-right: 20px; padding: 10px; float: left; border: 5px solid #fed136" required>
                <button class="btn btn-primary" id="search-button" type="submit" value="Find" style="display: block; margin: 0px;  width: 90px; height: 62px; padding: 0px; ">
                    <span class="glyphicon glyphicon-search"></span>
                </button>

            </form>

        </div>
    </div>


</header>



<!-- Travel Section -->

    <section id="travel" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                   <div class="stat-member">
                       <h4>Films</h4>
                   </div>
                </div>
                <div class="col-sm-2">
                    <div class="stat-member">
                        <h4>Séries</h4>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="stat-member">
                        <h4>Acteurs</h4>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="stat-member">
                        <h4>Auteurs</h4>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="stat-member">
                        <h4>Directeurs</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

<!-- jQuery -->

<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

<!-- Theme JavaScript -->
<script src="js/agency.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#intro").fadeIn(2000);
    });

</script>


</html>
