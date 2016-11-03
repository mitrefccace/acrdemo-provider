<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Provider</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="mnje.css">
	<link rel="stylesheet" href="css/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="libs/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<?php include 'menubar.php';?>

<h3 style="display:inline">Welcome.</h3>


<script>

<?php
if (isset($_SESSION["msg"])) {
    echo "document.getElementById('msg').innerHTML='".$_SESSION["msg"]."';";
}else{
    // Fallback behaviour goes here
    echo "document.getElementById('msg').innerHTML='';";
}
?>
</script>

</body>
<?php
unset($_SESSION["msg"]); //do last
?>
</html>
