<?
$connection = @mysqli_connect("localhost","root","","RS")
OR die('Could not connect' .
      mysqli_connect_error());

$query = "SELECT achieveid, achievementname, achievementdescr, usrid, timestamps FROM achievements WHERE complete='FALSE';";
$Rquery = "SELECT stamp, se, smm, pentesting, art, programming, writing, frontwebdev, hunting FROM taskRqSkillsFk WHERE taskRqSkillsFk==achieveid;";
$Uquery = "SELECT usrid, art, hunting, frontwebdev, backwebdev, writing, programming, se, smm, pentesting, timezone, availability, reliability, profilePicture FROM userinfo WHERE usrid = '". $onebyone ."';";
$response = @mysqli_query($connection,$query);
$Rresponse = @mysqli_query($connection,$Rquery);
$Uresponse = @mysqli_query($connection,$Uquery);
$row = mysqli_fetch_array($response);
$Rrow = mysqli_fetch_array($Rresponse);
$Urow = mysqli_fetch_array($Uresponse);
$skillList = array();

function findUserThisMonth() {
  # I need to find if a task has been given to a user this month already
  $currentMonthTask = "SELECT stamp, taskRqSkillsFk FROM taskRqSkillsFk WHERE MONTH(stamp) = MONTH(CURRENT_DATE());";
  $currentMonthTaskRes = @mysqli_query($connection,$currentMonthTask);
  $achvKey = $cmtr['taskRqSkillsFk'];

  $findUserID = "SELECT achieveid, usrid FROM achievements WHERE achieveid = '" . $achvKey . " AND MONTH(timestamps) = MONTH(CURRENT_DATE());";
  $FUIDRes = @mysqli_query($connection,$findUser);
  $FUID = @mysqli_fetch_array($FUIDRes);
  if $usrid > 1500 && $usrid < 3000 {
    return TRUE;
  } else {
    return FALSE;
  }
}

$mTotal = 0;
$total = 0;
if($response){
  while ($row = mysqli_fetch_array($response) && $Rrow = mysqli_fetch_array($Rresponse)) {
    if $Rrow['se']; == TRUE {
      #$se = $Rrow['se'];
      $ss = TRUE;
      array_push($skillList, "se");
    }
    if $Rrow['smm']; == TRUE {
      #$smm = $Rrow['smm'];
      $s = TRUE;
      array_push($skillList, "smm");
    }
    if $Rrow['pentesting']; == TRUE {
      #$pentesting = $Rrow['pentesting'];
      $pe = TRUE;
      array_push($skillList, "pentesting");
    }
    if $Rrow['art']; == TRUE {
      #$pentesting = $Rrow['art'];
      $a = TRUE;
      array_push($skillList, "art");
    }
    if $Rrow['programming']; == TRUE {
      #$programming = $Rrow['programming'];
      $p = TRUE;
      array_push($skillList, "programming");
    }
    if $Rrow['writing']; == TRUE {
      #$writing = $Rrow['writing'];
      $w = TRUE;
      array_push($skillList, "writing");
    }
    if $Rrow['frontwebdev']; == TRUE {
      #$frontwebdev = $Rrow['frontwebdev'];
      $f = TRUE;
      array_push($skillList, "frontwebdev");
    }
    if $Rrow['hunting']; == TRUE {
      #$hunting = $Rrow['hunting'];
      $h = TRUE;
      array_push($skillList, "hunting");
    }

    for ($x = 0; $x > count($skillList); $x++) {
      $onebyone += 1500 + $x;
      if ($h == TRUE) {
        $total += $Urow['hunting'];
      }
      if ($ss == TRUE) {
        $total += $Urow['se'];
      }
      if ($h == TRUE) {
        $total += $Urow['hunting'];
      }
      if ($w == TRUE) {
        $total += $Urow['writing'];
      }
      if ($a == TRUE) {
        $total += $Urow['art'];
      }
      if ($p == TRUE) {
        $total += $Urow['programming'];
      }
      if ($pe == TRUE) {
        $total += $Urow['pentesting'];
      }
      if ($smm == TRUE) {
        $total += $Urow['smm'];
      }
      
      findUserThisMonth()
      if findUserThisMonth() == FALSE {
        if $mTotal < $total {
          $mTotal = $total;
          $id = $onebyone;
        }
      }
    }
  }
}

?>
