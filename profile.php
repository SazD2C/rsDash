<html>
<?php   $user=$_GET['user']; ?>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <title>
    <?php echo $user; ?>s Profile
  </title>
  <style>
  html,body {
    background-color: #282C35;
    color: white;
    margin: 0px;
  }

  #profileSidebar {
    text-align: center;
    background-color: #3c4049;
    width: 250px;
    padding: 20px;
    height: 100%;
    display: inline-block;
    height: 100%;
  }
  #username {
    font-size: 30px;
  }
  #profileBody {
    background-color: #3c4049;
    display: inline-block;
    width: 1000px;
    height: 100%;
    padding-top: 160px;
  }

p {
  text-align: left;
}
#eskills {
  font-family: 'Roboto', sans-serif;
  font-size: 30px;
  top: 30px;
  position: relative;
}
#skillwrapper {
  top: 50px;
  position: relative;
}
.title {
  font-family: 'Roboto', sans-serif;
  font-size: 30px;
}
.achvtitle {
  font-family: 'Roboto', sans-serif;
  font-size: 20px;
}

#addNewAchv:hover + #newAchvLink {
  opacity: 1;
}
#newAchvLink {
  transition: opacity 3s ease-out;
  opacity: 0;
}
#addNewLink {
  text-decoration: none;
  color: #C4C4C4;
}
#seeAll {
  text-decoration: none;
  color: #C4C4C4;
}
.summaryTab {
  padding: 10px;
  border-radius: 2px;
  background-color: black;
  width: 100px;
}
  </style>
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
  </script>
  <?php

  $connection = @mysqli_connect("localhost","root","","RS")
  OR die('Could not connect' .
        mysqli_connect_error());

  $query = "SELECT usrid, username, oldname, languages, joindate, art, hunting, frontwebdev, backwebdev, writing, programming, se, smm, pentesting, timezone, availability, reliability, profilePicture FROM userinfo WHERE username='" . $user . "';";
  $response = @mysqli_query($connection,$query);



  $row = @mysqli_fetch_array($response);
  $hunter = $row['hunting'];
  $art = $row['art'];
  $webdev = $row['frontwebdev'];
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
</head>
<body>
<div id="profileSidebar">
<span id="profilePicture"> <?php
$picture = $row['profilePicture'];
if($picture === NULL) {
echo "<img src='logopic.png' alt='default logo'/>";
} else {
  echo "<img src='" . $picture . "' alt='profile picture'/>";
  echo "fish";
}
 ?> </span> <br />
<span id="username"> <?php echo $user; ?> </span><br /><br />
<p> ID#: <?php echo $row['usrid']; ?> </p>
 <?php
 $oldname = $row['oldname'];
 if($oldname === NULL) {

 } else {
 echo "<p> Old Name(s): " . $oldname . "</p>";
 }


$timezone = $row['timezone'];
if($timezone === NULL) {

} else {
echo "<p> Timezone: " . $timezone . "</p>";
}


$languages = $row['languages'];
if($languages === NULL) {

} else {
echo "<p> Languages: " . $languages . "</p>";
}

$joindate = $row['joindate'];
if($joindate === NULL) {

} else {
echo "<p> Year joined: " . $joindate . "</p>";
}
  ?>

<br />
<table style="width:100%">
  <tr>
    <td> Availability </td>
    <td> Reliability </td>
  </tr>
  <tr>
    <td class="td">   <?php $availability = $row['availability'];
      if ($availability >= 4) {
        echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; margin-left: 15%; float: left;'>" . $availability . "</div>";
      } elseif ($availability < 4 && $availability > 2) {
        echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032; margin-left: 15%; color: black;'>" . $availability . "</div>";
      } else {
        echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E; margin-left: 15%;'>" . $availability . "</div>";
      }
      ?> </td>
    <td class="td"> <?php $reliability = $row['reliability'];
    if ($reliability >= 4) {
      echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; margin-left: 10%;'>" . $reliability . "</div>";
    } elseif ($reliability < 4 && $reliability > 2) {
      echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032; margin-left: 10%; color: black; float: left;'>" . $reliability . "</div>";
    } else {
      echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E; margin-left: 10%;'>" . $reliability . "</div>";
    }
     ?> </td>

  </tr>
