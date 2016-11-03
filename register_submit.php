<?php
    //This is the submit (POST) PHP; register.php calls this
    //return 0 if fail, 1 if success

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip_code = filter_input(INPUT_POST, 'zip_code');
    $email = filter_input(INPUT_POST, 'email');

    $config = parse_ini_file('config.ini');
    $mysqli = new mysqli($config["hostname"], $config["dbuser"], $config["dbpass"], $config["dbname"]);

    # check connection
    if ($mysqli->connect_errno) {
        $arr = array("text" => "MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}", "rc" => "0");

        echo json_encode($arr);
        exit();
    }

    # Add a check to make sure that the username/email address are not already registered
    $sql = "SELECT * FROM user_data WHERE username LIKE '{$username}' OR email LIKE '{$email}' LIMIT 1";
    $result = $mysqli->query($sql);
    if ($result->num_rows === 1) {
        $arr = array("text" => "Registration failed - username or email address already registered", "rc" => "0");
        echo json_encode($arr);
    }
    else {
        # Do the MySQL INSERT here
        /* @var $sql type */
        $sql = "INSERT INTO user_data (vrs, username, password, first_name, last_name, address, city, state, zip_code, email) VALUES (null, '{$username}', '{$password}', '{$first_name}', '{$last_name}', '{$address}', '{$city}', '{$state}', '{$zip_code}', '{$email}')";

        if ($mysqli->query($sql) === TRUE) {
            # added successfully rc => 1
            $arr = array("text" => "Registration successful", "rc" => "1");
        }
        else {
            # not added rc => 0
            // $arr = array("text" => "Registration unsuccessful", "rc" => "0");

            $error = $mysql->error;

            $arr = array("text" => "{$error}", "rc" => "0");
        }

        echo json_encode($arr);

    }

    $mysqli->close();
    exit();
?>

<!DOCTYPE html>
<html><head><title></title></head><body></body></html>
