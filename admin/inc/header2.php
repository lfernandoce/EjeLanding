<?php 

    include_once ("../lib/Session.php");
    include_once ('../lib/Database.php');
    include_once ('../helpers/Format.php');
    Session::checkAdminSession();

    spl_autoload_register(function($class){
		  include_once "../classes/".$class.".php";
  	});

    //include_once ("../lib/Database.php");
    //include_once ("../helpers/Format.php");
	  //$db  = new Database();
	  //$fm  = new Format();
    //$filepath = realpath(dirname(__FILE__));
    //include_once ('../lib/Session.php');    
    //Session::init();
    //include_once ($filepath.'/../lib/Database.php');
    //include_once ($filepath.'/../helpers/Format.php');
	  
    $db = new Database();
    $fm = new Format();
    $usr = new User();
    $exm = new Exam();
    $pro = new Process();
?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>
<head>
	<title>Admin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	  <link rel="stylesheet" href="css/admin.css">
    <link href="../css/MaterialIcons/icon.css" rel="stylesheet">  
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>        
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/functions.css">

    <script src="../js/jquery.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/uploadimage.js"></script>
    <script src="../js/functions.js"></script>
    <script class="jsbin" src="../js/jquerymin/jquery.min.js"></script>
  
  

	<!--<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/functions.css">
	
	<script src="js/main.js"></script>
	<script src="js/uploadimage.js"></script>
	<script src="js/functions.js"></script> -->

  
</head>
<body>

<?php 
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header("Location:login2.php");
		exit();
	}
	 ?>


        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content ">
          <li><a href="users.php" class="orange-text">Crear Usuario</a></li>
          <li><a href="#!" class="orange-text">two</a></li>
          <li class="divider"></li>
          <li><a href="#!" class="orange-text">three</a></li>
        </ul>
        <!-- Dropdown Structure -->
        <ul id="dropdown2" class="dropdown-content ">
          <li><a href="CreateTaller.php" class="orange-text">Agregar Taller</a></li>
          <li><a href="#!" class="orange-text">two</a></li>
          <li class="divider"></li>
          <li><a href="#!" class="orange-text">three</a></li>
        </ul>
        
        
<nav class="light-blue darken-4" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="index2.php" class="brand-logo">Logo</a>
        <ul class="right hide-on-med-and-down">
          <li><a href="index2.php">Home</a></li>
     			
            <!-- <li><a href="users.php">Manage User</a></li>´ -->
           <!-- Dropdown Trigger -->
          <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Talleres<i class="material-icons right">arrow_drop_down</i></a></li>

          <li><a href="queslist.php">Ques List</a></li>
          <li><a href="?action=logout">Logout</a></li>
                  <!-- <li><a href="#">Navbar Link</a></li> -->
        <!--Menu de opciones desktop-->
        <?php
        //$login = Session::get("login");
        $login = Session::get("adminLogin");        
        
        if ($login == true) {?>
        <!-- <li><a href="Principal.php">Inicio</a></li>
        <li><a href="profile.php">Perfil</a></li>         -->
          <li><a href="?action=logout">Salir</a></li>
        <?php } else { ?>
        <!-- <li><a href="register2.php">Registro</a></li> -->
          <li><a href="index2.php">Login</a></li>
        <?php } ?>
        <!--Menu de opciones desktop-->
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <!-- <li><a href="#">Navbar Link header</a></li> -->
        <!--Menu de opciones responsive-->
        <?php
        $login = Session::get("adminLogin");
        if ($login == true) {?>
        <!-- <li><a href="Principal.php">Inicio</a></li>
        <li><a href="profile.php">Perfil</a></li>         -->
        <li><a href="?action=logout">Salir</a></li>
        <?php } else { ?>
        <!-- <li><a href="register2.php">Registro</a></li> -->
        <li><a href="login2.php">Login</a></li>
        <?php } ?>
        <!--Menu de opciones responsive-->
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
    <!--saludo-->
    <?php
			  $login = Session::get("adminLogin");
			  if ($login == true) {?>
		        <span class="orange-text" style="float: right;color: #888;">Bienvenido <strong><?php echo Session::get('adminUser')."     ." ; ?></strong></span>
		<?php } ?>
    <!--fin saludo-->
  </nav>  



<!-- <div class="phpcoding">
	<section class="headeroption"></section> -->

	<?php 
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header("Location:login.php");
		exit();
	}
	 ?>

   
		<!-- <section class="maincontent">
		  <div div class="menu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="users.php">Manage User</a></li>
          <li><a href="quesadd.php">Add Ques</a></li>
          <li><a href="queslist.php">Ques List</a></li>
          <li><a href="?action=logout">Logout</a></li>
		  </ul>
	 </div>
	 -->