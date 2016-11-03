<?php include 'header.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="mnje.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

     <script>
     var rc = "0";
    //AJAX JQuery instead of page reloading
    $(document).ready(function(){

        //***************EDIT BUTTON****************
        $('#editprofile').click(function()
        {
            // make form fields editable
            document.getElementById("username").removeAttribute("readonly");
            document.getElementById("password").removeAttribute("readonly");
            document.getElementById("first_name").removeAttribute("readonly");
            document.getElementById("last_name").removeAttribute("readonly");
            document.getElementById("address").removeAttribute("readonly");
            document.getElementById("city").removeAttribute("readonly");
            document.getElementById("state").removeAttribute("readonly");
            document.getElementById("zip_code").removeAttribute("readonly");
            document.getElementById("email").removeAttribute("readonly");

            // hide EDIT PROFILE button and show SAVE button
            //$("#editprofile").text("Save");
            document.getElementById("saveprofile").style.display = "block";
            document.getElementById("editprofile").style.display = "none";
        });

        function validateForm() {
        var x = $('#username').val();
        if (x === null || x === "") {
            $('#statusmsg').attr("class","errmsg").text("Username field is required.");
            return false;
        }
        x = $('#password').val();
        if (x === null || x === "") {
            $('#statusmsg').attr("class","errmsg").text("Password field is required.");
            return false;
        }
        x = $('#first_name').val();
        if (x === null || x === "") {
            $('#statusmsg').attr("class","errmsg").text("First name field is required.");
            return false;
        }
        x = $('#last_name').val();
        if (x === null || x === "") {
            $('#statusmsg').attr("class","errmsg").text("Last name field is required.");
            return false;
        }
        x = $('#email').val();
        if (x === null || x === "") {
            $('#statusmsg').attr("class","errmsg").text("Email address field is required.");
            return false;
        }
        return true;
    };

    //**************SAVE BUTTON*****************
    $('#saveprofile').click(function()
    {
        rc = "0";
        //alert ("clicking save");
        if (!validateForm()) {
          $('#statusmsg').attr("class","succmsg").text(msg.text);
          $('#myModal').modal('show');
          return;
       }

    //get data from form
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var first_name = document.getElementById('first_name').value;
    var last_name = document.getElementById('last_name').value;
    var address = document.getElementById('address').value;
    var city = document.getElementById('city').value;
    var state = document.getElementById('state').value;
    var zip_code = document.getElementById('zip_code').value;
    var email = document.getElementById('email').value;

    //make AJAX call
    $.ajax({
        url: "profile_edit.php",
        type:'POST',
        data:
        {
            username: username,
            password: password,
            first_name: first_name,
            last_name: last_name,
            address: address,
            city: city,
            state: state,
            zip_code: zip_code,
            email: email
        },
        dataType: "json" //expect a JSON response
        }).done(function(msg) {
            //success
          $('#statusmsg').attr("class","succmsg").text(msg.text);
          rc = "1";
        }).fail(function(jqXHR, textStatus, errorThrown) {
            //fail
            s = "status: " + jqXHR.status + ", textStatus: " + textStatus + ", errorThrown: " + errorThrown;
            $('#statusmsg').attr("class","errmsg").text("error - "+s);
        }).complete(function(msg) {
            //always executed
            $('#myModal').modal('show');
        });
    });
    });
    </script>
</head>
<body>
	<?php include 'menubar.php';?>
    <!-- Add new code here -->
    <h1 style="display:inline">User Profile</h1>

    <?php
        $mysqli = new mysqli($config["hostname"], $config["dbuser"], $config["dbpass"], $config["dbname"]);

        # check connection
        if ($mysqli->connect_errno) {
            $arr = array("text" => "MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}", "rc" => "0");

            echo json_encode($arr);
            //exit();
        }
    ?>

    <form class="form-horizontal" role="form">
    <?php
        $sql = "SELECT * FROM user_data WHERE username='$loggedin'";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="form-group"><label for="username" class="control-label col-sm-2" >Username</label><div class="col-sm-4"><input type="text" class="form-control" id="username" name="username" value="'.$row["username"].'"readonly></div></div>';
                echo '<div class="form-group"><label for="password" class="control-label col-sm-2" >Password</label><div class="col-sm-4"><input type="text" class="form-control" id="password" name="password" value="'.$row["password"].'"readonly></div></div>';
                echo '<div class="form-group"><label for="first_name" class="control-label col-sm-2" >First Name</label><div class="col-sm-4"><input type="text" class="form-control" id="first_name" name="first_name" value="'.$row["first_name"].'"readonly></div></div>';
                echo '<div class="form-group"><label for="last_name" class="control-label col-sm-2" >Last Name</label><div class="col-sm-4"><input type="text" class="form-control" id="last_name" name="last_name" value="'.$row["last_name"].'"readonly></div></div>';
                echo '<div class="form-group"><label for="address" class="control-label col-sm-2" >Address</label><div class="col-sm-4"><input type="text" class="form-control" id="address" name="address" value="'.$row["address"].'"readonly></div></div>';
                echo '<div class="form-group"><label for="ciy" class="control-label col-sm-2" >City</label><div class="col-sm-4"><input type="text" class="form-control" id="city" name="city" value="'.$row["city"].'"readonly></div></div>';
                echo '<div class="form-group"><label for="state" class="control-label col-sm-2" >State</label><div class="col-sm-4"><input type="text" class="form-control" id="state" name="state" value="'.$row["state"].'"readonly></div></div>';
                echo '<div class="form-group"><label for="zip_code" class="control-label col-sm-2" >Zip</label><div class="col-sm-4"><input type="text" class="form-control" id="zip_code" name="zip_code" value="'.$row["zip_code"].'"readonly></div></div>';
                echo '<div class="form-group"><label for="email" class="control-label col-sm-2" >Email</label><div class="col-sm-4"><input type="text" class="form-control" id="email" name="email" value="'.$row["email"].'"readonly></div></div>';
            }
        } else {
            echo "0 results";
        }
    ?>
    </form>

    <!-- EDIT and SAVE buttons  ***  hide SAVE button -->
    <div class="btn-group-vertical btn-group-sm" role="group">
        <div class="form-group">
            <label class="control-label col-sm-2" ></label>
            <div class="col-sm-4">
                <button id="editprofile" class="btn btn-primary">Edit Profile...</button>
                <button id="saveprofile" class="btn btn-primary" style="display:none;">Save</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">User Profile</h4>
          </div>
          <div class="modal-body">
            <div class="succmsg" id="statusmsg"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <script>
    $('#myModal').modal('hide');
    $('#myModal').on('hidden.bs.modal', function (e) {
      // do something...
      if (rc === "1") {
        window.location.href = "./profile.php";
      }
    })
    </script>

</body>
</html>
