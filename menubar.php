<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./home.php">
        <h2 style="display:inline">&#9925;&nbsp;provider</h2><p style="display:inline;font-size: 18px;vertical-align:top;">&nbsp;&reg;</p>
      </a>
    </div>
    <ul class="nav navbar-nav navbar-left">
      <li class="active"><a href="./home.php">Home</a></li>
      <li><a href="./webspeech.php">Call Someone</a></li>
      <?php
      if ($isAdmin === TRUE) { ?>
      <li id="adminmenu" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administration
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="./admin.php">User Data</a></li>
          <li><a href="./userver.php">Server Status</a></li>
        </ul>
      </li>
      <?php
      }
      ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li id="adminmenu" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="<?php echo $imageUrl ?>" class="img-rounded" alt="Profile Image" width="36" height="36">
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="./profile.php">Profile</a></li>
          <li><a href="./logout.php">Sign Out</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<script>
//<?php echo "alert('".$imageUrl."');" ?>
</script>
