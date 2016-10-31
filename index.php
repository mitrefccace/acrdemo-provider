<?php
session_start();
$config = parse_ini_file('config.ini');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="mnje.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="libs/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script>
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
      return true;
  }

  //AJAX JQuery instead of page reloading
	$( document ).ready(function() {

  $('#signin').click(function()
  {

      if (!validateForm()) {
          return;
      }

      //get data from form
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;

      //make AJAX call
      $.ajax({
          url: "index_submit.php",
          type:'POST',
          data:
          {
              username: username,
              password: password
          },
          dataType: "json" //expect a JSON response
          }).done(function(msg) {
              //success; check app return code
              if (msg.rc === "1") {
                  //login success
									window.location.replace("home.php");
              } else {
                  //login failed
									$('#statusmsg').text("Login failed.");
              }

          }).fail(function(jqXHR, textStatus, errorThrown) {
              //fail
              s = "status: " + jqXHR.status + ", textStatus: " + textStatus + ", errorThrown: " + errorThrown;
              $('#statusmsg').text("error - "+s);
          }).complete(function(msg) {
              //always executed
          });
  });
});
</script>
</head>
<body>

	<!-- Modal -->
	<div class="modal fade"  data-backdrop="static"  id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Sign In</h4>
				</div>
				<div class="modal-body">

					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="control-label col-sm-2" for="username">Username</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="username" name="username" placeholder="enter username">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2" for="password">Password</label>
							<div class="col-sm-4">
								<input type="password" class="form-control" id="password" name="password" placeholder="enter password">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2"></label>
							<div class="checkbox col-sm-4">
									<label><input type="checkbox" name="signedin" value="signedin">Keep me signed in</label>
							</div>
						</div>
					</form>
					<div class="form-group">
						<label class="control-label col-sm-2"></label>
						<div class="btn-group-vertical btn-group-sm" role="group">
							<button id="signin" class="btn btn-primary">Sign in</button>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2"></label>
						<div class="btn-group-vertical btn-group-sm" role="group">
							<button type="button" onclick="window.location.replace('reset.php');" class="btn btn-link" style="text-align:left">Can't access your account?</button>
							<button type="button" onclick="window.location.replace('register.php');" class="btn btn-link" style="text-align:left">Need an account?</button>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2"></label>
						<div class="btn-group-vertical btn-group-sm" role="group">

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="form-group">
						<div class="checkbox col-sm-4">
							<div class="text-danger lead text-center" id="statusmsg">&nbsp;</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
$('#myModal').modal('show');
$('#username').keypress(function(event) {
	$('#statusmsg').attr("class","errmsg").text("");
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode === 13){
		$('#signin').click();
	}
});
$('#password').keypress(function(event) {
	$('#statusmsg').attr("class","errmsg").text("");
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode === 13){
		$('#signin').click();
	}
});
</script>

</body>

</html>
