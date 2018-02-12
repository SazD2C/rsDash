<?php $connection = @mysqli_connect("localhost","root","","RS")
OR die('Could not connect' .
      mysqli_connect_error());
/* Add sum */
$query = "SELECT sum(art), sum(hunting), sum(frontwebdev), sum(writing), sum(programming), sum(se), sum(smm), sum(pentesting), sum(availability), sum(reliability) FROM userinfo ";
$response = @mysqli_query($connection,$query);
$row = @mysqli_fetch_array($response);

$artsum = $row['sum(art)'];
$huntingsum = $row['sum(hunting)'];
$websum = $row['sum(frontwebdev)'];
$writsum = $row['sum(writing)'];
$progsum = $row['sum(programming)'];
$sesum = $row['sum(se)'];
$pensum = $row['sum(pentesting)'];
$avsum = $row['sum(availability)'];
$relsum = $row['sum(reliability)'];
$totalsum = $artsum + $huntingsum + $websum + $writsum + $progsum + $sesum + $pensum + $avsum + $relsum;
echo $totalsum;
?>
