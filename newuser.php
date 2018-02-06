<html>
<head>
  <!-- Change this page so new users may be created -->
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
  /* Create one of each below for each input
  $achievementname = $_POST['achievementname'];
  $descr = $_POST['descr']; */
/* fixed */  $sql = "INSERT INTO `userinfo` (`username`, `joindate`, `age`, `languages`, `oldname`, `hunting`, `frontwebdev`, `backwebdev`, `writing`, `programming`, `art`, `se`, `smm`, `pentesting`, `timezone`, `availability`, `reliability`);";
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
  <input type="text" name="username" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="joindate" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="age" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="languages" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="oldname" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="hunting" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="frontwebdev" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="backwebdev" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="writing" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="writing" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="programming" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="art" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="se" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="smm" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="pentesting" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="timezone" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="availability" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="text" name="reliability" style="width: 400px; padding: 3px;" placeholder="Name"><br /><br />
  <input type="submit" name="submit" value="Submit" id="submit"/>
</form>
<?php echo "<a id='return' href='profile.php?user=" . $retusername . "'> Return </a>"; ?>
</body>
</html>
