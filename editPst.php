<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/classes/Taller.php');
$taller = new Taller();

//there have no need if condition because we are passing values using ajaz
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//$email = $_POST['email'];
	//$password = $_POST['password'];
	//$userlogin = $taller->userLogin($email,$password);
    

}
?>