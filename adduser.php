<html>
<head>
  <!-- Change this page so new users may be created -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/newuser.css"/>
  <title>
    New user
  </title>
  <?php
  $connection = @mysqli_connect("localhost","root","","RS");
  if($connection->connect_error){
      die("Connection failed: " . $connection->connect_error);
  }

  if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $joindate = $_POST['joindate'];
  $age = $_POST['age'];
  $languages = $_POST['languages'];
  $oldname = $_POST['oldname'];
  $hunting = $_POST['hunting'];
  $frontwebdev = $_POST['frontwebdev'];
  $backwebdev = $_POST['backwebdev'];
  $writing = $_POST['writing'];
  $programming = $_POST['programming'];
  $art = $_POST['art'];
  $se = $_POST['se'];
  $smm = $_POST['smm'];
  $pentesting = $_POST['pentesting'];
  $timezone = $_POST['timezone'];
  $availability = $_POST['availability'];
  $reliability = $_POST['reliability'];
  $avatar = $_POST['avatar'];
  if ($age == 0 or $age == '')  {
    $age = NULL;
  }
  if ($oldname == '')  {
    $age = NULL;
  }
  if ($hunting == 0 or $hunting == '')  {
    $hunting = NULL;
  }
  if ($frontwebdev == 0 or $frontwebdev == '')  {
    $frontwebdev = NULL;
  }
  if ($writing == 0 or $writing == '')  {
    $writing = NULL;
  }
  if ($frontwebdev == 0 or $frontwebdev == '')  {
    $frontwebdev = NULL;
  }
  if ($programming == 0 or $programming == '')  {
    $programming = NULL;
  }
  if ($frontwebdev == 0 or $frontwebdev == '')  {
    $frontwebdev = NULL;
  }
  if ($art == 0 or $art == '')  {
    $art = NULL;
  }
  if ($se == 0 or $se == '')  {
    $se = NULL;
  }
  if ($smm == 0 or $smm == '')  {
    $smm = NULL;
  }
  if ($pentesting == 0 or $pentesting == '')  {
    $pentesting = NULL;
  }
  if ($timezone == 0 or $timezone == '')  {
    $timezone = NULL;
  }
  if ($availability == 0 or $availability == '')  {
    $availability = NULL;
  }
  if ($reliability == 0 or $reliability == '')  {
    $reliability = NULL;
  }
  if ($avatar == 0 or $avatar == '')  {
    $avatar = NULL;
  }

  $sql = "INSERT INTO userinfo (username, joindate, age, languages, oldname, hunting, frontwebdev, backwebdev, writing, programming, art, se, smm, pentesting, timezone, availability, reliability, avatar) VALUES ('" . $username . "', '" . $joindate . "', '" . $age . "', '" . $languages . "', '" . $oldname . "', '" . $hunting . "', '" . $frontwebdev . "', '" . $backwebdev . "', '" . $writing . "', '" . $programming . "', '" . $art . "', '" . $se . "', '" . $smm . "', '" . $pentesting . "', '" . $timezone . "', '" . $availability . "', '" . $reliability . "', '" . $avatar . "');";
  mysqli_query($connection,$sql);
  }
  mysqli_close($connection);
  ?>
</head>
<body>
  <br /><br /><br />
<p class="title"> Add a user</p>
<form method="post" style="text-align: center;" class="form-group">

<div class="row">
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4">
   Username  <input type="text" class="form-control" name="username" style="width: 400px; padding: 3px;" placeholder="Required">

   Join year  <input type="text" class="form-control" name="joindate" style="width: 400px; padding: 3px;" placeholder="Optional">

   Age  <input type="text" class="form-control" name="age" style="width: 400px; padding: 3px;" placeholder="Optional">


   Languages  <input type="text" class="form-control" class="form-control" name="languages" style="width: 400px; padding: 3px;" placeholder="Optional">


   Old Name  <input type="text" class="form-control" name="oldname" style="width: 400px; padding: 3px;" placeholder="Optional">


   Hunting skill  <input type="text" class="form-control" name="hunting" style="width: 400px; padding: 3px;" placeholder="Optional">


   Front web dev skill  <input type="text" class="form-control" name="frontwebdev" style="width: 400px; padding: 3px;" placeholder="Optional">


   Back web dev skill  <input type="text" class="form-control" name="backwebdev" style="width: 400px; padding: 3px;" placeholder="Optional">


   Writing  <input type="text" class="form-control" name="writing" style="width: 400px; padding: 3px;" placeholder="Optional">


   Programming  <input type="text" class="form-control" name="programming" style="width: 400px; padding: 3px;" placeholder="Optional">


   Art  <input type="text" class="form-control" name="art" style="width: 400px; padding: 3px;" placeholder="Optional">


   Social Engineering  <input type="text" class="form-control" name="se" style="width: 400px; padding: 3px;" placeholder="Optional">


   Social Media Management  <input type="text" class="form-control" name="smm" style="width: 400px; padding: 3px;" placeholder="Optional">


   Pen Testing  <input type="text" class="form-control" name="pentesting" style="width: 400px; padding: 3px;" placeholder="Optional">


   Timezone  <input type="text" class="form-control" name="timezone" style="width: 400px; padding: 3px;" placeholder="Optional">


   Availability  <input type="text" class="form-control" name="availability" style="width: 400px; padding: 3px;" placeholder="Required">


   Reliability  <input type="text" class="form-control" name="reliability" style="width: 400px; padding: 3px;" placeholder="Required">


   Url to avatar  <input type="text" class="form-control" name="avatar" style="width: 400px; padding: 3px;" placeholder="Optional">


  <input type="submit" name="submit" class="form-control" style="width:100px;" value="Submit" id="submit"/>
  </div>
    <div class="col-xs-6 col-md-4"></div></div>
</form>
</body>
</html>
