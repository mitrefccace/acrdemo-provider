<?php
session_start();
$_SESSION["loggedin"] = "";

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$config = parse_ini_file('config.ini');
$mysqli = new mysqli($config["hostname"], $config["dbuser"], $config["dbpass"], $config["dbname"]);

# check connection
if ($mysqli->connect_errno) {
  $arr = array("text" => "MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}", "rc" => "0");
  echo json_encode($arr);
  exit();
}

# authenticate and authorize
$sql = "SELECT * from user_data WHERE username LIKE '{$username}' AND password LIKE '{$password}' LIMIT 1";
$result = $mysqli->query($sql);
if (!$result->num_rows == 1) {
  $arr = array("text" => "Login failed", "rc" => "0");
  echo json_encode($arr);
} else {
  $_SESSION["loggedin"] = $username;
  $row = $result->fetch_assoc();
  if ($row["isAdmin"] == TRUE) {  //is this an administrator?
    $_SESSION["isAdmin"] = TRUE;
  }
  else {
    $_SESSION["isAdmin"] = FALSE;
  }
  $arr = array("text" => "Login success", "rc" => "1");
  echo json_encode($arr);
}

$mysqli->close();
exit();
?>
<!DOCTYPE html>
<html><head><title></title></head><body></body></html>
