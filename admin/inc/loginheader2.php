
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
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="phpcoding">
	<section class="headeroption"></section>
		<section class="maincontent">
<nav class="light-blue darken-4" role="navigation">
    <ul>    
    </ul>





















    <nav class="light-blue darken-4" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" class="brand-logo">Logo</a>
            <ul class="right hide-on-med-and-down"> 
                
            </ul>
            <ul id="nav-mobile" class="sidenav">                
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
  </nav>  