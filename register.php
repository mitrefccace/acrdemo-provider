<?php
$config = parse_ini_file('config.ini');
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="mnje.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap/3.3.6/css/bootstrap.min.css">
  	<script src="libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="libs/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script>
    var rc = "0";
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
    }



    //AJAX JQuery instead of page reloading
    $(document).ready(function(){
    $('#register').click(function()
    {
        if (!validateForm()) {
            return;
        }

        rc = "0";

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

        // alert("After validate");

        //make AJAX call
        $.ajax({
            url: "register_submit.php",
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

                // alert("Entered success");
                //$('#statusmsg').attr("class","succmsg").text(msg.text);
                $('#msgtext').text(msg.text);
                rc = msg.rc;
            }).fail(function(jqXHR, textStatus, errorThrown) {
                //fail
                // alert("Entered fail");

                s = "status: " + jqXHR.status + ", textStatus: " + textStatus + ", errorThrown: " + errorThrown;
                //$('#statusmsg').attr("class","errmsg").text("error - "+s);
                $('#msgtext').text("error - "+s);
            }).complete(function(msg) {
                //always executed
                $('#myModal').modal('show');
                //window.location = "./index.php";
            });
    });
    });


</script>
</head>

<body>

<h3 style="display:inline">User Registration</h3>

<p>
Choose a unique username and email address for this new account. After submitting, you will receive an activation email. Please follow the instructions in that email to complete the registration process.
</p>

<!-- The HTML registration form -->

<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="username" class="control-label col-sm-2" >Username</label>
        <div class="col-sm-4"><input type="text" class="form-control" id="username" name="username" placeholder="your username" ></div><div class="reqaster">*</div>
    </div>
    <div class="form-group">
        <label for="password" class="control-label col-sm-2" >Password</label>
        <div class="col-sm-4"><input type="password" class="form-control" id="password" name="password" placeholder="your password" ></div><div class="reqaster">*</div>
    </div>
    <div class="form-group">
        <label for="first_name" class="control-label col-sm-2" >First Name</label>
        <div class="col-sm-4"><input type="text" class="form-control" id="first_name" name="first_name" placeholder="your first name" ></div><div class="reqaster">*</div>
    </div>
    <div class="form-group">
        <label for="last_name" class="control-label col-sm-2" >Last Name</label>
        <div class="col-sm-4"><input type="text" class="form-control" id="last_name" name="last_name" placeholder="your last name" ></div><div class="reqaster">*</div>
    </div>
    <div class="form-group">
        <label for="address" class="control-label col-sm-2" >Street Address</label>
        <div class="col-sm-4"><input type="text" class="form-control" id="address" name="address" placeholder="your address"  ></div>
    </div>
    <div class="form-group">
        <label for="city" class="control-label col-sm-2" >City</label>
        <div class="col-sm-4"><input type="text" class="form-control" id="city" name="city"  placeholder="your city" ></div>
    </div>
    <div class="form-group">
        <label for="state" class="control-label col-sm-2" >State</label>
        <div class="col-sm-4">
        <select class="form-control" id="state" name="state">
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
        <label for="zip_code" class="control-label col-sm-2" >Zip Code</label>
        <div class="col-sm-4"><input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="your zip code" ></div>
    </div>

    <div class="form-group">
        <label for="email" class="control-label col-sm-2" >Email</label>
        <div class="col-sm-4"><input type="text" class="form-control" id="email" name="email" placeholder="your email" ></div><div class="reqaster">*</div>
    </div>
</form>

<div class="btn-group-vertical btn-group-sm" role="group">
    <!-- <input type="submit" name="submit" class="btn btn-default" value="Register" style="margin-bottom:30px;margin-top:30px"/> -->
    <button id="register" class="btn btn-primary">Register</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>

<div class="errmsg" id="statusmsg"></div>
<br><br>

<!-- Modal Message Dialog -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Registration</h4>
      </div>
      <div class="modal-body">
        <p id="msgtext"></p>
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
    window.location.href = "./index.php";
  }
})
</script>

</body>
</html>
