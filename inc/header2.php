<?php

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	Session::init();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";

	});
	$db = new Database();
	$fm = new Format();
	$usr = new User();
	$exm = new Exam();
	$pro = new Process();

header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Login</title>

  <!-- CSS  
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  -->
  <link href="css/MaterialIcons/icon.css" rel="stylesheet">  
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/functions.css">
	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
	<script src="js/uploadimage.js"></script>
	<script src="js/functions.js"></script>

  <script class="jsbin" src="js/jquerymin/jquery.min.js"></script>
  

  <script>
          //img carga
          //function readURL(input) {
          //  if (input.files && input.files[0]) {
          //      var reader = new FileReader();

          //      reader.onload = function (e) {
          //          $('#blah')
          //              .attr('src', e.target.result);
          //      };

          //      reader.readAsDataURL(input.files[0]);
          // }
        //}
          //img carga          
  </script>
</head>
<body>


<?php 
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header("Location:index.php");
		exit();
	}
	 ?>



  <nav class="light-blue lighten-1" role="navigation">
    <ul>    
    </ul>


    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
        <!--Menu de opciones desktop-->
        <?php
        $login = Session::get("login");
        if ($login == true) {?>

        <li><a href="profile.php">Perfil</a></li>
        <li><a href="Principal.php">Examen</a></li>
        <li><a href="?action=logout">Salir</a></li>
        <?php } else { ?>
        <li><a href="register.php">Registro</a></li>
        <li><a href="index.php">Login</a></li>
        <?php } ?>
        <!--Menu de opciones desktop-->

      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link header</a></li>
        <!--Menu de opciones responsive-->
        <?php
        $login = Session::get("login");
        if ($login == true) {?>

        <li><a href="profile.php">Perfil</a></li>
        <li><a href="Principal.php">Examen</a></li>
        <li><a href="?action=logout">Salir</a></li>
        <?php } else { ?>
        <li><a href="register.php">Registro</a></li>
        <li><a href="index.php">Login</a></li>
        <?php } ?>
        <!--Menu de opciones responsive-->
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
    <!--saludo-->
    <?php
			  $login = Session::get("login");
			  if ($login == true) {?>
		        <span class="orange-text" style="float: right;color: #888;">Bienvenido <strong><?php echo Session::get('name') ; ?></strong></span>
		<?php } ?>
    <!--fin saludo-->


    

  </nav>
  
