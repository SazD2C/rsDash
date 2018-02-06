<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <title>
    Add achievement
  </title>
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
  <style>
  submit {
    border: 0px;
    background-color: white;
  }
  input {
    border: 0px;
  }
#textarea {
  width: 400px;
  height: 100px;
  border: 0px
}
html, body {
background-color: #282C35;
color: white;
margin: 0px;
}
.title {
  font-family: 'Roboto', sans-serif;
  font-size: 30px;
  text-align: center;
}
#submit {
    padding: 10px;
    border-radius: 2px;
}
#return {
  text-decoration: none;
  color: #C4C4C4;
}
  </style>
</head>
<body>
  <br /><br /><br />
<p class="title"> Add Achievement</p>
<form method="post" style="text-align: center;">
  <input type="text" name="achievementname" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <textarea type="text" name="descr" id="textarea" placeholder="Description"></textarea><br /><br />
  <input type="submit" name="submit" value="Submit" id="submit"/>
</form>
<?php echo "<a id='return' href='profile.php?user=" . $retusername . "'> Return </a>"; ?>
</body>
</html>
