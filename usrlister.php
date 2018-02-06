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
