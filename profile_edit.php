<?php

    session_start();
    $config = parse_ini_file('config.ini');

    //if the user is not logged in, redirect to the login page
    $loggedin = $_SESSION["loggedin"];
    if (strlen($loggedin) == 0) {
        header('Location: index.php' ) ;
    }

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip_code = filter_input(INPUT_POST, 'zip_code');
    $email = filter_input(INPUT_POST, 'email');

    $mysqli = new mysqli($config["hostname"], $config["dbuser"], $config["dbpass"], $config["dbname"]);

    # check connection
    if ($mysqli->connect_errno) {
        $arr = array("text" => "MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}", "rc" => "0");
        echo json_encode($arr);
        exit();
    }
     else {
        $sql = "UPDATE user_data SET username='$username', password='$password', first_name='$first_name', last_name='$last_name', address='$address', city='$city', state='$state', zip_code='$zip_code', email='$email' WHERE username='$loggedin'";
        $_SESSION["loggedin"] = $username;   // update loggedin username to reflect change

        if ($mysqli->query($sql) === TRUE) {
            $arr = array("text" => "Profile updated.", "rc" => "1");
        }
        else {
            $error = $mysqli->error;
            $arr = array("text" => "Update failed.", "rc" => "0");
        }
        echo json_encode($arr);
    }
    $mysqli->close();
    exit();
?>
