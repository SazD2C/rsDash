<style>
html, body {
    overflow-x:hidden;
    width: 100%;
    margin:0px;
}
#bar {
  width:100% !important;
  height:50% !important;
}
#row {
  text-align: center;
}
.center {
  text-align: center;
}
.wrap {
  color: white;
  padding: 3px;
  border-radius: 1px;
  display: inline-block;
}
</style>
<link rel="stylesheet" type="text/css" href="css/ms.css"/>
<?php $connection = @mysqli_connect("localhost","root","","RS")
OR die('Could not connect' .
      mysqli_connect_error());
/* Add sum */
$query = "SELECT max(usrid), sum(age), sum(art), sum(hunting), sum(frontwebdev), sum(writing), sum(programming), sum(se), sum(smm), sum(pentesting), sum(availability), sum(reliability) FROM userinfo ";
$response = @mysqli_query($connection,$query);
$row = @mysqli_fetch_array($response);

$achvquery = "SELECT COUNT(achieveid) FROM achievements WHERE MONTH(timestamps) = MONTH(CURRENT_DATE())";
$achvresponse = @mysqli_query($connection,$achvquery);
$achv = @mysqli_fetch_array($achvresponse);

$techQuery = "SELECT COUNT(usrid) FROM userinfo WHERE frontwebdev >= 1 OR programming >= 1";
$techRes = @mysqli_query($connection,$techQuery);
$tech = @mysqli_fetch_array($techRes);

$huntQuery = "SELECT COUNT(usrid) FROM userinfo WHERE hunting >= 1";
$huntRes = @mysqli_query($connection,$huntQuery);
$hunting = @mysqli_fetch_array($huntRes);

$nAge = "SELECT max(usrid) FROM userinfo WHERE age != NULL";
$nRes = @mysqli_query($connection,$nAge);
$nnAge = @mysqli_fetch_array($nRes); #Why does it return as 0

$usrmax = $row['max(usrid)'] - 1501;
$neAge = $nnAge['max(usrid)'];
$age = $row['sum(age)'];
$avgAge = $age / $neAge;
$artsum = $row['sum(art)'];
$huntingsum = $row['sum(hunting)'];
$websum = $row['sum(frontwebdev)'];
$writsum = $row['sum(writing)'];
$progsum = $row['sum(programming)'];
$sesum = $row['sum(se)'];
$achvnum = $achv['COUNT(achieveid)'];
$smmsum = $row['sum(smm)'];
$pensum = $row['sum(pentesting)'];
$avsum = $row['sum(availability)'];
$relsum = $row['sum(reliability)'];
#$totalsum = $artsum + $huntingsum + $websum + $writsum + $progsum + $sesum + $pensum + $smmsum;

/* Percentages
$artsump = number_format(($artsum / $totalsum) * 100, 1);
$websump = number_format(($websum / $totalsum) * 100, 1);
$huntingsump = number_format(($huntingsum / $totalsum) * 100, 1);
$progsump = number_format(($progsum / $totalsum) * 100, 1);
$sesump = number_format(($sesum / $totalsum) * 100, 1);
$pensump = number_format(($pensum / $totalsum) * 100, 1);
$writsump = number_format(($writsum / $totalsum) * 100, 1);
$smmsump = number_format(($smmsum / $totalsum) * 100, 1);



echo "<div style='display:inline;'><span style='width:" . $artsump . "%; background-color:#036EAF; padding:5px;display:inline-block;padding-left: 0px; padding-right: 0px;'></span><span style='width:" . $websump . "%; background-color:#03AFAC; padding:5px;display:inline-block;padding-left: 0px; padding-right: 0px;'></span><span style='width:" . $huntingsump . "%; background-color:#28B20F; padding:5px;display:inline-block;padding-left: 0px; padding-right: 0px;'></span><span style='width:" . $progsump . "%; background-color:#8CD700; padding:5px;display:inline-block;padding-left: 0px; padding-right: 0px;'></span><span style='width:" . $sesump . "%; background-color:#D7A900; padding:5px;display:inline-block;padding-left: 0px; padding-right: 0px;'></span><span style='width:" . $pensump . "%; background-color:#D83623; padding:5px;display:inline-block;padding-left: 0px; padding-right: 0px;'></span><span style='width:" . $writsump . "%; background-color:#D82347;padding-left: 0px; padding-right: 0px; padding:5px;display:inline-block;'></span><span style='width:" . $smmsump . "%; background-color:#5148B9; padding:5px;display:inline-block;padding-left: 0px; padding-right: 0px;'></span></div>";
*/?>
<br /><br /><br />


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="row left"><div class="col-md-1 center"><br /><p class="bg-info wrap"><?php echo $usrmax; ?> members</p> <p class="bg-info wrap"><?php echo $tech['COUNT(usrid)']; ?> users with tech proficiency</p><p class="bg-info wrap">Average age: <?php echo round($avgAge) ?> </p></div> <div class="col-md-4">
<div id="bar"> <canvas id="myChart"></canvas></div></div><div class="col-md-1 center"><br /><p class="bg-info wrap"><?php echo $achvnum; ?> op tasks completed this month</p> <p class="bg-info wrap"><?php echo $hunting['COUNT(usrid)']; ?> users with hunting proficiency</p></div></div>
<?php echo "<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {

    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Art', 'Hunting', 'Web Dev', 'Writing', 'Programming', 'Social Engineering', 'Social Media Management'],
        datasets: [{
            label: 'Total skill',
            backgroundColor: 'rgb(92,184,92)',
            borderColor: 'rgb(92, 165, 92)',
            data: [" . $artsum . ", " . $huntingsum . ", " . $websum . ", " . $writsum . ", " . $progsum . ", " . $sesum . ", " . $smmsum . "],
        }]
    },


    options: {
      responsive:true,
      maintainAspectRatio: false
    }
});
</script>";  ?>
