<?php include 'header.php';?>

<!DOCTYPE html>
<html>
<head>
	<title>USERVER</title>
	<link rel="stylesheet" type="text/css" href="mnje.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="libs/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'menubar.php';?>

<h3 style="display:inline">USERVER</h3><br><br>

<?php
$output = shell_exec('pgrep nodejs');
$trimmedOutput = trim($output);
if (strlen($trimmedOutput) > 0) {
	//service is running
	echo "The USERVER is <span class='label label-success'>running</span>.  pid = ".$trimmedOutput."<br><br>";
	echo "<button id='stop' type='button' class='btn btn-primary active'>Stop</button>";
?>
	<script>
	//AJAX JQuery instead of page reloading
	$(document).ready(function(){
		$('#stop').click(function()
		{
				window.location.replace("stopserver.php");
		});
	});
	</script>

<?php
} else {
	//service is down
	echo "The USERVER is <span class='label label-danger'>down</span>.<br><br>&nbsp;&nbsp;";
	echo "<button id='start' type='button' class='btn btn-primary active'>Start</button>";
	?>
	<script>
	//AJAX JQuery instead of page reloading
	$(document).ready(function(){
		$('#start').click(function()
		{
				window.location.replace("startserver.php");
		});
	});
	</script>

	<?php
}
?>




</body>
</html>
