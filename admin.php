<?php include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User Registration Management Console</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="mnje.css">
		<link rel="stylesheet" href="css/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="libs/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/admin.js"></script>
		<script type="text/javascript" src="js/jquery-latest.js"></script>
		<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
    <link rel="stylesheet" href="js/themes/blue/style.css" type="text/css" id="" media="print, projection, screen" />




     <script type="text/javascript">
        $(document).ready(function() {
         $("#test").tablesorter();
         });
     </script>
    </head>
<body>
<?php include 'menubar.php';?>

<h3 style="display:inline">Administration</h3>

<?php

## connect mysql server
	$mysqli = new mysqli($config["hostname"], $config["dbuser"], $config["dbpass"], $config["dbname"]);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
	# query database for all registration data
	$result = $mysqli->query('SELECT * from user_data');
	# query for details view.
	$q2Result = $mysqli->query('SELECT * from user_data');

if (!(filter_input(INPUT_POST, 'submit')) ) {
?>
	<!-- The HTML Admin Update form -->
 <form class="form-horizontal" role="form" id="frm1" action="<?=$_SERVER['PHP_SELF']?>" method="post" >
    <br>
    <div class="form-group">
         <label for="username_u" class="col-sm-2 control-label">Username</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="username_u" name="username_u" placeholder="Username"  value="<?php echo $row['username']?>" />
         </div>
    </div>

    <div class="form-group">
         <label for="password_u" class="col-sm-2 control-label">Password</label>
         <div class="col-sm-4">
            <input type="password" class="form-control" id="password_u" name="password_u" placeholder="Password" value="<?php echo $row['password']?>" />
         </div>
    </div>

    <div class="form-group">
         <label for="first_name_u" class="col-sm-2 control-label">First Name</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="first_name_u" name="first_name_u" placeholder="First Name" value="<?php echo $row['first_name']?>"  />
         </div>
    </div>

    <div class="form-group">
         <label for="last_name_u" class="col-sm-2 control-label">Last Name</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="last_name_u" name="last_name_u" placeholder="Last Name" value="<?php echo $row['last_name']?>"  />
         </div>
    </div>

    <div class="form-group">
         <label for="address_u" class="col-sm-2 control-label">Address</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="address_u" name="address_u" placeholder="Address" value="<?php echo $row['address']?>"  />
         </div>
    </div>

    <div class="form-group">
         <label for="city_u" class="col-sm-2 control-label">City</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="city_u" name="city_u" placeholder="City" value="<?php echo $row['city']?>"  />
         </div>
    </div>

	<div class="form-group">
	  <label for="state_u" class="col-sm-2 control-label">State</label>
      <div class="col-sm-4">
	  <select class="form-control" id="state_u" name="state_u">
			<option value="">&lt;select&gt;</option>
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="AR">Arkansas</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DE">Delaware</option>
			<option value="DC">District of Columbia</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="IA">Iowa</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="ME">Maine</option>
			<option value="MD">Maryland</option>
			<option value="MA">Massachusetts</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MS">Mississippi</option>
			<option value="MO">Missouri</option>
			<option value="MT">Montana</option>
			<option value="NE">Nebraska</option>
			<option value="NV">Nevada</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VT">Vermont</option>
			<option value="VA">Virginia</option>
			<option value="WA">Washington</option>
			<option value="WV">West Virginia</option>
			<option value="WI">Wisconsin</option>
			<option value="WY">Wyoming</option>
	  </select>
      </div>
	</div>

    <div class="form-group">
         <label for="zip_code_u" class="col-sm-2 control-label">Zip Code</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="zip_code_u" name="zip_code_u" placeholder="Zip Code" value="<?php echo $row['zip_code']?>"  />
         </div>
    </div>

    <div class="form-group">
         <label for="email_u" class="col-sm-2 control-label">Email</label>
         <div class="col-sm-4">
            <input type="text" class="form-control" id="email_u" name="email_u" placeholder="Email" value="<?php echo $row['email']?>"  />
         </div>
    </div>
    <input style="visibility:hidden" type="type" id="vrs_u" name="vrs_u" value="<?php echo $row['vrs']?>" />


	<input type="submit" name="submit" id="submit" value="Update" disabled   class="btn btn-primary"  />


<table  id="test" class="tablesorter" border="2">
        <thead>
            <tr>
                <th class="header">USERNAME</th>
                <th class="header">PASSWORD</th>
				<th class="header">FIRST_NAME</th>
				<th class="header">LAST_NAME</th>
				<th class="header">ADDRESS</th>
				<th class="header">CITY</th>
				<th class="header">STATE</th>
				<th class="header">ZIP_CODE</th>
				<th class="header">EMAIL</th>
            </tr>
        </thead>
        <tbody>
        <?php
            //while($row = mysql_fetch_array($result)) {
			while($q2Row = $q2Result->fetch_assoc()){
            ?>
                <tr id="vrs_<?php echo $q2Row['vrs']?>" onClick="copyData('<?php echo $q2Row['vrs']?>')">
                    <td id="username_<?php echo $q2Row['vrs']?>"><?php echo $q2Row['username']?></td>
                    <td id="password_<?php echo $q2Row['vrs']?>"><?php echo $q2Row['password']?></td>
					<td id="first_name_<?php echo $q2Row['vrs']?>"><?php echo $q2Row['first_name']?></td>
					<td id="last_name_<?php echo $q2Row['vrs']?>"><?php echo $q2Row['last_name']?></td>
					<td id="address_<?php echo $q2Row['vrs']?>"><?php echo $q2Row['address']?></td>
					<td id="city_<?php echo $q2Row['vrs']?>"><?php echo $q2Row['city']?></td>
					<td id="state_<?php echo $q2Row['vrs']?>"><?php echo $q2Row['state']?></td>
					<td id="zip_code_<?php echo $q2Row['vrs']?>"><?php echo $q2Row['zip_code']?></td>
					<td id="email_<?php echo $q2Row['vrs']?>"><?php echo $q2Row['email']?></td>
				</tr>
            <?php
            }
            ?>
            </tbody>
            </table>
      </form>
<?php
} //end opening if
else
{

	# prepare data for update to database
  $vrs			= filter_input(INPUT_POST, 'vrs_u');
	$username	= filter_input(INPUT_POST, 'username_u');
	$password	= filter_input(INPUT_POST, 'password_u');
	$first_name	= filter_input(INPUT_POST, 'first_name_u');
	$last_name	= filter_input(INPUT_POST, 'last_name_u');
	$address	= filter_input(INPUT_POST, 'address_u');
	$city		= filter_input(INPUT_POST, 'city_u');
	$state		= filter_input(INPUT_POST, 'state_u');
	$zip_code	= filter_input(INPUT_POST, 'zip_code_u');
	$email		= filter_input(INPUT_POST, 'email_u');


	# update existing record in mysql database
		$sql = "UPDATE user_data SET username='{$username}',password='{$password}',first_name='{$first_name}',last_name='{$last_name}',address='{$address}',city='{$city}',state='{$state}',zip_code='{$zip_code}',email='{$email}' WHERE vrs='{$vrs}'";
//		echo $sql;
	if ($mysqli->query($sql)) {
			//echo "<p>Updated successfully!</p>";
            $_SESSION["msg"] = "Updated successfully!";
		} else {
			//echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
            $_SESSION["msg"] = "MySQL error no ".$mysqli->errno." : ".$mysqli->error;
		}

    header("Location: "."./home.php"); /* Redirect browser */
    exit();
}
?>

</body>
</html>
