<?php
session_start();
$loggedin = $_SESSION["loggedin"];
if (strlen($loggedin) == 0) {
	header('Location: index.php' ) ;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Under Construction</title>
</head>
<body>
</body>
</html>
