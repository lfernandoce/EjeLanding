<?php 

    include_once ("../lib/Session.php");
    Session::checkAdminSession();
    include_once ("../lib/Database.php");
    include_once ("../helpers/Format.php");
	$db  = new Database();
	$fm  = new Format();

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
	<link rel="stylesheet" href="css/admin.css">
</head>
<body>

<nav class="light-blue darken-4" role="navigation">
    <ul>    
    </ul>


    <div class="nav-wrapper container"><a id="logo-container" href="<?php
                                                                          $login = Session::get("login");
                                                                          if ($login == true) { 
                                                                            echo "Principal.php";
                                                                          }
                                                                          else{
                                                                            echo "index2.php";
                                                                          }?>" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <!-- <li><a href="#">Navbar Link</a></li> -->
        <!--Menu de opciones desktop-->
        <?php
        $login = Session::get("login");
        if ($login == true) {?>
        <li><a href="Principal.php">Inicio</a></li>
        <li><a href="profile.php">Perfil</a></li>        
        <li><a href="?action=logout">Salir</a></li>
        <?php } else { ?>
        <li><a href="register2.php">Registro</a></li>
        <li><a href="index2.php">Login</a></li>
        <?php } ?>
        <!--Menu de opciones desktop-->

      </ul>

      <ul id="nav-mobile" class="sidenav">
        <!-- <li><a href="#">Navbar Link header</a></li> -->
        <!--Menu de opciones responsive-->
        <?php
        $login = Session::get("login");
        if ($login == true) {?>
        <li><a href="Principal.php">Inicio</a></li>
        <li><a href="profile.php">Perfil</a></li>        
        <li><a href="?action=logout">Salir</a></li>
        <?php } else { ?>
        <li><a href="register2.php">Registro</a></li>
        <li><a href="index2.php">Login</a></li>
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



<div class="phpcoding">
	<section class="headeroption"></section>

	<?php 
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header("Location:login.php");
		exit();
	}
	 ?>
		<section class="maincontent">
		<div class="menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="users.php">Manage User</a></li>
			<li><a href="quesadd.php">Add Ques</a></li>
			<li><a href="queslist.php">Ques List</a></li>
			<li><a href="?action=logout">Logout</a></li>
		</ul>
	 </div>
	