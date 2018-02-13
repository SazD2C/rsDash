<!-- Try Using code from userlister.php here to see if it works -->

<!DOCTYPE HTML>
<head>
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
</style>
<title>
All Achievements
</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h2 class="Sectitle"> All achievements </h2>
  <?php

  $connection = @mysqli_connect("localhost","root","","RS")
  OR die('Could not connect' .
        mysqli_connect_error());
/* Change this so the results are from most to least recent */
  $query = "SELECT achieveid, achievementname, achievementdescr, date(timestamps) FROM achievements WHERE usrid=" . $usrid . ";";
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
