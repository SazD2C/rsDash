<?php

$connection = @mysqli_connect("localhost","root","","RS")
OR die('Could not connect' .
      mysqli_connect_error());

$query = "SELECT username FROM userinfo WHERE usrid='1501'";
$response = @mysqli_query($connection,$query);

if($response){
$data = mysqli_fetch_array($response);
echo $data['username'];
}

mysqli_close($connection);
?>
