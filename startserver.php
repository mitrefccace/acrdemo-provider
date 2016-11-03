<?php
session_start();
$config = parse_ini_file('config.ini');
$loggedin = $_SESSION["loggedin"];
$isAdmin = $_SESSION["isAdmin"];
if (strlen($loggedin) === 0 || !$isAdmin ) {
	header('Location: userver.php');
}

$output = shell_exec('pgrep nodejs');
$trimmedOutput = trim($output);
if (strlen($trimmedOutput) === 0) {
	//service is down
	exec('bash -c "exec nohup setsid /var/www/html/userver/startup.sh > /dev/null 2>&1 &"');
}
header('Location: home.php');
$_SESSION["clickButton"] = "serverbutton";
exit();
?>
<!DOCTYPE html>
<html><head><title></title></head><body></body></html>
