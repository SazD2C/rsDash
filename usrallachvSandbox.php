<!-- Try Using code from userlister.php here to see if it works -->

<!DOCTYPE HTML>
<head>
  <!-- List all achievements of specific user -->
<?php  $usrid = $_GET['usrid'];?>
<style>
html, body {
  margin:0px;
  color: white;
  background-color: #282C35;
}
.achvwrap {
  background-color: #36393E;
  padding: 30px;
}
.title {
  font-size: 20px;
}
</style>
<title>
All Achievements
</title>
</head>
<body>

  <?php

  $connection = @mysqli_connect("localhost","root","","RS")
  OR die('Could not connect' .
        mysqli_connect_error());
/* Change this so the results are from most to least recent */
  $query = "SELECT achieveid, achievementname, achievementdescr, date(timestamps) FROM achievements WHERE usrid=" . $usrid . ";";
  $response = @mysqli_query($connection,$query);

  if($response){


  while($row = mysqli_fetch_array($response)){

  echo '<div class="achvwrap"><span class="title">' . $row['achievementname'] . '</span>- <span class="timestamp">' .
  $row['date(timestamps)'] . '</span> <br />' .

  $row['achievementdescr'] . '</div>';

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
