<!DOCTYPE html>
<html lang="en">
<head>
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
    <h1><FONT size="6pt">List of <span class="color">servers</span></FONT></h1>
    <br>
</header>


<html><body>
<!-- Services Section -->
<div id="services-section1">
	<div class=list2>
        	<div class=tab2>
        	        <form action="search.php" class="form" method="get">
        	                RECHERCHE : <input type="text" class="form" name="key" value="NOM/IP DE SERVEUR"><br />
				<input type="submit" class="form-btn semibold" name="Rechercher" value="Rechercher">
        	        </form>
        	</div>

		<div class=tab2>
			<form action="del.php" class="form" method="post">
        			SUPPRIMER : <input type="text" class="form" name="key1" value="NOM/IP"><br />
				<input type="submit" class="form-btn semibold" name="Supprimer" value="Supprimer">
			</form>
		</div>
		

		<?php
			// Connexion, sélection de la base de données
		$conn = pg_connect("host=localhost port=5432 dbname=scripty user=scripty password=12345");
		if (!$conn) {
			echo "Connexion impossible.\n" . pg_last_error();
			exit;
		}

		// Exécution de la requête SQL  
		$query = "SELECT id, server_name, owner, service1, service2, service3, service4, service5, client_ldap, client_ansible, client_nagios FROM inventory";
		$result = pg_query($query);
		if (!$result) {
			echo "Échec de la requête :\n" . pg_last_error();
			exit;
		}

		// Affichage des résultats en HTML
		echo "<table>\n";
		echo "\t\t<th><b><center>ID</center></b></th>\n<th><b><center>SERVER_NAME</center></b></th>\n<th><b><center>OWNER</center></b></th>\n<th><b><center>SERVICE1</center></b></th>\n<th><b><center>SERVICE2</center></b></th>\n<th><b><center>SERVICE3</center></b></th>\n<th><b><center>SERVICE4</center></b></th>\n<th><b><center>SERVICE5</center></b></th>\n<th><b><center>CLIENT_LDAP</center></b></th>\n<th><b><center>CLIENT_ANSIBLE</center></b></th>\n<th><b><center>CLIENT_NAGIOS</center></b></th>";
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
			echo "\t<tr>\n";
			foreach ($line as $col_value) {
				echo "\t\t<td>$col_value</td>\n";
			}
			echo "\t</tr>\n";	
		}
		echo "</table>\n";
		pg_close($conn);
	?>
	</div>
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