</table>
<p><a href="search.php" style="bottom: 0px; color: white; text-decoration: none;"> Return </a> </p>
</div>

<div id="profileBody">
  <span class="summaryTab">User summary</span>&nbsp;<span class="summaryTab" id="contactInfo">Contact Info</span><br /><br /><br />
<span class="title" id="addNewAchv"> Recent Op Achievements</span> <span id="newAchvLink"> <?php echo "<a id='addNewLink' href='addachievement.php?usrid=" . $userid . "'> Add new</a>"; ?></span>
<br /> <?php echo "<p class='achvtitle'>" . $achvtitle . "</p>"; echo $achvdescr;?><br /><br /> <?php echo "<a id='seeAll' href='allachv.php?usrid=" . $userid . "'>See all</a>"; ?>  <hr />

  <br /><br /><br /><br />
  <span id="eskills">Enumerated skills: </span>
  <span id="skillwrapper">
  <table style="width:100%;">
    <tr>
      <td> <?php
      if($hunter === NULL) {

      } else {
        echo "Hunting";
      }
      ?>
         </td>
      <td> <?php
      if($webdev === NULL) {

      } else {
        echo "Web Dev";
      }
      ?> </td>
      <td> <?php
      if($programming === NULL) {

      } else {
        echo "Programming";
      }
      ?> </td>
      <td> <?php
      if($se === NULL) {

      } else {
        echo "Social Engineering";
      }
      ?> </td>
      <td> <?php
      if($art === NULL) {

      } else {
        echo "Art";
      }
      ?> </td>
      <td> <?php
      if($writing === NULL) {

      } else {
        echo "Writing";
      }
      ?> </td>
      <td> <?php
      if($smm === NULL) {

      } else {
        echo "Social Media Management";
      }
      ?> </td>
    </tr>
    <tr>
      <td>
  <?php
  if($hunter === NULL) {


  } elseif ($hunter >= 4) {
      echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $hunter . "</div>";
    } elseif ($hunter < 4 && $hunter > 2) {
      echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032; color: black; float: left;'>" . $hunter . "</div>";
    } else {
      echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E; '>" . $hunter . "</div>";
    }

  ?> </td>
  <td>
<?php
if($webdev === NULL) {


} elseif ($webdev >= 4) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $webdev . "</div>";
} elseif ($webdev < 4 && $webdev > 2) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black; float: left;'>" . $webdev . "</div>";
} else {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $webdev . "</div>";
}

?> </td>
<td>
<?php
if($webdev === NULL) {


} elseif ($programming >= 4) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $programming . "</div>";
} elseif ($programming < 4 && $programming > 2) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $programming . "</div>";
} else {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $programming . "</div>";
}

?> </td>
<td>
<?php
if($se === NULL) {


} elseif ($se >= 4) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $se . "</div>";
} elseif ($se < 4 && $se > 2) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $se . "</div>";
} else {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $se . "</div>";
}

?> </td>
<td>
<?php
if($art === NULL) {


} elseif ($art >= 4) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $art . "</div>";
} elseif ($art < 4 && $art > 2) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $art . "</div>";
} else {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $art . "</div>";
}

?> </td>
<td>
<?php
if($writing === NULL) {


} elseif ($writing >= 4) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $writing . "</div>";
} elseif ($writing < 4 && $writing > 2) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $writing . "</div>";
} else {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $writing . "</div>";
}

?> </td>
<td>
<?php
if($smm === NULL) {


} elseif ($smm >= 4) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #38B44C; '>" . $smm . "</div>";
} elseif ($smm < 4 && $smm > 2) {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #C0E032;  color: black;'>" . $smm . "</div>";
} else {
  echo "<div style='text-align: center; border-radius:50%; padding: 10px; width: 20px; background-color: #D7432E;'>" . $smm . "</div>";
}

?> </td>
</tr>
</table>
</span>
</span>
</span>
</body>
</html>
