<!DOCTYPE HTML>
<head>
<?php  $usrid = $_GET['usrid'];
$connection = @mysqli_connect("localhost","root","","RS")
OR die('Could not connect' .
      mysqli_connect_error());

      $query = "SELECT usrid, username, oldname, languages, joindate, art, hunting, frontwebdev, backwebdev, writing, programming, se, smm, pentesting, timezone,
       availability, reliability, profilePicture FROM userinfo WHERE usrid='" . $usrid . "';";
$response = @mysqli_query($connection,$query);
$row = @mysqli_fetch_array($response);
$username = $row['username'];

$achvquery = "SELECT achieveid, usrid, achievementname, achievementdescr, timestamp FROM achievements WHERE usrid=" . $usrid . ";";
$achvresult = @mysqli_query($connection,$achvquery);
/*
$achvresponse = @mysqli_query($connection,$achvquery);
$achvrow = @mysqli_fetch_array($achvrespone);
*/
$achvinfo = mysqli_fetch_fields($achvresult);
/*
$achvtitle = $achvrow['achievementname'];
$achvdescr = $achvrow['achievementdescr'];
*/

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

<span> <?php echo "<span> " . $username . "s Op Achievement History "; ?> </span>

<span id="newAchvLink"> <?php echo "<a id='addNewLink' href='addachievement.php?usrid=" . $usrid . "'> Add new</a>"; ?></span>
<br />
<?php
/*
while ($achvrow = mysqli_fetch_array($achvresponse)) {
    echo $achvrow['achievementname'];
    echo $achvrow['achievementdescr'];
}*/
foreach ($achvinfo as $entry)
{
    printf("User ID: %d\n",$entry->usrid);
    printf("User Achievement: %s\n",$entry->achievementname);
}
mysqli_free_result($achvresult);
?>
</body>
</html>
