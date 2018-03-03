<html>
<?php  $userid=$_GET['userid']; ?>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/profile.css">

  <title>
    <?php echo $user; ?>s Profile
  </title>
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script>
  $('#contactInfo').click(function() {
      $('.hideSumm').css({
          'display': 'none'
      });
  });
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {

      type: 'radar',

      data: {
          labels: ['Art', 'Hunting', 'Web Dev', 'Writing', 'Programming', 'Social Engineering', 'Social Media Management'],
          datasets: [{
              label: 'Total skill',
              backgroundColor: 'rgb(92,184,92)',
              borderColor: 'rgb(92, 165, 92)',
              data: [3, 3, 3, 4, 3, 7, 1],
          }]
      },
  });
  </script>
  <?php

  $connection = @mysqli_connect("localhost","root","","RS")
  OR die('Could not connect' .
        mysqli_connect_error());

    $query = "SELECT usrid, username, oldname, languages, joindate, art, hunting, frontwebdev, backwebdev, writing, programming, se, smm, pentesting, timezone, availability, reliability, profilePicture FROM userinfo WHERE usrid='" . $userid . "';";
    $response = @mysqli_query($connection,$query);



  $row = @mysqli_fetch_array($response);
  $hunter = $row['hunting'];
  $art = $row['art'];
  $webdev = $row['frontwebdev'];
  $usrname = $row['username'];
  $programming = $row['programming'];
  $se = $row['se'];
  $writing = $row['writing'];
  $smm = $row['smm'];
  $userid = $row['usrid'];
  $achvquery = "SELECT usrid, achievementname, achievementdescr, timestamp FROM achievements WHERE usrid=" . $userid . ";";
  $achvresponse = @mysqli_query($connection,$achvquery);
  $achvrow = @mysqli_fetch_array($achvresponse);
  $achvtitle = $achvrow['achievementname'];
  $achvdescr = $achvrow['achievementdescr'];
  ?>
  <style>
.side {
    background-color: #3c4049;
    height: 100%;
}
.height {
  height:100%;
}
.sidebarCenter {
  text-align: center;
}
  </style>
</head>
<body>
<div class="row">
    <div class="col-md-2 side sidebarCenter">
<span id="profilePicture"> <?php
$picture = $row['profilePicture'];
if($picture === NULL) {
echo "<img src='logopic.png' alt='default logo'/>";
} else {
  echo "<img src='" . $picture . "' alt='profile picture'/>";
}
 ?> </span> <br />
<span id="username"> <?php echo $usrname ?> </span><br /><br />
<p class='sidebarCenter'> ID#: <?php echo $row['usrid']; ?> </p>
 <?php
 $oldname = $row['oldname'];
 if($oldname === NULL) {

 } else {
 echo "<p class='sidebarCenter'> Old Name(s): " . $oldname . "</p>";
 }


$timezone = $row['timezone'];
if($timezone === NULL) {

} else {
echo "<p class='sidebarCenter'> Timezone: " . $timezone . "</p>";
}


$languages = $row['languages'];
if($languages === NULL) {

} else {
echo "<p class='sidebarCenter'> Languages: " . $languages . "</p>";
}

$joindate = $row['joindate'];
if($joindate === NULL) {

} else {
echo "<p class='sidebarCenter'> Year joined: " . $joindate . "</p>";
}
  ?>


<br />
<div class="row">
  <div class="col-md-6"> Availability </div>
  <div class="col-md-6"> Reliability </div>
</div>
  </tr>
  <tr>
<div class="row">
    <div class="col-md-6">
      <?php $availability = $row['availability'];
      if ($availability >= 4) {
        echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; margin-left: 15%; float: left;'>" . $availability . "</div>";
      } elseif ($availability < 4 && $availability > 2) {
        echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032; margin-left: 15%; color: black;'>" . $availability . "</div>";
      } else {
        echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E; margin-left: 15%;'>" . $availability . "</div>";
      }
      ?>
    </div>
    <div class="col-md-6"> <?php $reliability = $row['reliability'];
    if ($reliability >= 4) {
      echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; margin-left: 10%;'>" . $reliability . "</div>";
    } elseif ($reliability < 4 && $reliability > 2) {
      echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032; margin-left: 10%; color: black; float: left;'>" . $reliability . "</div>";
    } else {
      echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E; margin-left: 10%;'>" . $reliability . "</div>";
    }
     ?> </div>
