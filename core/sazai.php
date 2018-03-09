<?
$connection = @mysqli_connect("localhost","root","","RS")
OR die('Could not connect' .
      mysqli_connect_error());

$query = "SELECT achieveid, achievementname, achievementdescr, usrid, timestamps FROM achievements WHERE complete='FALSE';";
$response = @mysqli_query($connection,$query);
while(($row = mysqli_fetch_array($response)) && ($Rrow = mysqli_fetch_array($Rresponse))){


}
?>
