
<?php
include_once("../lib/Session.php");
Session::checkAdminLogin();

header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>
<head>
	<title>Login</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <link href="../css/MaterialIcons/icon.css" rel="stylesheet">  
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script class="jsbin" src="../js/jquerymin/jquery.min.js"></script>


	<!--<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/functions.css">
	
	<script src="js/main.js"></script>
	<script src="js/uploadimage.js"></script>
	<script src="js/functions.js"></script> -->

</head>
<body>

<nav class="light-blue darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li> 
        <!--Menu de opciones desktop-->        
        <!--Menu de opciones desktop-->
      </ul>
      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link header</a></li>
        <!--Menu de opciones responsive-->        
        <!--Menu de opciones responsive-->
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>





















 