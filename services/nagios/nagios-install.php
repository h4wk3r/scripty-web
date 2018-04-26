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
<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="../../img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="../../img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="../../img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="../../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../../css/global.css">
<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../../js/modernizr.custom.js"></script>

</head>
<body>

<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="../../index.php">Scripty</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../../index.php" class="page-scroll">SERVICES</a></li>
        <li><a href="../../return/return.php" class="page-scroll">CODE_RETOUR</a></li>
        <li><a href="../../inventaire/index.php" class="page-scroll">INVENTAIRE</a></li>
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
    <h1><FONT size="6pt">Installation <span class="color">Client-Nagios</span></FONT></h1>
    <br>
    <div class="clearfix"></div>
</header>

<!-- Services Section -->
<div id="services-section">
  <div class="container">
    <div class="section-title">
        <div class="col-sm-12">
            <div class="wizard-container">
                <form id="register-server" action="" method="" novalidate="novalidate">
                        <div class="card-content">
				<?php
					$ip = $_POST['ip']; 
					$port = $_POST['port'];
					$user = $_POST['user']; 
					$pass = $_POST['pass'];
					$ip_server = $_POST['ip_server'];
					$pass_nagios = $_POST['password_nagios'];
					$namehost = $_POST['namehost'];
				?>
				<br>
			<?php 
				// Connexion, sélection de la base de données
				$conn = pg_connect("host=localhost port=5432 dbname=scripty user=scripty password=12345");
				if (!$conn) {
					echo "Connexion impossible.\n" . pg_last_error();
					exit;
				}

				$cmd = "bash nagios-install.sh $pass $user $ip $port $ip_server $pass_nagios $namehost";
				$output = shell_exec($cmd);
				$i = 0;
				echo "RETOUR DU SCRIPT APRES INSTALLATION :";
				#echo "<pre>$output</pre>";
				$out = explode("\n", $output);
				$i = 0;
				foreach ($out as &$value) {
					list($test, $return) = explode(":", $value);
					$query = "SELECT description FROM error_code WHERE code=$return";
					$result = pg_query ($query);
					while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
						foreach ($line as $col_value) {
							echo "<pre><b>Etape $i :</b> $col_value</pre>";
					$i++;
						}
					}
					if ($return == '8010') {
						$query1 = "SELECT server_name FROM inventory WHERE server_name='$ip'";
						$result1 = pg_query ($query1);
						while ($line1 = pg_fetch_array($result1, null, PGSQL_ASSOC)) {
							foreach ($line1 as $col_value1) {
								$col_value1 = $col_value1;
							}
						}
						$pos = strpos($col_value1, $ip);
						if ($pos === false){
							$query2 = "INSERT INTO inventory(server_name, owner, client_nagios) VALUES('$ip', '$user', '1')";
							$result2 = pg_query ($query2);
							if ($result2) {
								echo "<pre><b>Etape $i :</b> Insertion du serveur <b>$ip</b> dans la base Inventaire.</pre>";
							}
							else {
								echo "<pre><b>Etape $i :</b> Le serveur <b>$ip</b> existe déjà dans la base.</pre>";
							}
						}
						else {
							$query3 = "UPDATE inventory SET client_nagios = '1' WHERE server_name='$ip'";

							$resut3 = pg_query ($query3);
							echo $result3;
							if (!$result3) {
								echo "<pre><b>Etape $i :</b> Mise à jour du serveur <b>$ip</b> dans la base inventaire.</pre>";
							}
							else {
								echo "<pre><b>Etape $i :</b> Erreur lors de la mise à jour de la base.</pre>";
							}
						}
					}	
				}
				pg_close($conn);
			?>
				<br>		
                    </div>
                </form>
            </div>
 	</div>		    
    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript" src="../../js/jquery.1.11.1.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script type="text/javascript" src="../../js/bootstrap.js"></script> 
<script type="text/javascript" src="../../js/SmoothScroll.js"></script> 
<script type="text/javascript" src="../../js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="../../js/jquery.isotope.js"></script> 
<script type="text/javascript" src="../../js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="../../js/contact_me.js"></script> 

<!-- Javascripts
    ================================================== --> 
<script type="text/javascript" src="../../js/main.js"></script>
</body>
</html>
