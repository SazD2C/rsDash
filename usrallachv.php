<!-- Try Using code from userlister.php here to see if it works -->

<!DOCTYPE HTML>
<head>
  <!-- List all achievements of specific user -->
<?php  $usrid = $_GET['usrid']; /*
$connection = @mysqli_connect("localhost","root","","RS")
OR die('Could not connect' .
      mysqli_connect_error());

      $query = "SELECT usrid, username, oldname, languages, joindate, art, hunting, frontwebdev, backwebdev, writing, programming, se, smm, pentesting, timezone,
       availability, reliability, profilePicture FROM userinfo WHERE usrid='" . $usrid . "';";
$response = @mysqli_query($connection,$query);
$row = @mysqli_fetch_array($response);
$username = $row['username'];

$achvquery = "SELECT achieveid, usrid, achievementname, achievementdescr, timestamp FROM achievements WHERE usrid=" . $usrid . ";";
$achvresult = @mysqli_query($connection,$achvquery); */
/*
$achvresponse = @mysqli_query($connection,$achvquery);
$achvrow = @mysqli_fetch_array($achvrespone);
*/
/*$achvinfo = mysqli_fetch_fields($achvresult);*/
/*
$achvtitle = $achvrow['achievementname'];
$achvdescr = $achvrow['achievementdescr'];
*/

?>

<?php

$connection = @mysqli_connect("localhost","root","","RS")
OR die('Could not connect' .
      mysqli_connect_error());

$query = "SELECT achieveid, achievementname, achievementdescr, timestamps FROM achievements WHERE usrid=" . $usrid . ";";
$response = @mysqli_query($connection,$query);

if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>ID</b></td>
<td align="left"><b>Timestamp</b></td>
<td align="left"><b>Achievement name</b></td>
<td align="left"><b>Description</b></td>';

while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['achieveid'] . '</td><td align="left">' .
$row['timestamps'] . '</td><td align="left">' .
$row['achievementname'] . '</td><td align="left" width="200px">' .
$row['achievementdescr'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($connection);

}

mysqli_close($connection);
?>
<style>
html, body {
  color: white;
  background-color: #282C35;
}
</style>
<title>
All Achievements
</title>
</head>
<body>

<span> <?php /*echo "<span> " . $username . "s Op Achievement History ";*/ ?> </span>

<span id="newAchvLink"> <?php /* echo "<a id='addNewLink' href='addachievement.php?usrid=" . $usrid . "' */?> </a></span>
<br />
<?php
/*
while ($achvrow = mysqli_fetch_array($achvresponse)) {
    echo $achvrow['achievementname'];
    echo $achvrow['achievementdescr'];
}*/
/*foreach ($achvinfo as $entry)
{
    printf("User ID: %d\n",$entry->usrid);
    printf("User Achievement: %s\n",$entry->achievementname);
}
mysqli_free_result($achvresult);*/
?>
</body>
</html>
