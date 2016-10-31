<?php
session_start();
$config = parse_ini_file('config.ini');
$loggedin = $_SESSION["loggedin"];
$isAdmin = $_SESSION["isAdmin"];
if (strlen($loggedin) === 0 || !$isAdmin ) {
	header('Location: userver.php');
}

$pid = shell_exec('pgrep nodejs');
$trimmedPid = trim($pid);
if (strlen($trimmedPid) > 0) {
	exec("kill -9 $trimmedPid");
}
header('Location: home.php');
$_SESSION["clickButton"] = "serverbutton";
exit();
?>

<!DOCTYPE html>
<html><head><title></title></head><body></body></html>