</div>
<p><a href="index.php" style="bottom: 0px; color: white; text-decoration: none;"> Return </a> </p>
</div>

    <div class="col-md-10 height">
  <span class="summaryTab">User summary</span>&nbsp;<span class="summaryTab" id="contactInfo">Contact Info</span><br /><br /><br />
<span class="title" id="addNewAchv"> Most Recent Op Achievements</span> <span id="newAchvLink"> <?php echo "<a id='addNewLink' href='addachievement.php?usrid=" . $userid . "'> Add new</a>"; ?></span>
<br /> <?php echo "<p class='achvtitle'>" . $achvtitle . "</p>"; echo $achvdescr;?><br /><br /> <?php echo "<a id='seeAll' href='usrallachv.php?usrid=" . $userid . "'>See all</a>"; ?>  <hr />

  <br /><br /><br /><br />
  <span id="eskills">Enumerated skills: </span>
  <span id="skillwrapper">
    <div class="row">

   <?php
      if($hunter === NULL) {

      } else {
        echo "<div class='col-md-2'>Hunting</div>";
      }
      ?>

       <?php
      if($webdev === NULL) {

      } else {
        echo "<div class='col-md-2'>Web Dev</div>";
      }
      ?>

       <?php
      if($programming === NULL) {

      } else {
        echo "<div class='col-md-2'>Programming</div>";
      }
      ?>

 <?php
      if($se === NULL) {

      } else {
        echo "<div class='col-md-2'>Social Engineering</div>";
      }
      ?>
       <?php
      if($art === NULL) {

      } else {
        echo "<div class='col-md-2'>Art</div>";
      }
      ?>
       <?php
      if($writing === NULL) {

      } else {
        echo "<div class='col-md-2'>Writing</div>";
      }
      ?>
      <?php
      if($smm === NULL) {

      } else {
        echo "<div class='col-md-2'>Social Media Management</div>";
      }
      ?>    </div>
    </div>
    <div class="row">


  <?php
  if($hunter === NULL) {

  } elseif ($hunter >= 4) {
      echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $hunter . "</div></div>";
    } elseif ($hunter < 4 && $hunter > 2) {
      echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032; color: black; float: left;'>" . $hunter . "</div></div>";
    } else {
      echo "<div class='col-md-2'><div style='display:block; text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E; '>" . $hunter . "</div></div>";
    }

  ?>
<?php
if($webdev === NULL) {


} elseif ($webdev >= 4) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $webdev . "</div></div>";
} elseif ($webdev < 4 && $webdev > 2) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black; float: left;'>" . $webdev . "</div></div>";
} else {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $webdev . "</div></div>";
}

?>
<?php
if($webdev === NULL) {


} elseif ($programming >= 4) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $programming . "</div></div>";
} elseif ($programming < 4 && $programming > 2) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $programming . "</div></div>";
} else {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $programming . "</div></div>";
}

?>
<?php
if($se === NULL) {


} elseif ($se >= 4) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $se . "</div></div>";
} elseif ($se < 4 && $se > 2) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $se . "</div></div>";
} else {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $se . "</div></div>";
}

?>
<?php
if($art === NULL) {


} elseif ($art >= 4) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $art . "</div></div>";
} elseif ($art < 4 && $art > 2) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $art . "</div></div>";
} else {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $art . "</div></div>";
}

?>
<?php
if($writing === NULL) {


} elseif ($writing >= 4) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $writing . "</div></div>";
} elseif ($writing < 4 && $writing > 2) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $writing . "</div></div>";
} else {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $writing . "</div></div>";
}

?>
<?php
if($smm === NULL) {


} elseif ($smm >= 4) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $smm . "</div></div>";
} elseif ($smm < 4 && $smm > 2) {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $smm . "</div></div>";
} else {
  echo "<div class='col-md-2'><div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $smm . "</div></div>";
}

?> </div>
</div>

</span>
</span>
</span>
</div>
</body>
</html>
