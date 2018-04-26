<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="refresh" content="3;return.php" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Scripty-Web</title>
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="../img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="../img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="../img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="../css/return.css" />
<link rel="stylesheet" type="text/css"  href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../css/global.css">
<link rel="stylesheet" type="text/css"  href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../js/modernizr.custom.js"></script>

</head>
<body>
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="../index.php">Scripty</a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php" class="page-scroll">SERVICES</a></li>
        <li><a href="../return/return.php" class="page-scroll">CODE_RETOUR</a></li>
        <li><a href="../inventaire/index.php" class="page-scroll">INVENTAIRE</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header class="text-center" name="home">
  <div class="intro-text">
    <br>
    <h1><FONT size="6pt">Add CODE <span class="color">RETURN</span></FONT></h1>
    <br>
</header>


<html><body>
<!-- Services Section -->
<div id="services-section">
 <?php
	$conn = pg_connect("host=localhost port=5432 dbname=scripty user=scripty password=12345");
	if (!$conn) {
                echo "Connexion impossible.\n" . pg_last_error();
                exit;
        } else echo "Connexion OK <br>";
	$code = $_POST['code']; 
	$description = $_POST['description'];
	
	// Exécution de la requête SQL  
        $query = "INSERT INTO error_code (code, description) VALUES ('$code', '$description')";
	$result = pg_query($query);
        if (!$result) {
                echo "Échec de la requête :\n" . pg_last_error();
                exit;
        } else {
	echo "<br>";
	echo "Le Code d'erreur <b>$code</b> a été ajouter a la base.";
	echo "<br>";
	echo "La Description associer est la suivante : <b>$description</b>.";
	}
	pg_close($conn);
?>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.1.11.1.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/SmoothScroll.js"></script>
<script type="text/javascript" src="../js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="../js/jquery.isotope.js"></script>
<script type="text/javascript" src="../js/jqBootstrapValidation.js"></script>

</body>
</html>
