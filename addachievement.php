<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>
    Add achievement
  </title>
  <link rel="stylesheet" type="text/css" href="css/addachv.css"/>
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $usrid=$_GET['usrid'];
  $connection = @mysqli_connect("localhost","root","","RS");
  if($connection->connect_error){
      die("Connection failed: " . $connection->connect_error);
  }

  if(isset($_POST['submit'])) {
  $achievementname = $_POST['achievementname'];
  $descr = $_POST['descr'];
  $sql = "INSERT INTO achievements (achievementname, achievementdescr, usrid) VALUES ('" . $achievementname . "', '" . $descr ."', " . $usrid . ");";
  mysqli_query($connection,$sql);
  }
  $retquery = "SELECT username FROM userinfo WHERE usrid='" . $usrid . "';";
  $retresponse = @mysqli_query($connection,$retquery);
  $retrow = @mysqli_fetch_array($retresponse);
  $retusername = $retrow['username'];

  mysqli_close($connection);
  ?>
</head>
<script>
  function load() {
      $("#paste").load("settings.php");
  }
</script>
<body>
  <ul id="nav">
    <li><a href="/">Home</a></li>
    <li><a href="">Achievements</a></li>
    <li><a href="usrlister.php">User list generator</a></li>
    <li><a href="adduser.php">Add new user</a></li>
    <li ><a href="#" onclick="load(); return false;">Settings</a></li>
    <li><a href="about.html">About</a></li>
    <li style="float:right"><a href="mailto:saz@cerberusbyte.com">Contact</a></li>
  </ul>
<span id="paste"></span>
  <br /><br /><br />
<p class="title"> Add Completed Task</p>
<div class="row">
  <div class="col-xs-6 col-md-4"></div>
  <div class="col-xs-6 col-md-4">
<form method="post" style="text-align: center;">
  <input type="text"  class="form-control" name="achievementname" style="width: 400px; padding: 3px;" placeholder="Name"><br />
  <textarea class="form-control" type="text" name="descr" id="textarea" placeholder="Description"></textarea><br /><br />
  <input type="submit" name="submit" value="Submit" id="submit"/>
</form>
</div>
<div class="col-xs-6 col-md-4"></div></div>
<?php echo "<a id='return' style='margin-left:2px;' href='profile.php?user=" . $retusername . "'> Return </a>"; ?>
</body>
</html>
