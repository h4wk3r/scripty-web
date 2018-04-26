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
<link rel="stylesheet" type="text/css"  href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../../js/modernizr.custom.js"></script>

</head>
<body>
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
    <h1><FONT size="6pt">Installation <span class="color">Client-LDAP</span></FONT></h1>
    <br>
</header>


<html><body>
<!-- Services Section -->
<div id="services-section">
  <div class="container">
    <div class="section-title">
	<center><H1>SCRIPT A DEVELOPPER</h1></center>
	     <div class="contact-form">
	       <!-- Form -->
	        <form id="contact-us" method="post" action="ldap-install.php">
  	        <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
			    <h2><FONT size="5pt">Information <span class="color">Client-LDAP</span></FONT></h2>
  	              	    <input type="text" name="ip" id="ip" required="required" class="form" placeholder="IP / NAME" />
  		            <input type="text" name="port" id="port" required="required" class="form" placeholder="PORT" />
  		            <input type="text" name="user" id="user" required="required" class="form" placeholder="USER" />
			    <input type="password" name="pass" id="pass" required="required" class="form" placeholder="PASSWORD" />
			    <br><br>
			    <h2><FONT size="5pt">Information <span class="color">Server-LDAP</span></FONT></h2>
			    <input type="text" name="srv" id="srv" required="required" class="form" placeholder="LDAP SERVER (ldap://ldap.exemple.com/)" />
                            <input type="text" name="searchbase" id="searchbase" required="required" class="form" placeholder="LDAP SEARCH BASE (dc=exemple,dc=com)" />
                            <input type="text" name="version" id="version" required="required" class="form" placeholder="LDAP VERSION (LDAP version use: 2 or 3)" />
                            <input type="text" name="ldapuser" id="ldapuser" required="required" class="form" placeholder="LDAP ADMIN USER (cn=admin,dc=exemple,dc=com) " />
			    <input type="password" name="ldappass" id="ldappass" required="required" class="form" placeholder="LDAP ADMIN PASSWORD" />
  		      </div>
            	      <div class="col-xs-6 wow animated slideInRight" data-wow-delay=".5s">
  		             <img src="../../img/services/ldap.png" alt="Smiley face" height="325" width="500">
  		      </div>
  		      <div class="relative fullwidth col-xs-12">
  		            <button type="submit" id="submit" name="submit" class="form-btn semibold">Installer</button>
		      </div>    
			    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <center><strong>Attention !</strong> Vous ne pouvez pas revenir en arrière.</center>
                            <div class="clear"></div>
	        </form>
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

</body>

