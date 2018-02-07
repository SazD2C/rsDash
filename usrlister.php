<!-- Non functional

Attempt to create xml file search that will allow users to easily find data they
can organize user data from. (ex. hunting, se, art)

Pass that to a php variable, and echo data organized ASC by that.
Must only be for numeric columns, exclude others.

-->





<!DOCTYPE HTML>
<head>
<title>
  User List Generator
</title>
</head>
<body>
  <form action="usrlist.php" method="post">
    <input type="text" name="search" id="bug">
    <input type="submit" name="submit" value="search" id="rat">
  </form>
  <?php
  require_once('phpusrlistrsearch.php');
  ?>
<?php

$connection = @mysqli_connect("localhost","root","","RS")
OR die('Could not connect' .
      mysqli_connect_error());

$query = "SELECT usrid, username, art FROM userinfo";
$response = @mysqli_query($connection,$query);

if($response){

echo '<table align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>ID</b></td>
<td align="left"><b>Art Affinity</b></td>
<td align="left"><b>Username</b></td>';

while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' .
$row['usrid'] . '</td><td align="left">' .
$row['art'] . '</td><td align="left">' .
$row['username'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($connection);

}

mysqli_close($connection);
?>
</body>
</html>
