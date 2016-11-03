<?php
session_start();
$config = parse_ini_file('config.ini');
$loggedin = $_SESSION["loggedin"]; //username
$isAdmin = $_SESSION["isAdmin"];
if (strlen($loggedin) === 0) {
	header('Location: index.php' ) ;
}
//get user profile image URL
$imageUrl = "./img/".$loggedin.".png";
$url=getimagesize($imageUrl);
if(!is_array($url)) {
	// The image does not exist
	$imageUrl = "./img/default.png";
}
?>
