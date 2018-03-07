<!-- Try Using code from userlister.php here to see if it works -->

<!DOCTYPE HTML>
<head>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script>
  function load() {
      $("#paste").load("settings.php");
  }
  </script>
  <!-- List all achievements of specific user -->
<?php  $usrid = $_GET['usrid'];?>
<style>
html, body {
  margin:0px;
  color: white;
  background-color: #282C35 !important;
}
.achvwrap {
  background-color: #36393E;
  padding: 30px;
}
.title {
  font-size: 20px;
}
.Sectitle {
  color:white;
  margin-left: 10px;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none !important;
}

li a:hover:not(.active) {
    background-color: #111;
    text-decoration: none !important;
}
</style>
<span id="paste"></span>
<ul id="nav">
  <li><a href="/">Home</a></li>
  <li><a href="">Achievements</a></li>
  <li><a href="usrlister.php">User list generator</a></li>
  <li><a href="adduser.php">Add new user</a></li>
  <li ><a href="#" onclick="load(); return false;">Settings</a></li>
  <li><a href="about.html">About</a></li>
  <li style="float:right"><a href="mailto:saz@cerberusbyte.com">Contact</a></li>
</ul>
<title>
All Achievements
</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<br />
<h2 class="Sectitle"> All achievements </h2>
  <?php

  $connection = @mysqli_connect("localhost","root","","RS")
  OR die('Could not connect' .
        mysqli_connect_error());
/* Change this so the results are from most to least recent */
  $query = "SELECT achieveid, achievementname, achievementdescr, date(timestamps) FROM achievements WHERE usrid=" . $usrid . " AND complete=TRUE;";
  $response = @mysqli_query($connection,$query);

  if($response){


  while($row = mysqli_fetch_array($response)){

  echo '<div class="alert alert-dark" role="alert">
  <h4 class="alert-heading" style="display:inline;"><span class="title">' . $row['achievementname'] . '</span></h4>- <span class="timestamp">' .
  $row['date(timestamps)'] . '</span> <hr /><p class="mb-0">' .

  $row['achievementdescr'] . '</p></div>';

  echo '<br />';
  }

  echo '</table>';

  } else {

  echo "Couldn't issue database query<br />";

  echo mysqli_error($connection);

  }

  mysqli_close($connection);
  ?>

<!--
<a href="profile.php?user="> Return </a>
Add and change this once profile.php is changed to id, not username
-->
</body>
</html>
