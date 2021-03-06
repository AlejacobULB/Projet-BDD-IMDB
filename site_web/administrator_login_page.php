<!--
Jacobs Alexandre, Engelman David, Engelman Benjamin.
INFO-H-303 : Bases de données - Projet IMBD.
Page de recherche avancé de site web.
-->
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>IMD - International movie database</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.css" rel="stylesheet">


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

</head>
<body id="page-top" class="index">
<?php
include 'menubar.php';
?>

<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-heading">Connexion administrateur</div>
            <?php if (isset($_SESSION['errors'])): ?>
                <div class="form-errors">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <p><?php echo $error ?></p>
                    <?php endforeach; ?>
                </div>
                <?php $_SESSION['errors'] = null; ?>
            <?php endif; ?>
            <form action="check_login_admin.php" name="search" id="searchForm" method="post">

                <div class="form-group text-center">
                    <input type="email" class="form-control" placeholder="Adresse mail" name="mail" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mot de passe " name="password" required>
                    <!-- pour fixer des contraintes sur l'entré utilisateur à mettre dans le input avant "required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" -->
                </div>
                <div class="col-lg-12 text-center">
                    <div id="success"></div>
                    <button type="submit" class="btn btn-xl">connexion</button>
                </div>
            </form>

        </div>
    </div>


</header>
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

</html>