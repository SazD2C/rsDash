<html>
<head>
  <!-- Change this page so new users may be created -->
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

  $sql = "INSERT INTO `userinfo` (`username`, `joindate`, `age`, `languages`, `oldname`, `hunting`, `frontwebdev`, `backwebdev`, `writing`, `programming`, `art`, `se`, `smm`, `pentesting`, `timezone`, `availability`, `reliability`) VALUES ;";
  mysqli_query($connection,$sql);
  }
  mysqli_close($connection);
  ?>
</head>
<body>
  <br /><br /><br />
<p class="title"> Add a user</p>
<form method="post" style="text-align: center;">
<table>
<tr>
  <td>Username</td><td><input type="text" name="username" style="width: 400px; padding: 3px;" placeholder="username"><br /><br /><td>
</tr>
  <td>Join year</td><td><input type="text" name="joindate" style="width: 400px; padding: 3px;" placeholder="joindate"><br /><br />
<tr>
  <td>Age</td><td><input type="text" name="age" style="width: 400px; padding: 3px;" placeholder="age"><br /><br />
</tr>
<tr>
  <td>Languages</td><td><input type="text" name="languages" style="width: 400px; padding: 3px;" placeholder="languages"><br /><br />
</tr>
<tr>
  <td>Old Name</td><td><input type="text" name="oldname" style="width: 400px; padding: 3px;" placeholder="oldname"><br /><br />
</tr>
<tr>
  <td>Hunting skill</td><td><input type="text" name="hunting" style="width: 400px; padding: 3px;" placeholder="hunting"><br /><br />
</tr>
<tr>
  <td>Front web dev skill</td><td><input type="text" name="frontwebdev" style="width: 400px; padding: 3px;" placeholder="frontwebdev"><br /><br />
</tr>
<tr>
  <td>Back web dev skill</td><td><input type="text" name="backwebdev" style="width: 400px; padding: 3px;" placeholder="backwebdev"><br /><br />
</tr>
<tr>
  <td>Writing</td><td><input type="text" name="writing" style="width: 400px; padding: 3px;" placeholder="writing"><br /><br />
</tr>
<tr>
  <td>Programming</td><td><input type="text" name="programming" style="width: 400px; padding: 3px;" placeholder="programming"><br /><br />
</tr>
<tr>
  <td>Art</td><td><input type="text" name="art" style="width: 400px; padding: 3px;" placeholder="art"><br /><br />
</tr>
<tr>
  <td>Social Engineering</td><td><input type="text" name="se" style="width: 400px; padding: 3px;" placeholder="se"><br /><br />
</tr>
<tr>
  <td>Social Media Management</td><td><input type="text" name="smm" style="width: 400px; padding: 3px;" placeholder="smm"><br /><br />
</tr>
<tr>
  <td>Pen Testing</td><td><input type="text" name="pentesting" style="width: 400px; padding: 3px;" placeholder="pentesting"><br /><br />
</tr>
<tr>
  <td>Timezone</td><td><input type="text" name="timezone" style="width: 400px; padding: 3px;" placeholder="timezone"><br /><br />
</tr>
<tr>
  <td>Availability</td><td><input type="text" name="availability" style="width: 400px; padding: 3px;" placeholder="availability"><br /><br />
</tr>
<tr>
  <td>Reliability</td><td><input type="text" name="reliability" style="width: 400px; padding: 3px;" placeholder="reliability"><br /><br />
</tr>
</table>
  <input type="submit" name="submit" value="Submit" id="submit"/>
</form>
</body>
</html>
