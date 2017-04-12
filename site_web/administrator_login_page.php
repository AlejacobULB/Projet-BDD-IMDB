<!--
Jacobs Alexandre, Engelman David, Engelman Benjamin.
INFO-H-303 : Bases de données - Projet IMBD.
Page de recherche avancé de site web.
-->
 <?php session_start(); ?>

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
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="test_css/agency.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>
	<body id="page-top" class="index">
		<?php
			include 'menubar.php';
		?>
		<header>
    		<div class="container">
    			<div class="intro-text">
    				<form action="/administrator_action_page.php"><!--  mettre un renvoi vers un check des data entré, mais pour test le display du admin panel pas besoin-->
    					<style type="text/css">
    						input[type=text], input[type=password] {
							    width: 100%;
							    padding: 15px 15px;
							    margin: 5px 0;
							    color: black;
							    display: inline;
							    border: 2.5px solid yellow;
							    box-sizing: border-box;
							    border-radius: 4px;
							}

							button {
							    background-color: #FFD700;
							    color: black;
							    padding: 15px 15px;
							    margin: 5px 0;
							    border: none;
							    cursor: default;
							    width: 100%;
							    border-radius: 4px;
							}

							button:hover {
							    opacity: 0.5;
							}
    					</style>
					    <label><b>Email</b></label>
					    <input type="text" placeholder="Enter Email" name="email" required>

					    <label><b>Password</b></label>
					    <input type="password" placeholder="Enter Password" name="pswd" required>

					    <button type="submit">Login</button>
					</form>
    			</div>
    		</div>
    	</header>
	</body>
	<script src="./js/jquery-1.12.3.min.js"></script>
	<script src="./js/bootstrap.min.js"></script> 
</html>